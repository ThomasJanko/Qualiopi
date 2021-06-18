<template>

<v-row class="">
    <v-col>

        <v-list-item  @click="select = !select, IsSelected( select, categorietitle, souscategorietitle, contenu)" class="font-italic pl-2"> <v-icon :color="color" >mdi-menu-right</v-icon>{{contenu}}</v-list-item>


    </v-col>
</v-row>

</template>


<script>

import { mapState } from "vuex";

export default {


props: {
    contenu : {
        type: String,
        default: null
    },
    contenuid : {
        type: Number,
        default: null
    },
    categorietitle: {
        type: String,
        default: null
    },

    souscategorietitle : {
        type: String,
        default: null
    },


},


    data: () => ({

        select : false,
        color: 'secondary',
        i : '',
        b : '',

        list: {
            Categorie: '',
            SousCategorie: '',
            Contenu: '',
        },
        titre: '',

    }),

    mounted() {



    },

    methods: {



        IsSelected(select,categorie, souscategorie, contenu){


            this.list.Categorie = categorie
            this.list.SousCategorie = souscategorie
            this.list.Contenu = contenu
             if (select ==true){

                this.$store.state.formation.selectedContenus.push(this.list)
                // this.$store.commit('UPDATE_CATEGORIES', title)
                this.color='primary',
                console.log(contenu+': istrue')
            }
            else {console.log(contenu+': isfalse')
            this.i= this.$store.state.formation.selectedContenus.indexOf(this.list)
                this.$store.state.formation.selectedContenus.splice(this.i, 1)

                this.color='secondary'

            }


        }


    },
    computed: {
        ...mapState['formation'],



    }

}
</script>
<style>

</style>
