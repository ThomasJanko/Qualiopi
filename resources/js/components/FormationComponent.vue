
<template>
 <v-container class=" fill-height justify-center">


<v-card  class="elevation-12 text-center col-8" >

    <v-card-title >
        <p  :class=" $vuetify.breakpoint.mdAndUp? 'text-center primary--text  display-1 font-weight-bold' : 'text-center text-subtitle-1 primary--text font-weight-bold '"> <v-icon  size="50">mdi-form-select</v-icon>Formulaire Formation</p>
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
        <v-text-field label="nom de la formation" v-model="form.name_formation" prepend-icon=" mdi-format-text-variant-outline" ></v-text-field>
            <v-textarea label="Information" v-model="form.contenu" prepend-icon="mdi-pencil" ></v-textarea>
                <v-autocomplete
                  v-model="form.location_formation"
                    :items="lieu"
                    dense
                    chips
                    small-chips
                    label="Lieu de la formation"
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

    <template v-slot:activator="{ on, attrs }">
        <v-text-field
            v-model="form.dateformation"
            label="dates de formation"
            prepend-icon="mdi-calendar"
            readonly
            clearable
            v-bind="attrs"
            v-on="on"
            >
         </v-text-field>
    </template>





                    <!-- <v-date-picker
            v-model="form.date_id"
            no-title
            multiple
            color="orange"
            scrollable
            >
            <v-spacer></v-spacer>
            <v-btn
            text
            color="primary"
            @click="menu = false"
            >
            Cancel
            </v-btn>
            <v-btn
            text
            color="primary"
            @click="$refs.menu.save(form.date_id)"
            >
            OK
            </v-btn>
        </v-date-picker> -->

    </v-menu>
<selection-calendar></selection-calendar>
     <v-spacer></v-spacer>

               <v-row>


                            <v-col>
                                <v-btn class=" dark pa-2 primary" @keydown.enter="submit()" :x-small="$vuetify.breakpoint.mdAndUp?false:true" @click="submit(); snackbar=true; loader = 'loading3'" rounded>Valider</v-btn>
                            </v-col>

                        </v-row>
            </v-form>
        </v-card-text>

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
                // date_formation: null,
                location_formation: '',
                dateformation: [],
                state_formation : 'En attente', //TODO: creer l'inout pour state_formation
                contenu: '',// contenu correspond à informaton
                planformation_id : '1', //TODO: effectuer le module d'inserction de plan de formation dans la formation



                },

                menu: false,
                lieu: ['Présentiel', 'Distanciel'],
                date: null,


                value: null,

                dialog: false,
                loader: null,
                loading3: false,
                snackbar: false,
                text: `Formations attribuées`,

                client: true,
            }


    },




    created(){



         Client.indexClient() //List des Clients
        .then(response =>{

            this.$store.state.formation.clients= response.data
            this.$store.state.formation.itemsClient= response.data

        })

        .catch(error => console.log(error))
    },

    watch:{

    },

    computed:{
       ... mapState(['formation','users']),
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

    submit(){ //Envoie du formulaire
     let form = {...this.form  }
            form.client_id = this.formation.selectedClient.id // ajout de l'id du client
            form.listFormateur = this.formation.selectedFormateur.id
            form.listStagiaire = this.formation.selectedUser // ajout du tableau d'id des stagiaires
          //  form.date_id = this.formation.selectedDate.id


            //form.listFormateur.push(this.users.id)
            form.listStagiaire.push(this.users.id)
            form.information_id = '2'
 Formation.add(form)
       .then(() => {
       console.log('formulaire formation envoyé')
       this.snackbar = true

       }) .catch(error => {
          if(error.response.status === 422){
          this.errors = error.response.data.errors;
          }
       })




    },
    }

};







</script>

