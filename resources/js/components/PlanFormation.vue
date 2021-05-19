<template>
  <v-card
  elevation-12
    class="mx-auto"
    max-width="600"

  >
    <v-list-item three-line>
      <v-list-item-content>
        <div class="overline mb-4">
          Plan de Formation
        </div>
        <v-list-item-title class="headline mb-1 text-uppercase primary--text">
          {{formation.name_formation}}
        </v-list-item-title>
        <v-list-item-subtitle>Voici le Plan de formation de la formation {{infos.name_formation}} </v-list-item-subtitle>
        <v-list-item-subtitle> Temps: <v-chip class="primary--text"> {{formation.time_formation}} heures</v-chip></v-list-item-subtitle>
      </v-list-item-content>

      <v-img class="pt-8"
        elevation-14
        max-height="120"
        max-width="120"
        src="https://lh3.googleusercontent.com/proxy/azNEBtWbziLGta7zmsmOwXJhuJvJPSEYNBaH9mT1mrsBV5az-Jq3cjAIfl_tdc0CgDk4AJctMYVaJegtWn-6_0ymFmTy"
      ></v-img>
    </v-list-item>

    <v-card-actions>
        <v-btn
        outlined
        rounded
        text
        class="primary--text"
        @click="ListFormation(formation.id)"

      >
        Liste Formation
      </v-btn>
      <v-btn
        outlined
        rounded
        text
         class="primary--text"
      >
        Ligne Plan Formation
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>

import Formation from '../apis/Formation'
export default {


     data: () => ({
         infos : [],
         formation: [],
         lignedeformation: []
    }),

mounted(){



     Formation.infosFormation(this.$route.params.id) //Infos de la formation sélectionnée
            .then(response =>{
                //console.log(response.data)
                this.infos = response.data
                this.formation = response.data.planformation


            })
            .catch(error => console.log(error))




    },

    methods: {
         close(){

                this.$emit('closeform')
        },

          ListFormation(id){


            this.$router.push({ name : 'listFormation', params: { id: id} });

        }
    }







}





</script>
