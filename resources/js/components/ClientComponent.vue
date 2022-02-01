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
                                <!-- <v-flex justify-center class="blue-grey--text text--lighten-2"> {{item.informations.contenu}} </v-flex> -->
                                    <v-flex justify-end class="state"><v-chip class="teal--text">{{item.state_formation}}</v-chip></v-flex>
                                </v-flex>
                                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>

                                <!-- voir le plan de formation -->
                                    <v-list-item-icon>
                                        <v-hover v-slot:default="{ hover }">
                                            <v-icon :color="hover ? 'success' : 'secondary'" @click="InfoFormation(item.id)" > mdi-eye</v-icon>
                                        </v-hover><p>&nbsp;&nbsp;</p>
                                 <!-- supprimer la formation selectionée -->
                                        <v-hover v-slot:default="{ hover }">
                                            <v-icon :color="hover ? 'red' : 'secondary'" @click="supprimerForma(item.id)"> mdi-delete</v-icon>
                                        </v-hover>
                                    </v-list-item-icon>

                <!-- Pop up avertissement suppression formation -->
                 <v-dialog
                    v-model="dialog"
                    overlay-color="white"
                    width="500">
                    <v-card>
                        <v-card-title class="warning white--text" >
                            Attention!
                        </v-card-title>
                        <v-card-text>
                            <strong> Voulez-vous confirmer la suppression de la formation suivante : {{item.name_formation}} ? </strong>
                        </v-card-text>
                        <v-divider></v-divider>
                        <v-card-actions>
                            <v-btn
                                color="primary"
                                text
                                @click="dialog = false"
                                >
                                Non
                            </v-btn>
                            <v-spacer></v-spacer>
                            <v-btn
                                color="primary"
                                text
                                @click="dialog = false; remove(); notificationSuppression()"
                                >
                                Oui
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </v-dialog>
                <!-- Fin pop up avertissement suprression formation -->

                             </v-list-item>
                         <v-divider class="light-blue darken-1" inset></v-divider>
                      </v-list-item-content>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
        </v-card>
    <div class="text-center">
    <v-snackbar
      v-model="snackbar"
      :timeout="timeout"
      color='#F78736'
    >
      {{ text }}

      <template v-slot:action="{ attrs }">
        <v-btn
          color="white"
          text
          orange
          v-bind="attrs"
          @click="snackbar = false"
        >

        </v-btn>
      </template>
    </v-snackbar>
  </div>
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
      ],
      dialog : false,
      snackbar: false,
      text: 'Formation supprimée avec succès !',
      timeout: 3000,

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

    supprimerForma(id){
        this.dialog = true;
        this.idd = id
    },


    remove(){
        console.log(this.idd)
            Formation.delete(this.idd)
                .then(response => {
                    console.log("formation supprimée !")
                    Formation.index()
                    .then(response =>{
                    this.items = response.data;
                }).catch(error => console.log(error))
            }).catch(error => console.log(error))
            // console.log('boutton supprimé fonctionne');

    },


    notificationSuppression(){

        this.snackbar = true;
    },

            //A FINIR SUPRESSION FORMATIONS
                //  formationEncours(id){

                //Supprimerformation.delete(id)
                // .then(response => {
                // Formation.index(id)
                // .then(response =>{
                // console.log(response.data)
                // this.infos = response.data
                // this.users = response.data.users
                // this.client = response.data.client
                // this.dates = response.data.dates
                // this.informations = response.data.informations
                // this.planformations = response.data.planformation
                // this.state = response.data.state_formation

                // console.log(this.dates)
            //     })
            //     .catch(error => console.log(error))

            //     }).catch(error => console.log(error))
            //     this.disable = false
            // },

    //    supprimerFormation(id){
    //     formationDelete.delete(id)
    //     .then(response => {
    //         console.log('formation supprimé')
    //         }).catch(error => console.log('formation non supprimé'))
    //     },



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
        SortName: function(arr)  {//filtre desc
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
