
<template>
    <v-container class=" fill-height justify-center">

            <h1 class='titre pa-15 ml-15 mr-15 justify-center grey--text ' color='red' > Créez les formations de vos futurs stagiaires ! </h1>



        <v-card  class="elevation-12 text-center col-8" >
             <v-card-title >
                <p  :class=" $vuetify.breakpoint.mdAndUp? 'text-center primary--text  display-1 font-weight-bold' : 'text-center text-subtitle-1 primary--text font-weight-bold '">Formulaire Formation</p>
             </v-card-title>

    <v-row>

        <v-flex col-6 >
            <v-autocomplete height="50"
                v-model="selectedClient"
                :items="$store.state.formation.itemsClient"
                deletable-chips
                outlined
                rounded
                clearable
                dense
                color="orange"
                chips
                small-chips
                label="Sélection Client"
                item-text="social_reason"
                return-object
                >
                <template v-slot:selection="data">
                    <v-chip  color="orange" v-text="data.item.social_reason"></v-chip>
                </template>
            </v-autocomplete>
        </v-flex>

        <v-flex col-3 class="pt-5" >
            <v-dialog
                v-model="dialog"
                width="500"
                >

                <template v-slot:activator="{ on, attrs }"> <v-btn  v-bind="attrs" v-on="on" class=" dark pa-2 primary"  >
                    <v-icon>mdi-account-plus</v-icon>Client</v-btn>
                </template>

                <CreationClient  v-on:closeform='dialog = !dialog'>
                    <h2>Nouveau Stagiaire</h2>
                </CreationClient>

            </v-dialog>
        </v-flex>
    </v-row>

    <SelectionStagiaire v-if="!selectedClient.hasOwnProperty('disable') "></SelectionStagiaire>
    <SelectionFormateur> </SelectionFormateur>

<v-flex row class=" text-center justify-center ">
        <v-card-text>
            <v-form class="px-3 pt-2" ref="form">
                <v-text-field label="Titre de la formation*" v-model="form.name_formation" prepend-icon=" mdi-format-text-variant-outline" ></v-text-field>
                    <v-textarea label="Information" v-model="form.contenu" prepend-icon="mdi-pencil" ></v-textarea>
                        <v-autocomplete
                        v-model="form.location_formation"
                            :items="lieu"
                            dense
                            chips
                            small-chips
                            label="Lieu de la formation*"
                            prepend-icon=" mdi-format-text-variant-outline"
                            >
                        </v-autocomplete>
                        <v-menu
                            ref="menu"
                            v-model="menu"
                            :close-on-content-click="false"
                            :return-value.sync="date"
                            transition="scale-transition"
                            offset-y
                            min-width="auto"
                        >

    </v-menu>
     <v-text-field label="Date de la formation : "  prepend-icon="mdi-alarm" disabled></v-text-field>
    <selection-calendar></selection-calendar>
    <v-spacer></v-spacer>
                        <v-dialog
                                v-model="listform"
                                width="600"
                                >




                                <ListFormation  v-on:closeplan='listform = !listform'>

                                </ListFormation>

                     <template v-slot:activator="{ on, attrs }">
                    <v-card-actions class="pb-4 pr-4">
                    <v-row>
                            <v-col>
                                <v-btn outlined  v-bind="attrs" v-on="on" justify-center
                                    color="deep-purple darken-3"
                                    :x-small="$vuetify.breakpoint.mdAndUp?false:true"

                                    snackbar=true;
                                    loader = 'loading3'
                                    rounded
                                    text>
                                    Plan de Formation
                                </v-btn>
                        </v-col>
                    </v-row>
                    </v-card-actions>
                    </template>
                    </v-dialog>

                        <v-row>
                            <v-col>
                                <v-btn class=" dark pa-2 primary" :x-small="$vuetify.breakpoint.mdAndUp?false:true" @click="submit(); snackbar=true; loader = 'loading3'" rounded>Valider</v-btn>
                            </v-col>
                        </v-row>

                    </v-form>
                </v-card-text>
        <v-snackbar  width="600"  shaped bottom elevation="5"  :v-model="popup" :color="error==true?'error':'success'" timeout="4000" >
             {{message}} !
        </v-snackbar>

            </v-flex>
        </v-card>

    </v-container>
</template>

<script>
import Client from '../apis/Client'
import Formation from '../apis/Formation'
import {mapState} from 'vuex'
import CreationUtilisateur from '../components/CreationUtilisateur.vue'
import SelectionCalendar from './SelectionCalendar.vue'
import Planformation from '../apis/Planformation'
import Dates from '../apis/Dates';

export default {

    components:{
        'CreationUtilisateur': CreationUtilisateur,
        'SelectionCalendar':SelectionCalendar

    },

    data() {
        return {
            drawer1: true,
            form : {

            name_formation : '',
            location_formation: '',
            state_formation : 'En attente',
            contenu: '',// contenu correspond à informaton
            // planformation_id : '1',
            listStagiaire: [],
            listFormateur: [],
            information_id: '',
            // listDatesFormation :  [],
            listUserFormation: [],
            // datesFormation: [],




            },

            plan: {
                name_formation: '',
                time_formation: '',
                formation_id: '',
                user_id: '',

                contenuFormation: [],

            },



            popup: false,

            menu: false,
            lieu: ['Présentiel', 'Distanciel'],


            date : '',
            value: null,
            dialog: false,
            listform: false,
            loader: null,
            loading3: false,
            message: "false",
            error: "false",
            text: `Formations attribuées`,
            client: true,
            user_id: '',

        }
    },

    created(){

        Client.indexClient() //List des Clients
        .then(response =>{
             this.$store.commit('UPTADE_FORMATION_CLIENT', response.data)
              this.$store.commit('UPDATE_ITEMS_CLIENT', response.data)
        })
        .catch(error => console.log(error))
    },



// this.$store.state.formation.clients = response.data
// this.$store.state.formation.itemsClient = response.data
    watch:{

    },


    computed:{
       ... mapState(['formation','users','dateid', 'events']),
        selectedClient:{
             get(){
                 return this.$store.state.formation.selectedClient
             },
             set(data){
                 this.$store.dispatch('UPDATE_FORMATION_CLIENT',data)
             }
        },
    },

    methods : {

        submit(){    //Envoie du formulaire

            let form = {...this.form  }

            form.client_id = this.$store.state.formation.selectedClient.id // ajout de l'id du client
            form.listFormateur = this.$store.state.formation.selectedFormateur.id
            form.listStagiaire = this.$store.state.formation.selectedUser // ajout du tableau d'id des stagiaires
            form.user_id = this.users.id
            // form.datesFormation = this.$store.state.formation.datesSelected
            form.listStagiaire.push(form.listFormateur)
            form.listUserFormation = form.listStagiaire
            form.information_id = '2'
            form.formation_id = this.formationid;
            form.dateFormation = this.$store.state.events


        //puis POST
            Formation.add(form)
            .then((response) => {

                this.form ={
                    name_formation : '',
                    location_formation: '',
                    state_formation : 'En attente',
                    contenu: '',
                    listStagiaire: [],
                    listFormateur: [],
                    information_id: '',
                    listUserFormation: [],
                    dateFormation: [],
                    formation_id: '',



                 }
                 this.formationid=response.data.id

            this.$store.state.formation.selectedClient = ''
            this.$store.state.formation.selectedUser = ''
            this.$store.state.formation.selectedFormateur = ''
            this.$store.state.events= '',


            this.message= "Formulaire envoyé";
            this.error=false;
            console.log('formulaire envoyé')


                let plan = {...this.plan  }
                plan.name_formation= response.data.name_formation;
                plan.time_formation='8'
                plan.formation_id = response.data.id
                plan.user_id= this.users.id
                this.$store.commit('UPDATE_PLAN',this.plan)
                plan.contenuFormation = this.$store.state.formation.selectedContenus
                console.log(plan.contenuFormation);

                Planformation.add(plan)
                 .then((response) => {

                    this.$store.commit('UPDATE_PLANFORMATIONID', response.data.id)

                this.$store.state.formation.plan = '';
                this.$store.state.formation.selectedContenus = '';
                 })
                  .catch(error => console.log(error))





            }).catch(error => {

                this.message = "Echec de l'envoie du formulaire";
                this.error=true;

            })


                // let datee = {... this.datee}
                // datee.formation_id = this.formationid;
                // datee.dateid = 'test';
                // datee.dateFormation = this.$store.state.events
                // console.log('cest bon')
                // Dates.add(datee)
                //         .then(response => {

                //     console.log('dates planning envoyé')
                // }).catch(error => {console.log('echec')})






        },


    }
};

</script>

