<template>
     <v-card>
            <v-card-title>
                <span class="text-h5">Presence du stagiaire</span>
            </v-card-title>
             <v-card-text style="height: 250px;">
                <v-radio-group column  v-model="presence" >
                    <v-radio label="Present" value='Present' ></v-radio>
                    <v-radio label="Absent"  value='Absent' ></v-radio>
                    <v-radio label="Retard" value='Retard'></v-radio>
                </v-radio-group>
                <v-btn @click="close()">Envoyer </v-btn>

            </v-card-text>
<p>{{dateId}} </p>

      </v-card>
</template>


<script>

import { mapState } from 'vuex'

  export default {

  props: {
    dateId : {
        type: Number,
        default: null
    },

  },
    data: () => ({

        presence : '',

    }),


    methods: {
        close(){

                this.$emit('close')
        },
    }


  }
</script>
