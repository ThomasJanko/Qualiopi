<template>
    <v-row>
        <!-- CHOIX DES DATES POUR LE FORMULAIRE FORMATION -->
        <v-col>
               <v-sheet height="64">
        <v-toolbar
          flat
        >
          <v-btn
            outlined
            class="mr-4"
            color="grey darken-2"
            @click="setToday"
          >
           Aujourd'hui
          </v-btn>
          <v-btn
            fab
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
                    @click:event="showEvent"
                    color="primary"
                    v-model="dateformation"
                    multiple
                    :type="type"
                >
                </v-calendar>
            </v-sheet>
        </v-col>


    <!-- CHOIX DES HORAIRES POUR LE FORMULAIRE FORMATION -->
    <v-dialog v-model="dialog"
        persistent
        max-width="600px"

        overlay-color = "white">
        <v-row>
        <v-col
        cols="11"
        sm="5"
    >
    <v-menu
        ref="menu"
        v-model="menu2"
        :close-on-content-click="false"
        :nudge-right="40"
        :return-value.sync="heuredebut"
        transition="scale-transition"
        offset-y
        max-width="290px"
        min-width="290px"
    >
    <template v-slot:activator="{ on, attrs }">
        <v-text-field
            v-model="heuredebut"
            label="Horaire de début"
            prepend-icon="mdi-clock-time-four-outline"
            readonly
            v-bind="attrs"
            v-on="on"
        >
            </v-text-field>
        </template>
        <v-time-picker
            v-if="menu2"
            v-model="heuredebut"
            full-width

            @click:minute="$refs.menu.save(heuredebut)"
        >
            </v-time-picker>
        </v-menu>
    </v-col>
        <v-spacer></v-spacer>
        <v-col
        cols="11"
        sm="5"
        >
        <v-dialog
            ref="dialog"
            v-model="modal2"
            :return-value.sync="heurefin"
            persistent
            width="290px"
        >
            <template v-slot:activator="{ on, attrs }">
            <v-text-field
                v-model="heurefin"
                label="Horaire de fin"
                prepend-icon="mdi-clock-time-four-outline"
                readonly
                v-bind="attrs"
                v-on="on"
            ></v-text-field>
            </template>
            <v-time-picker
            v-if="modal2"
            v-model="heurefin"
            full-width
            >
            <v-spacer></v-spacer>
            <v-btn
                text
                color="primary"
                @click="modal2 = false"
            >
                Fermer
            </v-btn>
            <v-btn
                text
                color="primary"
                @click="$refs.dialog.save(heurefin)"
            >
                OK
            </v-btn>
            </v-time-picker>
        </v-dialog>
    </v-col>
</v-row>

 <!-- AJOUTER UNE INFORMATION SUR LE FORMULAIRE DE FORMATION -->
 <!-- <v-container fluid>
    <v-row>
      <v-col cols="4">
        <v-subheader>Information</v-subheader>
      </v-col>
      <v-col cols="8">
        <v-text-field
          label="Note"
          v-model="value"
        ></v-text-field>
      </v-col>
    </v-row>
  </v-container> -->

  <!-- FIN DU SEGMENT D'AJOUT INFORMATION SUR LE FORMULAIRE DE FORMATION -->
            <v-btn
                color="orange"
                text
                @click="chooseHours"
            >
                Enregistrer
            </v-btn>
             <v-btn
            color="green darken-1"
            text
            @click="dialog = false"
          >
            Annuler
          </v-btn>
    </v-dialog>





<!--
        <v-text-field v-model="horairedebut" >
         <h1>{{horairedebut}}</h1>
        </v-text-field>
        <h3>Heure de début</h3>

        <v-text-field v-model="horairefin">
            <h1>{{horairefin}}</h1>
        </v-text-field>
        <h3>Heure de fin</h3> -->

<v-card-actions>
    <v-card-subtitle>
        <v-text-field
            v-model="dateformation"
            label="Date selectionnée"
            disabled
        >
        <h1>{{dateformation}}</h1>
        </v-text-field>
    </v-card-subtitle>



    <v-card-subtitle>
        <v-row>
            <v-col
                cols="12"
                sm="6"
                >
                <v-text-field
                v-model="heuredebut"
                 label="Heure de début"
                disabled
                >{{heuredebut}}
                </v-text-field>
            </v-col>
            <v-col
                cols="12"
                sm="6"
            >
            <v-text-field
                v-model="heurefin"
                label="Heure de fin"
                disabled
            >{{heurefin}}</v-text-field>
        </v-col>
        </v-row>
    </v-card-subtitle>
</v-card-actions>
<v-card-subtitle>
    <v-btn tile color="success" @click="confirmDate()">
        <v-icon left>
             mdi-pencil
        </v-icon>
            Enregistrer
        </v-btn>

          <v-btn tile color="success" @click="puush()">
        <v-icon left>
             mdi-pencil
        </v-icon>
            testpush
        </v-btn>

    <!-- <v-btn tile color="primary" @click="editDate()">
     <v-icon left>
        mdi-checkbox-marked-circle
        </v-icon>
            Modifier
         </v-btn> -->
    <!--
    <v-btn tile color="error" @click="deleteDate()">
        <v-icon left>
            mdi-cancel
        </v-icon>
            Supprimer
        </v-btn> -->
        </v-card-subtitle>
    </v-row>
</template>



<script>

import DatesFormation from '../apis/Dates';
import { mapState } from 'vuex';

  export default {
    data: () => ({
    start : '',
    timed : '',
    color : ['orange'],
    name : 'Formation',
    value : "",
    // dateformation : '',
    // heuredebut: '',
    // heurefin : '',
    focus:'',
    type: 'month',
     typeToLabel: {
        month: 'Mois',
        week: 'Semaine',
        day: 'Jour',
    },

    // infos : [],
    // infosHours :[],

    dialog: false,
    menu2: false,
    modal2: false,
    selectedOpen: false,
    Alldates : []

    }),

    mounted () {
      this.$refs.calendar.scrollToTime('08:00')
    },


    methods:{

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
            this.selectedDate = event.date;
            this.dialog = true;
            this.start = this.selectedDate;
            this.end = this.selectedDate;
        },


        chooseHours(){
            this.timed = this.heuredebut;
            this.timed2 = this.heurefin;
            this.dialog = false;
            this.value = this.value;
            this.start = this.start +' '+this.timed;
            this.end = this.end+' '+this.timed2;
            console.log(this.start+' '+this.end)

            //print the event on the calendar
            let events = {}
            events.name = this.name,
            events.start = this.start,
            events.end = this.end,
            events.value = this.value

            this.$store.commit('UPDATE_EVENT', events)

            events = {}
        },

        confirmDate(){
            let form = {
                dateformation : this.dateformation,
                heuredebut : this.heuredebut,
                heurefin : this.heurefin,
            }

            DatesFormation.add(form)
            .then((res) => {
let selection = []
           console.log('planning envoyé')
           selection.push(this.Alldates)
           console.log(selection)

           }).catch((error) => {
               console.log('plannig not send')
           })
        },

        // showEvent(){
        //     console.log('evenement affiché')
        // },

        showEvent() {
            const open = () => {
            this.selectedEvent = event
            this.selectedElement = nativeEvent.target
            setTimeout(() => this.selectedOpen = true, 10)
        }

        if (this.selectedOpen) {
          this.selectedOpen = false
          setTimeout(open, 10)
        } else {
          open()
        }

        nativeEvent.stopPropagation()
      },
    },

    computed : {

         ...mapState(['events', 'calendar']),

        //  dateformation(){
        //     return this.$store.commit('UPDATE_DATEFORMATION', data)
        // },

         dateformation:{
             get(){
                 return this.$store.state.calendar.dateformation
             },
             set(data){
                 this.$store.dispatch('UPDATE_DATEFORMATION',data)
             }
        },

          heuredebut:{
             get(){
                 return this.$store.state.calendar.heuredebut
             },
             set(data){
                 this.$store.dispatch('UPDATE_HEUREDEBUT',data)
             }
        },

           heurefin:{
             get(){
                 return this.$store.state.calendar.heurefin
             },
             set(data){
                 this.$store.dispatch('UPDATE_HEUREFIN',data)
             }
        },


        // heuredebut(){
        //     return this.$store.commit('UPDATE_HEUREDEBUT', data)
        // },

        // heurefin(){
        //     return this.$store.commit('UPDATE_HEUREFIN', data)
        // },

        //  events:{
        //      get(){
        //          return this.$store.state.events.events
        //      },
        //      set(data){
        //          this.$store.dispatch('UPDATE_EVENT',data)
        //      }
        // },

        // start:{
        //      get(){
        //          return this.$store.state.events.start
        //      },
        //      set(data){
        //          this.$store.dispatch('UPDATE_START',data)
        //      }
        // },

        // end:{
        //      get(){
        //          return this.$store.state.events.end
        //      },
        //      set(data){
        //          this.$store.dispatch('UPDATE__END',data)
        //      }
        // },
    }
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

</style>
