<template>
    <v-card class="elevation-12 text-center" justify="center"  >


        <v-text-field
                            label="Contenu"
                            name="contenu"
                            prepend-icon="mdi-format-title"
                            type="text"
                            color="primary accent-6"
                            v-model="form.contenu">
        </v-text-field>

    <v-autocomplete height="50"
            v-model="formation.selectedCategorie"
            :items="cats"
            outlined

            clearable
            dense
            color="teal lighten-2"
            chips
            small-chips
            label="Sélection Catégorie"

            item-text="title"
            item-value="id"
          >



                <template v-slot:selection="data">
                  <v-chip color="teal lighten-2" v-text="data.item.title"></v-chip>

                </template>

    </v-autocomplete>

     <v-autocomplete height="50"
            v-model="sous"
            :items="souscats"
            outlined

            clearable
            dense
            color="teal lighten-2"
            chips
            small-chips
            label="Sélection SousCategorie"

            item-text="title"
            item-value="id"
          >



                <template v-slot:selection="data">
                  <v-chip color="teal lighten-2" v-text="data.item.title"></v-chip> |

                </template>

            </v-autocomplete>


    <v-btn @click="newContenu(); close()" elevation="12" color="success"> Ajouter le PLan</v-btn>

    </v-card>
</template>

<script>

import { mapState } from "vuex";
import Categorie from '../apis/Categorie'
import SousCategorie from '../apis/SousCategorie'
import ListFormations from '../apis/ListFormations'
export default {



     data: () => ({
         form: {
             contenu: '',
             categorie_id: '',
             souscategorie_id: '',
         },
         cats: [],
         souscats: [],
         sous: '',

    }),

    mounted(){

         Categorie.indexall()
                .then(response =>{
                    this.cats = response.data;
                    // this.$store.state.formation.Categories = this.cats
                    // this.$store.commit('UPDATE_CATEGORIES', this.cats)
                    console.log('categories')
                    console.log(this.cats)


                })
                .catch(error => console.log(error))


        //List Souscategories
        SousCategorie.indexall()
                .then(response =>{
                    this.souscats = response.data;
                    // this.$store.state.formation.SousCategories = this.souscats
                    // this.$store.commit('UPDATE_SOUSCATEGORIES', this.souscats)
                     console.log('sousCategories')
                    console.log(this.souscats)


                })
                .catch(error => console.log(error))

    },


   methods: {
       close(){

                this.$emit('closecont')
        },


        newContenu(){
            this.form.categorie_id = this.$store.state.formation.selectedCategorie
            this.form.souscategorie_id = this.sous
            console.log(this.form.categorie_id)
            console.log(this.sous)


            ListFormations.add(this.form)
            .then(response => {
                console.log('contenu ajouté')
                this.sous =''
                this.formation.selectedCategorie =''
                this.form.contenu = ''
            })
            .catch(error => console.log('echec !'))

        }

},

computed:{
       ... mapState(['formation','users', 'calendar']),
        selectedCategorie:{
             get(){
                 return this.$store.state.formation.selectedCategorie
             },
             set(data){
                 this.$store.dispatch('UPDATE_SELECTED_CATEGORIE',data)
             }
        },

         selectedSouscategorie:{
             get(){
                 return this.$store.state.formation.selectedSouscategorie
             },
             set(data){
                 this.$store.dispatch('UPDATE_SELECTED_SOUSCATEGORIE',data)
             }
        },
    },




}





</script>
