<template>
    <v-row>
        <!-- CHOIX DES DATES POUR LE FORMULAIRE FORMATION -->
        <v-col>
            <v-sheet height="450" width="600">
                <v-calendar
                    ref="calendar"
                    :events="events"
                    @click:date="choosedDate"
                    @click:event="showEvent"
                    color="primary"
                   type="week"
                >
                </v-calendar>
            </v-sheet>
        </v-col>


    <!-- CHOIX DES HORAIRES POUR LE FORMULAIRE FORMATION -->
    <v-dialog v-model="dialog"
        persistent
        max-width="600px">
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
        :return-value.sync="horairedebut"
        transition="scale-transition"
        offset-y
        max-width="290px"
        min-width="290px"
    >
    <template v-slot:activator="{ on, attrs }">
        <v-text-field
            v-model="horairedebut"
            label="Picker in menu"
            prepend-icon="mdi-clock-time-four-outline"
            readonly
            v-bind="attrs"
            v-on="on"
        >
            </v-text-field>
        </template>
        <v-time-picker
            v-if="menu2"
            v-model="horairedebut"
            full-width

            @click:minute="$refs.menu.save(horairedebut)"
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
            :return-value.sync="horairefin"
            persistent
            width="290px"
        >
            <template v-slot:activator="{ on, attrs }">
            <v-text-field
                v-model="horairefin"
                label="Picker in dialog"
                prepend-icon="mdi-clock-time-four-outline"
                readonly
                v-bind="attrs"
                v-on="on"
            ></v-text-field>
            </template>
            <v-time-picker
            v-if="modal2"
            v-model="horairefin"
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
                @click="$refs.dialog.save(horairefin)"
            >
                OK
            </v-btn>
            </v-time-picker>
        </v-dialog>

        </v-col>

    </v-row>

 <!-- AJOUTER UNE INFORMATION SUR LE FORMULAIRE DE FORMATION -->
 <v-container fluid>
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
  </v-container>
  <!-- FIN DU SEGMENT D'AJOUT INFORMATION SUR LE FORMULAIRE DE FORMATION -->


        <v-btn
            color="orange"
            text
            @click="chooseHours"
        >
            Terminé
        </v-btn>
</v-dialog>
  <v-btn
            color="orange"
            text
            @click="test"
        >
            test
        </v-btn>

</v-row>

</template>

<script>
import { mapState } from 'vuex';
  export default {
    data: () => ({

    start : '',
    timed : '',
    color : ['orange'],
    name : 'Formation',
    value : "",



    // infos : [],
    // infosHours :[],

    dialog: false,
    horairedebut: null,
    horairefin : null,
    menu2: false,
    modal2: false,






    }),

    mounted () {
      this.$refs.calendar.scrollToTime('08:00')
    },

    methods:{
       choosedDate(event){
            this.selectedDate = event.date;
            this.start = this.selectedDate;
            this.end = this.selectedDate;
            this.dialog = true;
        },

        chooseHours(){



            this.timed = this.horairedebut;
            this.timed2 = this.horairefin;
            this.dialog = false;
            this.value = this.value;
            this.start = this.start +' '+this.timed;
            this.end = this.end+' '+this.timed2;
            console.log(this.start+' '+this.end)
        },

        test(){
            let events = {}

            events.name = this.name,
            events.start = this.start,
            events.end = this.end,
            events.value = this.value

            this.$store.commit('UPDATE_EVENT', events)

            events = {}


        },

        showEvent(){
            console.log('evenement affiché')
        }


    },

    computed : {

         ...mapState(['events']),

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
