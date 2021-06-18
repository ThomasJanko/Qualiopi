<template>
<v-container>

<h1 class='titre pa-15 ml-15 mr-15 justify-center grey--text ' color='red' > Retrouvez l'ensemble de vos formations ! </h1>

  <v-card
    class="mx-auto "
    width="1000"
    tile
  >
<div class="text-end pt-2 pr-2">
     <v-btn shaped class="orange lighten-2 font-weight-bold " @click="sortName(items)"> <v-icon>mdi-sort-alphabetical-ascending</v-icon>
         Name
         </v-btn>
    <v-btn shaped class="orange lighten-2 font-weight-bold " @click="sortDate(items)">

        <v-icon size="30"  left>mdi-sort-clock-ascending-outline</v-icon>Dates

         </v-btn>
</div>

    <v-list>
      <v-subheader class="font-weight-black"> <h2>Vos Formations</h2> </v-subheader>
      <v-list-item-group

        color="primary"

      >
        <v-list-item
          v-for="item in items"
          :key="item.id"
         @click="InfoFormation(item.id)"
        >

          <v-list-item-icon>
            <v-icon>mdi-clipboard-list-outline</v-icon>

  <!-- <div class="text-center" >
    <v-menu offset-y >
      <template v-slot:activator="{ on, attrs }">
        <v-btn icon
        color="black"
          dark
          v-bind="attrs"
          v-on="on"
        >
         <v-icon>mdi-clipboard-list-outline</v-icon>
        </v-btn>
         </template>
         <v-list>
        <v-list-item
          v-for="(menu, index) in menus"
          :key="index"
        >
          <v-list-item-title>{{ menu.title }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
  </div> -->

          </v-list-item-icon>
          <v-list-item-content>

            <v-list-item-title  class="teal--text text--lighten-1 font-weight-bold text-uppercase" > {{item.name_formation}} </v-list-item-title>
           <v-list-item >
                <v-flex row class="">
                    <v-flex class="blue-grey--text text--lighten-2">{{item.location_formation}}</v-flex>
                    <v-flex justify-center class="blue-grey--text text--lighten-2"> {{item.informations.contenu}} </v-flex>
                    <v-flex justify-end class="state"><v-chip class="teal--text">{{item.state_formation}} </v-chip>  </v-flex>
                </v-flex>

            </v-list-item>
                <v-divider class="light-blue darken-1" inset></v-divider>
          </v-list-item-content>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </v-card>
  </v-container>
</template>

<script>
import Formation from '../apis/Formation'
import { mapState } from "vuex";
export default {

    data: () => ({


      items: [],

      menus: [
          {title: 'Plan de Formation'}
      ]

    }),


created(){

//Formations de l'utilisateur authentifié
         Formation.indexUserAuth()
        .then(response =>{

            this.items=response.data

        })
        .catch(error => console.log(error))
    },

methods:{


//Fonctions de tri
    sortDate(arr){
        this.items = this.SortDate(arr)
    },
    sortName(arr){
        this.items = this.SortName(arr)
    },
    //Trier par date
    SortDate: function(arr) {//filtre desc

            // Set slice() to avoid to generate an infinite loop!
            if(!_.isEmpty(arr)){
                let tab = arr.slice().sort(function(a, b) {
                    return b.date_formation < a.date_formation ? 1 : -1;
                    });

                return tab
            }else {

                return arr
            }
        },
// trier par nom
SortName: function(arr) {//filtre desc

            // Set slice() to avoid to generate an infinite loop!
            if(!_.isEmpty(arr)){
                let tab = arr.slice().sort(function(a, b) {
                    return b.name_formation < a.name_formation ? 1 : -1;
                    });

                return tab
            }else {

                return arr
            }
        },

        //Click sur une formation

        InfoFormation(id){

            //this.selectedFormation
            this.$router.push({ name : 'infosFormation', params: { id: id} });
        }


},

 computed: {
     ...mapState (['formation']),


 }


}

</script>

<style>

</style>
