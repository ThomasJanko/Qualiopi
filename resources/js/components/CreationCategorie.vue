<template>
    <v-card class="elevation-12 text-center" justify="center"  >


        <v-text-field
                            label="Catégorie"
                            name="form.title"
                            prepend-icon="mdi-format-title"
                            type="text"
                            color="primary accent-6"
                            v-model="form.title">
                            </v-text-field>




    <v-btn @click="newCategorie(); close()" elevation="12" color="success"> Ajouter la Catégorie</v-btn>

    </v-card>
</template>

<script>

import { mapState } from "vuex";
import Categorie from '../apis/Categorie'
export default {



     data: () => ({

         form: {
             title: '',
         }
    }),



   methods: {

      close(){

                this.$emit('closecat')
        },

       newCategorie(){
           Categorie.add(this.form)
           .then(response =>{
               console.log('Catégorie ajoutée')
               this.form.title = ''
           })
           .catch(error =>{
               console.log('échec lors de la création')
           })

       }

       }




}





</script>
