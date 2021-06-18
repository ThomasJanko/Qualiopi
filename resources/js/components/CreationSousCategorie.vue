<template>
    <v-card class="elevation-12 text-center" justify="center"  >


        <v-text-field
                            label="SousCatégorie"
                            name="form.title"
                            prepend-icon="mdi-format-title"
                            type="text"
                            color="primary accent-6"
                            v-model="form.title">
                            </v-text-field>




    <v-btn @click="newSousCategorie(); close()" elevation="12" color="success"> Ajouter le PLan</v-btn>

    </v-card>
</template>

<script>

import { mapState } from "vuex";
import SousCategorie from '../apis/SousCategorie'
export default {



     data: () => ({

         form: {
             title: '',
         }
    }),






methods: {


        close(){

                this.$emit('closesouscat')
        },

       newSousCategorie(){
           SousCategorie.add(this.form)
           .then(response =>{
               console.log('SousCatégorie ajoutée')
               this.form.title = ''
           })
           .catch(error =>{
               console.log('échec lors de la création')
           })
       }

}





}





</script>
