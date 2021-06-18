<template>

<v-row class="" >
    <v-col>
        <tr>



 <p  class="font-weight-black pl-8"> <v-icon color="primary" >mdi-database</v-icon>{{categorietitle}} </p>
 <v-list v-for="(souscat, index) in souscategorie" :key="index">
      <SousCategories :souscategorieid="souscat.id" :souscategorietitle="souscat.title" :souscategorie="souscat" :categorieid="categorieid" :categorietitle="categorietitle" class="pl-8" >  </SousCategories>

      </v-list>
        </tr>



    </v-col>
</v-row>

</template>


<script>

import { mapState } from 'vuex';

export default {



props: {
    categorieid: {
        type: Number,
        default: null
    },
    categorietitle: {
        type: String,
        default: null
    },
    catsouscats: {
        type: Array,
        default: null
    },

},



    data: () => ({

        tests: [],


    }),



    computed: {

        ...mapState(['formation']),

              //Retourne les categories avec un id = à la props
              categorie(){


            return this.$store.state.formation.Categories.filter(cat =>cat.id===this.categorieid)

            },


                // Enleve les souscategories dupliquées
                souscategorie(){
                  return Array.from(new Set(this.categorie[0].souscategories.map(a => a.id)))
                    .map(id => {return this.categorie[0].souscategories.find(a => a.id ===id)})


                }



        }






}
</script>
