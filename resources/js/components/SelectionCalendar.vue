<template>
    <v-row>
         <v-col>
            <v-sheet height="64">
                <v-toolbar
                     lat
                    >
                    <!-- <v-btn
                        outlined
                        class="mr-4"
                        color="grey darken-2"
                        @click="setToday"
                    >
                    Aujourd'hui
                    </v-btn> -->
                     <v-btn
                        fabnpm
                        text
                        small
                        color="grey darken-2"
                         @click="prev"
                        >
                        <v-icon small>
                        mdi-chevron-left
                        </v-icon>
                    </v-btn>
                    <v-btn
                        fab
                        text
                        small
                        color="grey darken-2"
                         @click="next"
                        >
                        <v-icon small>
                             mdi-chevron-right
                        </v-icon>
                    </v-btn>

                     <v-toolbar-title v-if="$refs.calendar">
                        {{ $refs.calendar.title }}
                    </v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-menu
                            bottom
                            right
                            >
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn
                                    outlined
                                    color="grey darken-2"
                                    v-bind="attrs"
                                    v-on="on"
                                    >
                                    <span>{{ typeToLabel[type] }}</span>
                                    <v-icon right>
                                    mdi-menu-down
                                    </v-icon>
                                </v-btn>
                            </template>
                            <v-list>
                                <v-list-item @click="type = 'day'">
                                    <v-list-item-title>Jour</v-list-item-title>
                                </v-list-item>
                            <v-list-item @click="type = 'week'">
                                <v-list-item-title>Semaine</v-list-item-title>
                            </v-list-item>
                                <v-list-item @click="type = 'month'">
                                    <v-list-item-title>Mois</v-list-item-title>
                                </v-list-item>
                            </v-list>
                    </v-menu>
                </v-toolbar>
            </v-sheet>
        <v-sheet height="450" width="103%">
        <v-calendar
            ref="calendar"
            :events="events"
            @click:date="choosedDate"
            color="primary"
            v-model="dateformation"
            multiple
            :type="type"
            locale="fr"
            @click:event="showEvent"

            >
        </v-calendar>
        <v-menu
          v-model="selectedOpen"
          :close-on-content-click="false"
          :activator="selectedElement"
          offset-x
            >
            <v-card
                color="grey lighten-4"
                min-width="350px"
                flat
                >
                <v-toolbar
                    :color="selectedEvent.color"
                    white
                    >
                     <!-- <v-btn color="error" @click="supprimerDate()">
                    Supprimer
                    </v-btn> -->

                    <v-toolbar-title v-html="selectedEvent.name"></v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-btn icon>
                        <v-icon>mdi-dots-vertical</v-icon>
                    </v-btn>
                </v-toolbar>
                <v-card-text>
                    <!-- <span>Formation du {{this.dateid}} -->
                        <span> Horaires : {{this.typeEvent}}</span>
                    <!-- <span> Début à {{this.typeEvent}} à {{this.events.date}}</span> -->
                </v-card-text>
                <v-card-actions>
                    <v-btn
                        text
                        color="secondary"
                        @click="supprimerDate()"

                     >
                        Supprimer
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-menu>
    </v-sheet>
</v-col>


<!-- //CHOIX DU CRENAU HORAIRE et du type de formation POUR LA FORMATION -->

   <v-dialog v-model="dialog" scrollable max-width="300px">
        <v-card>


        <v-card-title>Type : </v-card-title>
        <v-divider></v-divider>
        <v-card-text style="height: 300px;">
            <v-radio-group column  v-model="nameEvent" >
                <v-radio label="Formation" value='Formation' ></v-radio>
                <v-radio label="Réunion"   value='Réunion' ></v-radio>
                <v-radio label="Examen" value='Examen'></v-radio>
            </v-radio-group>

        <v-card-title>Horaires : </v-card-title>
        <v-card-text style="height: 300px;">
            <v-radio-group column  v-model="typeEvent" >
            <v-radio label="Matin" value='Matin'  @click="confirmDate()"></v-radio>
            <v-radio label="Après-midi"   value='Après-midi' @click="confirmDate()"></v-radio>
            <v-radio label="Journée entière" value='Journée entière' @click="confirmDate()"></v-radio>
          </v-radio-group>

        </v-card-text>



        </v-card-text>







        <v-divider></v-divider>
        <v-card-actions>
          <!-- <v-btn color="blue darken-1" text @click="dialog = false">Fermer</v-btn> -->
          <!-- <v-btn color="blue darken-1" text @click="confirmDate()">Enregistrer</v-btn> -->
        </v-card-actions>
      </v-card>

    </v-dialog>
</v-row>
</template>





<script>

import DatesFormation from '../apis/Dates';
import { mapState } from 'vuex';
// import Supprimer from '../apis/Dates';

  export default {
    data: () => ({

    // start : '',
    timed : '',

    color : ['orange'],
    name : 'Formation',
    dateid : '',

    focus:'',
    type: 'month',
    typeToLabel: {
        month: 'Mois',
        week: 'Semaine',
        day: 'Jour',
    },

    test: [],
    dialog: false,
    menu2: false,
    modal2: false,
    selectedOpen: false,
    dateId : '',
    selectedEvent: {},
    selectedElement: null,
    selectedOpen: false,
    loader: null,
    plageHoraire : '',
    // heurefin :'18:00',

    //   date: {
    //         name: '',
    //         start: '',
    //         end: '',
    //     },

        typeEvent : '',
        nameEvent: '',

        dateformation : '',


        //ALREADY DEFINIED
        // start : ,
        // end : ''

}),


    mounted () {
      this.$refs.calendar.scrollToTime('08:00')
    },

    methods:{

        //DELETE DATE A GARDER POUR SUPPRIMER UNE OU PLUSIEURS DATES SI NECESSAIRE UNIQUEMENT APRES LENVOI DU FORMULAIRE
        // supprimerDate(){
        //     Supprimer.delete()
        //     .then(res =>{
        //         console.log(this.reponse.data)
        //     }).catch(error => console.log())
        // },


        showEvent ({ nativeEvent, event }) {
        const open = () => {
          this.selectedEvent = event
          this.selectedElement = nativeEvent.target
          requestAnimationFrame(() => requestAnimationFrame(() => this.selectedOpen = true))
        }

        if (this.selectedOpen) {
          this.selectedOpen = false
          requestAnimationFrame(() => requestAnimationFrame(() => open()))
        } else {
          open()
        }

        nativeEvent.stopPropagation()
      },

        //Settoday date du jour
        setToday() {
        this.dateformation = ''
      },

        viewDay({ date }) {
        this.dateformation = date
        this.type = 'day'
      },
         prev() {
        this.$refs.calendar.prev()
      },
        next(){
        this.$refs.calendar.next()
      },

       choosedDate(event){
            this.selectedDate = event;
            this.dialog = true;
            this.start = this.selectedDate;
            this.end = this.selectedDate;

            // console.log(event.date)

       },


       //SUPPRIMER UN MARQUAGE D EVENEMENT SUR LE CALENDRIER
         supprimerDate(events, value){
            this.events.splice(this.events.indexOf(this.value))
            this.selectedOpen = false;
            console.log(this.events)

         },




        // AJOUTER LE OU LES EVENEMENTS DANS LE STORE

        confirmDate(){


            let events = {}

            events.name = this.name
            events.dateid = this.events.start + this.events.end


            //events.start = this.event
            // events.end = this.end
            // events.value = this.value


            // this.dialog = false;
            // this.start = this.start +' '+this.heuredebut;
            // this.end = this.end+' '+this.heurefin;



        //HORAIRES DE LA FORMATION EN FONCTION DU CRENAUX CHOISI

            switch(this.typeEvent){

                case 'Journée entière' :


               events.start = this.dateformation+' '+'09:00',
               events.end  = this.dateformation+' '+'18:00'

                break;
                case 'Après-midi' :


                events.start = this.dateformation+' '+'14:00',
                events.end  = this.dateformation+' '+'18:00'

                break;
                case 'Matin' :

                events.start = this.dateformation+' '+'09:00',
                events.end  = this.dateformation+' '+'14:00'

                break;
                default:

                    alert('Aucun date séléctionnée pour cette formation')

                //TODO:Traitement des err si default

            }

             switch(this.nameEvent){

                case 'Formation' :

                events.name = this.nameEvent

                break;
                case 'Réunion' :

                events.name = this.nameEvent

                break;
                case 'Examen' :

                events.name = this.nameEvent

                break;
                default:

                    alert('Aucun date séléctionnée pour cette formation')

                //TODO:Traitement des err si default

            }

                 events = this.$store.commit('UPDATE_EVENT', events);

                // this.date.name.formation = this.$store.state.events
                // this.date.start = this.$store.state.events.start
                // this.date.end = this.$store.state.events.end
                // this.$store.state.formation.datesSelected.push(this.events)


                //FERMETURE DU SELECTEUR DE CRENAUX APRES AVOIT CLIQUé
                this.dialog = false;

                console.log('planning séléctionné')
                console.log(this.events)
                console.log(this.events.dateid)
                // console.log(this.dateformation)
                // console.log(this.typeEvent)


                //DATES SELETED SAVED IN DDB
                //DatesFormation.add(form)
                //.then((response) => {
                //this.dateId = response.data.id
                //}).catch((error) => {
                //console.log('plannig not send')
                //})
        },
    },



    computed : {

         ...mapState(['events', 'calendar', 'formation']),

        //  dateformation(){
        //     return this.$store.commit('UPDATE_DATEFORMATION', data)
        // },

        // dateformation:{
        //     get(){
        //          return this.$store.state.calendar.dateformation
        //     },
        //     set(data){
        //          this.$store.dispatch('UPDATE_DATEFORMATION',data)
        //     }
        // },

        // heuredebut:{
        //     get(){
        //          return this.$store.state.calendar.heuredebut
        //     },
        //     set(data){
        //          this.$store.dispatch('UPDATE_HEUREDEBUT',data)
        //     }
        // },

        // heurefin:{
        //     get(){
        //          return this.$store.state.calendar.heurefin
        //     },
        //     set(data){
        //          this.$store.dispatch('UPDATE_HEUREFIN',data)
        //     }
        // },dateformation:{
        //     get(){
        //          return this.$store.state.calendar.dateformation
        //     },
        //     set(data){
        //          this.$store.dispatch('UPDATE_DATEFORMATION',data)
        //     }
        // },

        // start:{
        //     get(){
        //          return this.$store.state.events.start
        //     },
        //     set(data){
        //          this.$store.dispatch('UPDATE_EVENTS',data)
        //     }
        // },

        // end:{
        //     get(){
        //          return this.$store.state.events.fin
        //     },
        //     set(data){
        //          this.$store.dispatch('UPDATE_EVENTS',data)
        //     }
        // },
    },

      watch: {
      loader () {
        const l = this.loader
        this[l] = !this[l]

        setTimeout(() => (this[l] = false), 3000)

        this.loader = null
      },
    },
  }

</script>

<style scoped>
    .my-event {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    border-radius: 2px;
    background-color: #1867c0;
    color: #ffffff;
    border: 1px solid #1867c0;
    font-size: 12px;
    padding: 3px;
    cursor: pointer;
    margin-bottom: 1px;
    left: 4px;
    margin-right: 8px;
    position: relative;
    }

    .my-event.with-time {
    position: absolute;
    right: 4px;
    margin-right: 0px;
    }

    .custom-loader {
    animation: loader 1s infinite;
    display: flex;
  }
  @-moz-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @-webkit-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @-o-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }

</style>
