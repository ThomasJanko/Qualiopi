<template>


    <v-container fluid>
         <v-card max-width="1000" class="elevation-12  col-12" >
      <v-row

      >


            <v-text-field class="col-8"
                v-model="search"
                append-icon="mdi-magnify"
                label="Rechercher"
                single-line
                hide-details
            ></v-text-field>
            <v-spacer></v-spacer>
            <v-flex  class=" pt-2">
                <v-btn class="orange lighten-1" @click="sortName(cats)"> <v-icon>mdi-sort-alphabetical-ascending</v-icon></v-btn>
            </v-flex>
            <v-flex justify-end class="pr-8 pt-2">
             <v-btn class="success" @click="Send(); close()"> Valider</v-btn>
            </v-flex>



                <!-- <thead>
                    <tr>
                    <th class="text-left primary--text font-weight-black" >
                        Catégories
                    </th>
                     <th class="text-left primary--text font-weight-black">
                        Thèmes
                    </th>

                    <th class="text-left primary--text font-weight-black">
                        Détails
                    </th> -->
                    <!-- </tr> -->
                <!-- </thead> -->

</v-row>
<v-list class="pt-2">
        <v-list v-for="cat in cats" :key="cat.id">

            <Categories :categorieid="cat.id" :categorietitle="cat.title" :catsouscats="cat.souscategories"> </Categories>


        </v-list>



<p>{{selectedContenus}} </p>
</v-list>










</v-card>
</v-container>






</template>


<script>

import ListFormations from '../apis/ListFormations';
import Categorie from '../apis/Categorie';
import SousCategorie from '../apis/SousCategorie';
import { mapState } from 'vuex';


export default {


  data: () => ({


      form:{
          planformation_id: '',
          Categorie: '',
          SousCategorie: '',
          Contenu: '',
      },
        search: "",
        details: [],
        lists: [],
        infos: [],


      categoriee: true,
      souscategorie : true,
      contenu: true,



    cats: [],
    souscats: [],
    contenus: [],

    }),

mounted(){






       //List Categories
     Categorie.index()
                .then(response =>{
                    this.cats = response.data;
                    // this.$store.state.formation.Categories = this.cats
                    this.$store.commit('UPDATE_CATEGORIES', this.cats)
                    console.log('categories')
                    console.log(this.$store.state.formation.Categories)


                })
                .catch(error => console.log(error))


        //List Souscategories
        SousCategorie.index()
                .then(response =>{
                    this.souscats = response.data;
                    // this.$store.state.formation.SousCategories = this.souscats
                    this.$store.commit('UPDATE_SOUSCATEGORIES', this.souscats)
                     console.log('sousCategories')
                    console.log(this.$store.state.formation.SousCategories)


                })
                .catch(error => console.log(error))


        //List contenus
        ListFormations.contenus()
                .then(response =>{
                    this.contenus = response.data;
                    // this.$store.state.formation.Contenus = this.contenus
                    this.$store.commit('UPDATE_CONTENUS', this.contenus)
                })
                .catch(error => console.log(error))




},

    methods: {

        close(){

        this.$emit('closeplan')

        },
        Send(){

            //tesplan
             console.log(this.$store.state.formation.selectedContenus)




        },


        addDetails(id){


            this.details.push(id);
        },


      filterOnlyCapsText (value, search, cat) {
        return value != null &&
          search != null &&
          typeof value === 'string' &&
          value.toString().toLocaleUpperCase().indexOf(search) !== -1
      },



    sortName(arr){
        this.cats = this.SortName(arr)
    },


// trier par nom
SortName: function(arr) {//filtre desc

            // Set slice() to avoid to generate an infinite loop!
            if(!_.isEmpty(arr)){
                let tab = arr.slice().sort(function(a, b) {
                    return b.categorie < a.categorie ? 1 : -1;
                    });

                return tab
            }else {

                return arr
            }
        },



//Ajouter une catégorie
      addCategorie () {

           ListFormations.addCategorie(this.form)
                        .then(response => {
                       this.cats = response.data;
                       this.form.categorie=''
                        })


        console.log('Catégorie Ajoutée')

      },

      //Ajouter une nouvelle sousCatégorie
      addSouscategorie () {

        console.log('SousCategorie Ajoutée')

          ListFormations.addSousCategorie(this.form)
                        .then(response => {
                       this.infos = response.data;
                       this.form.title=''
                        })


        console.log('SousCatégorie Ajoutée')
      },
      //Ajouter un contenu
      addContenu () {

        console.log('Contenu Ajouté')
        this.contenu = '';
      },


    },

    computed : {

        ...mapState(['formation']),

        selectedCategorie:{
             get(){
                 return this.$store.state.formation.selectedCategorie
             },
             set(data){
                 this.$store.dispatch('UPDATE_ITEMS_SOUSCATEGORIES',data)
             }
        },

        selectedSousCategorie:{
             get(){
                 return this.$store.state.formation.selectedSousCategorie
             },
             set(data){
                 this.$store.dispatch('UPDATE_ITEMS_CONTENUS',data)
             }
        },

        selectedContenus:{
             get(){
                 return this.$store.state.formation.selectedContenus
             },
             set(data){
                 this.$store.dispatch('UPDATE_SELECTED_CONTENUS',data)
             }
        },

    }







}

</script>
