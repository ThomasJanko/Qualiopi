<template>
<v-card max-width="1000"  >

    <v-container fluid>
      <v-row
        align="center"
      >
        <v-col
          cols="12"
          sm="6"
        >



        <v-list width="1000">
      <v-list-item class="secondary" dark >
        <v-list-item-icon >
          <v-icon>mdi-format-list-bulleted-square</v-icon>
        </v-list-item-icon>


        <v-list-item-title class=" font-weight-bold">Liste Formations</v-list-item-title>
        <v-btn shaped class="primary " @click="sortName(items)"> <v-icon>mdi-sort-alphabetical-ascending</v-icon>
         Name
         </v-btn>
      </v-list-item>

      <v-list-group v-for="item in items"
          :key="item.id"
          @click="showSousCategorie(item.id)"
        :value="false"
        prepend-icon='mdi-send-circle-outline'


      >
        <template v-slot:activator>
          <v-list-item-title v-model="selectedCategorie" >
            {{item.categorie}}
              </v-list-item-title>
        </template>

<!--  -->



<!--  -->
          <v-list-group v-for="(info, index) in infos.souscategories" :key="index"
           @click="showContenus(index.id)"
          :value="false"
          no-action
          sub-group
        >
          <template v-slot:activator >
            <v-list-item-content v-model="ItemsSousCategories" >
              <v-list-item-title v-model="selectedSousCategorie"> {{info.title}} </v-list-item-title>
            </v-list-item-content>
          </template>



<!--  -->
            <v-list-group v-for="(contenu, index) in contenus" :key="index"
          :value="false"
          no-action
          sub-group
        >
          <template v-slot:activator >
            <v-list-item-content v-model="ItemsSousCategories" >
              <v-list-item-title v-model="selectedSousCategorie"> {{contenu.details}} </v-list-item-title>
            </v-list-item-content>
          </template>



        </v-list-group>
      </v-list-group>
      </v-list-group>
    </v-list>

        </v-col>

      </v-row>
</v-container>


</v-card>



</template>


<script>

import ListFormations from '../apis/ListFormations';
import SousCategorie from '../apis/SousCategorie';

import { mapState } from 'vuex';


export default {


     data: () => ({

        value: [],
        items: [],
        details: [],
        contenus: {},
        infos: {},
        ItemsSousCategories: false,


    }),

mounted(){

//Infos de listFormation
        ListFormations.index()
                .then(response =>{
                    console.log(response.data)
                    this.items = response.data;

                })
                .catch(error => console.log(error))

//Infos de SousCategorie
             SousCategorie.index()
            .then(response =>{
                console.log(response.data)
                this.details = response.data;
            })
            .catch(error => console.log(error))


},

    methods: {

        showSousCategorie(id){

            this.$store.state.formation.selectedCategorie = id;
            console.log(this.$store.state.formation.selectedCategorie)

               ListFormations.listsouscategories(this.$store.state.formation.selectedCategorie)
            .then(response =>{
                console.log(response.data)
                this.infos = response.data;

            })
            .catch(error => console.log(error))

        },

         showContenus(id){

            this.$store.state.formation.selectedSousCategorie = id;
            console.log(this.$store.state.formation.selectedSousCategorie)

               SousCategorie.listcontenus(this.$store.state.formation.selectedSousCategorie)
            .then(response =>{
                console.log(response.data)
                this.contenus = response.data;

            })
            .catch(error => console.log(error))

        },






    sortName(arr){
        this.items = this.SortName(arr)
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
    }







}

</script>
