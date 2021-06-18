<template>
  <v-card
    class="mx-auto"
    max-width="600"
  >
    <v-toolbar
      color="teal lighten-1"
      dark
    >
      <v-app-bar-nav-icon></v-app-bar-nav-icon>

      <v-toolbar-title>Liste des Formations</v-toolbar-title>

      <v-spacer></v-spacer>

      <!-- <v-menu  >
      <template v-slot:activator="{ on, attrs }">
        <v-btn icon

          dark
          v-bind="attrs"
          v-on="on"
        >
         <v-icon>mdi-dots-vertical</v-icon>
        </v-btn>
         </template>
         <v-btn>Editer Liste</v-btn>
    </v-menu> -->


    </v-toolbar>

    <v-list>


          <v-list-item  v-for="list in lists"
        :key="list.id"
        >

            <v-list-item-title>  {{list.categories.title}} | {{list.souscategories.title}} | {{list.contenu}} </v-list-item-title>
            <v-list-item-icon>
             <v-hover v-slot:default="{ hover }">
                  <v-icon :color="hover ? 'red' : 'secondary'" @click="RemovePop(list.id)"> mdi-delete</v-icon>
            </v-hover>
            </v-list-item-icon>
          </v-list-item>


        <v-dialog
        v-model="dialog"
            width="500">

        <v-card>
        <v-card-title class="warning white--text" >
          Attention!
        </v-card-title>

        <v-card-text>
      <strong> Voulez-vous confirmer la suppression de cette liste?</strong>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
            <v-btn
            color="primary"
            text
            @click="dialog = false"
          >
            Annuler
          </v-btn>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            text
            @click="dialog = false; remove()"
          >
            Accepter
          </v-btn>
        </v-card-actions>
      </v-card>

        </v-dialog>

    </v-list>
    <v-flex row class="pl-1">

                               <v-dialog
                                v-model="cat"
                                width="600"
                                >
                                <CreationCategorie  v-on:closecat='cat = !cat'>

                                </CreationCategorie>

                     <template v-slot:activator="{ on, attrs }">
                    <v-card-actions>
                    <v-row>
                            <v-col>
                               <v-btn class="teal--text text--lighten-2" v-bind="attrs" v-on="on"> <v-icon>mdi-database-plus</v-icon>Catégorie</v-btn>
                        </v-col>
                    </v-row>
                    </v-card-actions>
                    </template>
                    </v-dialog>

                   <v-dialog
                                v-model="souscat"
                                width="600"
                                >
                                <CreationSousCategorie  v-on:closesouscat='souscat = !souscat'>

                                </CreationSousCategorie>

                     <template v-slot:activator="{ on, attrs }">
                    <v-card-actions>
                    <v-row>
                            <v-col>
                               <v-btn class="teal--text text--lighten-2" v-bind="attrs" v-on="on"> <v-icon>mdi-database-plus</v-icon>SousCatégorie</v-btn>
                        </v-col>
                    </v-row>
                    </v-card-actions>
                    </template>
                    </v-dialog>


                    <v-dialog
                                v-model="cont"
                                width="600"
                                >
                                <CreationContenu  v-on:closecont='cont = !cont; index()'>

                                </CreationContenu>

                     <template v-slot:activator="{ on, attrs }">
                    <v-card-actions>
                    <v-row>
                            <v-col>
                               <v-btn class="teal--text text--lighten-2" v-bind="attrs" v-on="on" > <v-icon>mdi-database-plus</v-icon>Contenu</v-btn>
                        </v-col>
                    </v-row>
                    </v-card-actions>
                    </template>
                    </v-dialog>
                    <br/>
                     <br/>
                      <br/>


</v-flex>
  </v-card>
</template>


<script>
import ListFormations from '../apis/ListFormations'

export default {


props: {
    plan: {
        type: Object,
        default: null
    },
},

  data: () => ({

      lists: [],
      cat: false,
      souscat: false,
      cont: false,
      dialog : false,
      idd: '',


    }),

mounted(){

    ListFormations.index()
   .then(response =>{
               this.lists = response.data;


            })
            .catch(error => console.log(error))

},



    methods: {

        RemovePop(id){
            this.dialog = true
            this.idd = id
        },

        remove(){
            console.log(this.idd)
             ListFormations.delete(this.idd)
            .then(response =>{
               console.log('suppression effectuée')

               ListFormations.index()
                .then(response =>{
               this.lists = response.data;


                })
                .catch(error => console.log(error))


            })
            .catch(error => console.log(error))

        },



        index(){
             ListFormations.index()
            .then(response =>{
               this.lists = response.data;


            })
            .catch(error => console.log(error))

        }
    }



}

</script>
