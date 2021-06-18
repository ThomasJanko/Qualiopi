<template>

<v-row class="">
    <v-col>
        <tr>


 <v-list-item  @click="souscatSelect"  class="subtitle-1 pl-8"> <v-icon color="teal lighten-1" >mdi-record</v-icon>{{souscategorietitle}} </v-list-item>

 <td v-for="contenu in contenus" :key="contenu.id"> <Contenus  :contenuid="contenu.id" :contenu="contenu.contenu" :categorietitle="categorietitle" :souscategorietitle="souscategorietitle" >  </Contenus></td>
        </tr>



    </v-col>
</v-row>

</template>


<script>
import { mapState } from "vuex";
export default {

props: {
    souscategorieid : {
        type: Number,
        default: null
    },
     souscategorietitle : {
        type: String,
        default: null
    },


    souscategorie: {
        type: Object,
        default: null
    },
     categorieid: {
        type: Number,
        default: null
    },
    categorietitle: {
        type: String,
        default: null
    },

},



    data: () => ({
        souscatselect: false,

    }),


 methods: {

    souscatSelect(){
        console.log('storee')
        this.$store.commit('UPDATE_SELECTED_SOUSCATEGORIE', this.souscategorieid)
        console.log(this.$store.state.formation.selectedSouscategorie)
        // select push dans store
        //


    }
},


    computed: {
        ...mapState(['formation']),


        contenus(){
            // return this.$store.state.formation.SousCategories.filter(souscat => {
            //     return souscat.categorie.filter(e=> {
            //          return e.id == this.categorieid}

            //     )
            //     })

            return this.$store.state.formation.Contenus.filter(contenu => contenu.souscategorie_id===this.souscategorieid)



        },



}
}
</script>
