<template>
  <v-card
    max-width="600"
    class="mx-auto"
  >
    <v-toolbar
      color="teal"
      dark
    >
      <v-app-bar-nav-icon></v-app-bar-nav-icon>

      <v-toolbar-title>Quizz</v-toolbar-title>
    </v-toolbar>

    <v-list
      two-line
      subheader
    >
      <v-subheader>General</v-subheader>

      <v-list-item>
        <v-list-item-content>
          <v-list-item-title>Informations sur le quizz</v-list-item-title>
          <v-list-item-subtitle>infos?</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

      <v-list-item>
        <v-list-item-content>
          <v-list-item-title>{{users.surname}} {{users.name}}</v-list-item-title>
          <v-list-item-subtitle> {{users.email}}</v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>
    </v-list>

    <v-divider></v-divider>

<v-carousel  :continuous="false" show-arrows-on-hover progress light hide-delimiter-background>
    <template v-slot:prev="{ on, attrs }" >
      <v-icon
        v-bind="attrs"
        v-on="on"
      >mdi-arrow-left-drop-circle</v-icon>
    </template>
    <template v-slot:next="{ on, attrs }">
     <v-icon
        v-bind="attrs"
        v-on="on"
      >mdi-arrow-right-drop-circle</v-icon>
    </template>
    <v-carousel-item v-for="quiz in formation.quizz" :key="quiz.id" >
<v-sheet height="100%" tile>
    <div>
    <v-list
      subheader

      two-line
      flat
    >

    <h4 class="pl-2 teal--text text--lighten-2 font-italic"> {{quiz.question}}   </h4>

      <ItemsQuizz :formationId="formationId" class="pl-8" :quizzId="quiz.id" :quizz="quiz"> </ItemsQuizz>
    </v-list>
    <p> {{formation.repquizz}} </p>
    </div>
</v-sheet>

</v-carousel-item>

</v-carousel>
<v-flex justify-center >
<v-btn class="success" :x-small="$vuetify.breakpoint.mdAndUp?false:true" justify-end @click="validerQCM()">Valider le QCM</v-btn>
</v-flex>
<br/>
<br/>
  </v-card>
</template>

<script>
import Questionnaire from '../apis/Questionnaire'
import Questionnaireformation from '../apis/Questionnaireformation'
import Ligneformations from '../apis/Ligneformations'
import Planformation from '../apis/Planformation'
import { mapState } from 'vuex'

  export default {
    data: () => ({
        settings: [],

        lignes: [],

        form: {
            repQuestionnaire: [],


        },
        formationId: '',
//  user_id: '',
// validation: '',
// formation_id: '',


    }),



    mounted() {



        Planformation.PlanFormation(this.$route.params.id)
        .then(response => {

            this.$store.commit('UPDATE_QUIZZ', response.data.questionnaires);
        }). catch(error => {console.log('echec')})



         Ligneformations.lignesFormation(this.$route.params.id)
         .then(response =>{
               this.lignes = response.data.ligneplanformations;
               this.formationId= response.data.formation_id



            })
            .catch(error => console.log(error))
    },

    methods: {
        validerQCM(){

            let form = {...this.form}
            form.repQuestionnaire = this.$store.state.formation.repquizz;


            Questionnaireformation.add(form)
            .then(response => {
                 this.$store.commit('UPDATE_REP_QUIZZ', []);

             })
             .catch(error => console.log('echec'))









        }
    },


    computed: {
       ...mapState(['users', 'formation']),







    }



  }
</script>
