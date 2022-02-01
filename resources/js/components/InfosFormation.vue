<template>
    <v-container class="justify-center" >
            <v-row justify="center" class="card-body mx-auto my-12">
                <v-col cols="10">
                    <v-card elevation="14"  class="rounded-xl" max-width="774">
                        <h4 class="primary--text text-center text-uppercase font-weight"> <h1>{{infos.name_formation}}</h1> </h4>
                            <!-- informations personnelles -->
                            <v-img class="pt-8"
                                height="256"
                                src="https://mpc-informatique.fr/images/GESTIMUM-partenaire-expert-support.png">
                            </v-img>
                            <v-card-text class="pt-6">
                                <h4 color="secondary"> Formateur:</h4>
                                <h5  class="teal--text text--lighten-1"> <v-icon size="32" >mdi-account-tie</v-icon> {{formateur[0].name}} {{formateur[0].surname}} </h5>
                                <h5  class="teal--text text--lighten-2 pl-9" > {{formateur[0].email}} </h5>
                            </v-card-text>


                            <v-card-text>
                                <h4>Société: <v-chip  class="teal--text text--lighten-2">{{client.social_reason}} </v-chip> </h4>
                                <br/> <br/>
                                <h5> Stagiaires: </h5>
                                <v-simple-table>
                                    <template v-slot:default>
                                    <thead>
                                        <tr>
                                            <th class="text-left teal--text text--lighten-2 font-weight-black">
                                                Nom
                                            </th>
                                            <th class="text-left teal--text text--lighten-2 font-weight-black">
                                                Email
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="stagiaire in stagiaires"
                                            :key="stagiaire.id"
                                            >
                                            <td>{{ stagiaire.name }} {{ stagiaire.surname }}</td>
                                            <td>{{ stagiaire.email }}</td>
                                        </tr>
                                    </tbody>
                                    </template>
                                </v-simple-table>
                            </v-card-text>
                            <v-card-text class="pt-6" >
                                <h4 color="secondary"> Plans de Formation:</h4>
                                <v-dialog  v-for="planformation in planformations" :key="planformation.id"
                                    width="600"
                                    >

                                    <LigneFormation :plan='planformation' v-on:closeform='dialog = !dialog'></LigneFormation>

                                    <template v-slot:activator="{ on, attrs }" >
                                        <v-card-actions class="pb-4 pr-4" >
                                            <v-icon color="teal lighten-2">mdi-arrow-right-circle-outline</v-icon>
                                            <v-btn  v-bind="attrs" v-on="on"
                                                color="deep-purple darken-3"
                                                text
                                                >
                                                {{planformation.name_formation}}
                                            </v-btn>
                                            <v-chip class="teal--text text--lighten-2" >
                                                {{planformation.time_formation}} heures
                                            </v-chip>

                                        </v-card-actions>
                                    </template>
                                </v-dialog>
                                <v-dialog
                                    v-model="newPlan"
                                    width="600"
                                    >
                                    <CreationPlan :forma="formation"  v-on:closeplan='newPlan = !newPlan'> </CreationPLan>

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
                                                        Ajouter un PLan
                                                    </v-btn>
                                                </v-col>
                                            </v-row>
                                        </v-card-actions>
                                    </template>
                                </v-dialog>
                            </v-card-text>
                            <v-divider></v-divider>
                            <v-card-text >
                                <h4 class="secondary--text"> <v-icon>mdi-information-outline</v-icon> Informations:
                                    <v-chip class="teal--text text--lighten-2" >
                                        {{infos.state_formation}}
                                     </v-chip>
                                </h4>
                            </v-card-text>
                                <v-card-text >


                                    <!-- Ajouter une date  -->
                                    <h4 class="secondary--text"> <v-icon>mdi-information-outline</v-icon> Dates :
                                        <v-btn outlined
                                            justify-center
                                            color="deep-purple darken-3"
                                            :x-small="$vuetify.breakpoint.mdAndUp?false:true"
                                            snackbar=true;
                                            loader = 'loading3'
                                            rounded
                                            @click="addEvent()"
                                            text>
                                            Ajouter une date
                                        </v-btn>
                                    </h4>
                                    <!-- Fin ajouter une date -->

                                    <!-- dialog calendar -->

                                    <!-- <v-row justify="center">
                                        <v-dialog
                                            v-model="dialog"
                                            fullscreen
                                            hide-overlay
                                            transition="dialog-bottom-transition"
                                            >
                                            <v-card>
                                                <v-toolbar
                                                    dark
                                                    color="primary"
                                                    >
                                                    <v-btn
                                                        icon
                                                        dark
                                                        @click="dialog = false"
                                                        >
                                                        <v-icon>mdi-close</v-icon>
                                                    </v-btn>
                                                    <v-toolbar-title>Modification de la date</v-toolbar-title>
                                                    <v-spacer></v-spacer>
                                                    <v-toolbar-items   v-toolbar-items>
                                                        <v-btn
                                                            dark
                                                            text
                                                            @click="dialog = false ; validerEvent()"
                                                            >
                                                            Sauvegarder
                                                        </v-btn>
                                                    </v-toolbar-items>
                                                </v-toolbar>
                                                <v-divider></v-divider> -->




                                                <!-- SELCTION DE LA NOUVELLE DATE POUR LA FORMATION  -->
                                                <!-- <SelectionCalendar/> -->


<v-row justify="center">
    <v-dialog
      v-model="dialog"
      persistent
      max-width="9s00px"
        >
        <v-card>
            <v-card-title>
                <span class="text-h5">Nouvelle date de formation</span>
            </v-card-title>
            <selection-calendar></selection-calendar>

            <v-btn @click="addDate(); dialog = !dialog" class="success">Valider</v-btn>

      </v-card>
    </v-dialog>



                                    </v-row>
                                </v-card-text>
                                <v-chip-group v-for="(date,index) in dates" :key="index" class="pl-2" >
                                    <v-chip class="teal--text text--lighten-2"  @click="updateEvent()">
                                        <v-icon left>mdi-calendar  </v-icon>
                                            {{date.dateid}}
                                    </v-chip>
                                    <v-chip class="primary--text"  >
                                        <v-icon left>mdi-google-maps</v-icon>
                                            {{date.location}}
                                        </v-chip>
                                         <v-chip class="teal--text text--lighten-2" @click="dialog_presence= true " >
                                        <v-icon left>mdi-account-check</v-icon>
                                            Presence
                                        </v-chip>


    <v-dialog
      v-model="dialog_presence"

      max-width="600px"
        >
       <PresenceFormation  v-on:close='dialog_presence = false' :dateId = date.id></PresenceFormation>
    </v-dialog>





                                        <!-- Supprimer / ajouter une date -->

                                        <!-- <v-hover v-slot:default="{ hover }">
                                            <v-icon :color="hover ? 'success' : 'secondary'"  @click="addQuizz(list.id)" > mdi-plus</v-icon>
                                        </v-hover> -->
                                        <v-hover v-slot:default="{ hover }">
                                            <v-icon :color="hover ? 'red' : 'secondary'" @click="deleteEvent(date.id)"> mdi-delete</v-icon>
                                        </v-hover>

                                    <!-- Fin Supprimer / ajouter une date  -->




                                  </v-chip-group>

                    <v-divider></v-divider>
                    <v-card-text>
                        <v-btn icon hide-details v-model="enabled" @click="enabled= !enabled">  <v-icon >mdi-clipboard-edit-outline</v-icon></v-btn>
                            <v-textarea :disabled="!enabled"
                                class="font-italic"
                                v-model="informations.contenu">
                            </v-textarea>
                    </v-card-text>
                    <v-flex justify-center>
                        <v-btn outlined  justify-center
                            v-if="state === 'En attente'"
                            color="deep-purple darken-3"
                            :x-small="$vuetify.breakpoint.mdAndUp?false:true"
                            @click="changeState('valider')"
                            rounded
                            text>
                            Valider Formation
                        </v-btn>
                        <v-btn outlined justify-center
                            v-if="state === 'En cours'"
                            color="deep-purple darken-3"
                            :x-small="$vuetify.breakpoint.mdAndUp?false:true"
                            @click="changeState('terminer')"
                            rounded
                            text>
                            Terminer Formation
                        </v-btn>
                        <v-btn outlined  justify-end
                            v-if="state === 'Terminée'"
                            color="deep-purple darken-3"
                            :x-small="$vuetify.breakpoint.mdAndUp?false:true"
                            rounded
                             @click="Quizz(plan.id)"
                            text>
                            Accéder au Quizz
                        </v-btn>
                        <!-- <v-btn outlined  justify-center
                            color="red"
                            :x-small="$vuetify.breakpoint.mdAndUp?false:true"
                            @click='supprimerForma()'
                            rounded
                            text>
                            Annuler la formation
                        </v-btn> -->
                        <!-- <v-text-field v-model="events.name"></v-text-field>
                        <v-text-field v-model="events.location"></v-text-field>
                        <v-text-field v-model="events.start"></v-text-field>
                        <v-text-field v-model="events.end"></v-text-field> -->
                    </v-flex>
                        <br/>
                        <br/>
                    </v-card>
                </v-col>
            </v-row>
    </v-container>
</template>


<script>

import Formation from '../apis/Formation'
import { mapState } from "vuex";
import Supprimer from '../apis/Dates';
import SelectionCalendar from './SelectionCalendar.vue';
import Dates from '../apis/Dates'
export default {

    components: { SelectionCalendar },

    data: () => ({
    infos: [],
    dates: [],
    users:[{
        name: '',
        surname: '',
        email: '',
    }],
    state: '',
    informations: [],
    planformations: [],
    form: {
        state_formation: '',
    },
    client:[],
    newPlan: false,
    dialog: false,
    enabled: false,
    dialog : false,
    disable : true,
    id : [],
    dialog : false,
    //     form : {
    //        events: [],
    //    },

    info: {
        formation_id : '',
        events : [],

    },

    date: {
        formation_id: '',
    },
    dialog_presence: false,
    presence: '',
    menu : '',
    // dateid : '',
    dateformation : '',
    typeEvent : '',
    nameEvent: '',
    locationEvent : '',
    nameFormation: ['Réunion', 'Formation', 'Examen'],
    locationFormation: ['Présentiel', 'Distance'],
    typeFormation: ['Matin', 'Après-midi', 'Journée entière'],

    form : {


           name :'',
          start : '',
            end : '',
            dateid : '',
            formation_id : '4'
    }

}),


    mounted(){

        //Infos de la formation sélectionnée
        Formation.infosFormation(this.$route.params.id)
        .then(response =>{
            console.log(response.data)
            this.infos = response.data
            this.users = response.data.users
            this.client = response.data.client
            this.dates = response.data.dates
            this.informations = response.data.informations
            this.planformations = response.data.planformation
            this.state = response.data.state_formation
                // console.log(this.dates)
        }).catch(error => console.log(error))
    },


    methods: {


        addDate(){
            let date = {...this.date}
            date.formation_id = this.$route.params.id
            date.newdates = this.$store.state.events

            Dates.add(date)
            .then((response) => {
                console.log('envoyé')
                //on renvoie les dates ajoutées pour les voir apparaitre sur la page
                 Formation.infosFormation(this.$route.params.id)
                 .then(response =>{
                    this.dates = response.data.dates
        }).catch(error => console.log(error))

            }).catch(error => console.log('echec'))


        },

    annulerEvent(){
        return this.dialog = false;
    },


//     validerEvent(){

//     //.catch(error => console.log(error))
//     let info  =  {...this.info}
//     info.formation_id = this.formationid;
//     info.events = this.$store.state.eventNew;
//     console.log(info)

//     DatesFormation.add(info)
//     .then((respone) => {
//         // this.$store.state.events;
//         this.info = {
//         formation_id : '',
//         events : []
//     }

//         this.formationid = response.data.id;
//         this.$store.commit('RESET_EVENT');
//         console.log('nouvelle date ajouté')


//         Formation.infosFormation(this.$route.params.id)
//         .then(response =>{
//             this.infos = response.data
//             this.users = response.data.users
//             this.client = response.data.client
//             this.dates = response.data.dates
//             this.informations = response.data.informations
//             this.planformations = response.data.planformation
//             this.state = response.data.state_formation
//             console.log(this.dates)
//         })

//         }).catch((error) => {
//             console.log('plannig not send')
//         })

// },

        addEvent(){
            this.dialog = true;
            // console.log(this.dateformation)
            // console.log(this.dates)
        },


        //bouton ajouter une date
    //    sendEvent(){

    //         this.dialog = false;


    //         console.log(this.dates)
    //         console.log(this.nameEvent)
    //         console.log(this.typeEvent)
    //         console.log(this.locationEvent)
    //     },

    //    choosedDate(event){
    //         this.selectedDate = event;
    //         this.dialog = true;
    //         this.start = this.selectedDate;
    //         this.end = this.selectedDate;
    //         this.dateid = '';

    //         // console.log(event.date)

    //    },



// Afinir

            sendEvent(){



            Dates.add(form)
            .then((response) => {
                consol.log('envoyé')
            }).catch(error => console.log('echec'))


            let events = {}

            events.name = this.nameEvent.toString();
            events.start = this.dates.toString();
            events.end = this.dates.toString();
            events.location = this.locationEvent.toString();




          //HORAIRES DE LA FORMATION EN FONCTION DU CRENAUX CHOISI


                events.dateid = events.name +' - '+ events.start +' - ' + events.end;
                events = this.$store.commit('UPDATE_EVENT', events);



                //FERMETURE DU SELECTEUR DE CRENAUX APRES AVOIT CLIQUé
                this.dialog = false;

                console.log('planning séléctionné')
                console.log(this.events)
                console.log(this.dates)
                console.log(this.nameEvent)
                console.log(this.typeEvent)
                console.log(this.locationEvent)

                this.$store.commit('RESET_EVENT');
                // this.events = '';


        },






        //supprimer une date methode
        deleteEvent(id){
            Supprimer.delete(id)
            .then(response => {
                Formation.infosFormation(this.$route.params.id)
                .then(response =>{
                    console.log(response.data)
                    this.infos = response.data
                    this.users = response.data.users
                    this.client = response.data.client
                    this.dates = response.data.dates
                    this.informations = response.data.informations
                    this.planformations = response.data.planformation
                    this.state = response.data.state_formation
                // console.log(this.dates)
                }).catch(error => console.log(error))
            }).catch(error => console.log(error))

            this.disable = false
            console.log(this.events)
            console.log('date modifiée')
        },


       changeState(state){
            let form = {... this.form}
            if(state =='valider'){
                form.state_formation = 'En cours'
            }
            else{
                form.state_formation = 'Terminée'
        }


        //Changer status Formation
        Formation.updateState(form, this.$route.params.id)
            .then(response => {

            Formation.infosFormation(this.$route.params.id)
            .then(response =>{
            console.log(response.data)
            this.infos = response.data
            this.users = response.data.users
            this.client = response.data.client
            this.dates = response.data.dates
            this.informations = response.data.informations
            this.planformations = response.data.planformation
            this.state = response.data.state_formation

            // console.log(this.dates)
            })
            .catch(error => console.log(error))
            })
        },

        Quizz(id){
            this.$router.push({ name : 'quizzFormation', params: { id: id} });
        },

        // supprimer une date du plan de formation


        //  remove(){
        // console.log(this.idd)
        //     Formation.delete(this.idd)
        //         .then(response => {
        //             console.log("formation supprimée !")
        //             Formation.index()
        //             .then(response =>{
        //             this.items = response.data;
        //         }).catch(error => console.log(error))
        //     }).catch(error => console.log(error))
            // console.log('boutton supprimé fonctionne');

    // },

    },


    computed : {

        ...mapState(['formation', 'events', 'dateid']),

        formateur(){
            return this.users.filter(a => a.role_id =='2')
        },

        stagiaires(){
            return this.users.filter(b => b.role_id == '4')
        },
        plan(){
            return this.planformations.slice(-1)[0]
        },
        selectedClient:{
            get(){
                return this.$store.state.formation.selectedClient
            },
            set(data){
                return this.$store.dispatch('UPDATE_FORMATION_CLIENT',data)
            }
        },
    }
}

</script>
