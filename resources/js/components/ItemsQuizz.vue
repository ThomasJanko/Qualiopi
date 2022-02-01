<template>

<v-container>


      <v-list-item-group

        multiple
      >
        <v-list-item v-if="quizz.choiceA !==null">
          <template v-slot:default="{ active, }">
            <v-list-item-action>
              <v-checkbox
        v-model="choiceA"
        @click="IsSelected(choiceA, quizz.question, quizz.response, quizz.choiceA)"
                :input-value="active"
                color="primary"
              ></v-checkbox>
            </v-list-item-action>

            <v-list-item-content >
              <v-list-item-title > {{quizz.choiceA}}</v-list-item-title>

            </v-list-item-content>
          </template>
        </v-list-item>

        <v-list-item v-if="quizz.choiceB !==null">
          <template v-slot:default="{ active }">
            <v-list-item-action>
              <v-checkbox
                v-model="choiceB"
                 @click="IsSelected(choiceB, quizz.question, quizz.response, quizz.choiceB)"
                :input-value="active"
                color="primary"
              ></v-checkbox>
            </v-list-item-action>

            <v-list-item-content  >
              <v-list-item-title >{{quizz.choiceB}}</v-list-item-title>

            </v-list-item-content>
          </template>
        </v-list-item>

        <v-list-item v-if="quizz.choiceC !==null">
          <template v-slot:default="{ active }">
            <v-list-item-action>
              <v-checkbox
              v-model="choiceC"
               @click=" IsSelected(choiceC, quizz.question, quizz.response, quizz.choiceC)"
                :input-value="active"
                color="primary"
              ></v-checkbox>
            </v-list-item-action>

            <v-list-item-content >
              <v-list-item-title>{{quizz.choiceC}}</v-list-item-title>

            </v-list-item-content>
          </template>
        </v-list-item>

        <v-list-item v-if="quizz.choiceD !==null">
          <template v-slot:default="{ active }">
            <v-list-item-action>
              <v-checkbox
              v-model="choiceD"
               @click="IsSelected(choiceD, quizz.question, quizz.response, quizz.choiceD)"
                :input-value="active"
                color="primary"
              ></v-checkbox>
            </v-list-item-action>

            <v-list-item-content >
              <v-list-item-title>{{quizz.choiceD}}</v-list-item-title>

            </v-list-item-content>
          </template>
        </v-list-item>
      </v-list-item-group>

      <!-- <p>{{choiceA}} {{choiceB}} {{choiceC}} {{choiceD}} </p> -->


</v-container>
</template>




<script>

import { mapState } from 'vuex'

  export default {

  props: {
    quizzId : {
        type: Number,
        default: null
    },
    quizz: {
        type: Object,
        default: null
    },
     formationId: {
        type: Number,
        default: null
    },
  },
    data: () => ({

        choiceA: false,
        choiceB: false,
        choiceC: false,
        choiceD: false,

        quizzz: {

            question: '',
            response: '',
            userResponse: '',
            validation :'En cours',
            formation_id:'',
            user_id: '',
        },
        i: '',

    }),




    methods: {


          IsSelected(userResponse,question, response, choice){


            let quizzz = {...this.quizzz}

            quizzz.question = question
            quizzz.response = response
            quizzz.userResponse = choice
            quizzz.formation_id = this.formationId
            quizzz.user_id = this.$store.state.users.id

            // if (userResponse == response){
            //     this.quizzz.validation = 'true'
            // }
            // else{
            //     this.quizzz.validation = 'false'
            // }

             if (userResponse == true){

                this.$store.state.formation.repquizz.push(quizzz)
                    //TODO : commit

            }
            else {
            // this.i= this.$store.state.formation.repquizz.indexOf(quizzz.userResponse == choice)
            this.i= this.$store.state.formation.repquizz.findIndex(e => e.userResponse == choice)
            console.log(this.i)
                this.$store.state.formation.repquizz.splice(this.i, 1)

            }


        }



    },
    computed: {
       ...mapState(['users', 'formation']),


    }





  }
</script>
