<template>
    <v-card class="elevation-12 text-center" justify="center"  >


        <v-text-field
                            label="titre"
                            name="name_formation"
                            prepend-icon="mdi-format-title"
                            type="text"
                            color="primary accent-6"
                            v-model="plan.name_formation">
                            </v-text-field>


            <ListFormation> </ListFormation>

    <v-btn @click="addPlan" elevation="12" color="success"> Ajouter le PLan</v-btn>

    </v-card>
</template>

<script>

import { mapState } from "vuex";
import Formation from '../apis/Formation'
import Planformation from '../apis/Planformation'
export default {



     data: () => ({

         plan: {
             name_formation: '',
             time_formation: '',
             user_id: '',
             formation_id: '',


         },
         infos: [],
         users: [],
         client: [],
         dates: [],
         informations: [],
         planformations: [],
    }),

    mounted(){

         Formation.infosFormation(this.$route.params.id)
            .then(response =>{
                console.log(response.data)
            this.infos = response.data
            this.users = response.data.users
            this.client = response.data.client
            this.dates = response.data.dates
            this.informations = response.data.informations
            this.planformations = response.data.planformation


            // console.log(this.dates)
            })
            .catch(error => console.log(error))

    },


   methods: {

       //Ajouter un nouveau plan à une formation
       addPlan(){
           let plan = {...this.plan  }
                plan.name_formation= this.plan.name_formation;
                plan.time_formation='8'
                plan.formation_id = this.$route.params.id
                plan.user_id= this.$store.state.users.id
                this.$store.commit('UPDATE_PLAN',this.plan)
                plan.contenuFormation = this.$store.state.formation.selectedContenus
                console.log(plan.contenuFormation);

                Planformation.add(plan)
                 .then((response) => {

                    this.$store.commit('UPDATE_PLANFORMATIONID', response.data.id)


                this.plan.name_formation= '',
                this.$store.state.formation.plan = '';
                this.$store.state.formation.selectedContenus = '';
                 })
                  .catch(error => console.log(error))
       }
    },

    computed:{
       ... mapState(['formation','users', 'calendar']),


    },

}





</script>
