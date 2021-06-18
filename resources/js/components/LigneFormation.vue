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

      <v-toolbar-title>PLan   </v-toolbar-title><v-toolbar-title class="font-weight-black pl-2"> {{plan.name_formation}}</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-menu  >
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
    </v-menu>


    </v-toolbar>

    <v-list>
      <v-list-group
        v-for="ligne in lignes"
        :key="ligne.id"
        v-model="ligne.active"
        prepend-icon="mdi-database"
        no-action

      >
        <template v-slot:activator>
          <v-list-item-content>
            <v-list-item-title > {{ligne.Categorie}} | {{ligne.SousCategorie}} | {{ligne.Contenu}} </v-list-item-title>
          </v-list-item-content>
        </template>

        <!-- <v-list-item
          v-for="child in souscategories"
          :key="child.SousCategorie"
        >
          <v-list-item-content>
            <v-list-item-title v-text="child.SousCategorie"></v-list-item-title>
          </v-list-item-content>
        </v-list-item> -->
      </v-list-group>
    </v-list>
  </v-card>
</template>


<script>
import Ligneformations from '../apis/Ligneformations'

export default {


props: {
    plan: {
        type: Object,
        default: null
    },
},

  data: () => ({

      lignes: [],


    }),

mounted(){

    Ligneformations.lignesFormation(this.plan.id)
   .then(response =>{
               this.lignes = response.data.ligneplanformations;


            })
            .catch(error => console.log(error))

},




// computed: {
//      categories(){


//             return this.lignes.filter(cat =>cat.Categorie===this.categorieid)

//             }
// }




}

</script>
