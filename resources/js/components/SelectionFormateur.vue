<template>
     <v-row>
            <v-flex col-6 >
          <v-autocomplete height="50"
            v-model="selectedFormateur"
            :items="$store.state.formation.itemsFormateur"
            deletable-chips
            outlined
            rounded
            clearable
            dense
            color="orange"
            chips
            small-chips
            label="Sélection Formateur"

            item-text="name"
            return-object
          >


                <template v-slot:selection="data">
                  <v-chip  color="orange" v-text="data.item.name"></v-chip>

                </template>

            </v-autocomplete>
            </v-flex>

            <v-flex col-3 class="pt-5">
        <v-dialog
      v-model="dialog"
      width="500"
    >
       <template v-slot:activator="{ on, attrs }"> <v-btn  v-bind="attrs"
          v-on="on" class=" dark pa-2 primary"  > <v-icon>mdi-account-plus</v-icon>Formateur</v-btn>  </template>


       <CreationUtilisateur v-on:closeform="dialog=!dialog" >
           <template v-slot:title>
               <p  :class=" $vuetify.breakpoint.mdAndUp? 'text-center primary--text  display-1 font-weight-bold' : 'text-center text-subtitle-1 primary--text font-weight-bold '">Nouveau Formateur</p>
           </template>
        <template v-slot:typeuser>Formateur</template>
        <template v-slot:typesociety>Gestimum</template>
       </CreationUtilisateur>


    </v-dialog>
    </v-flex>
    </v-row>
</template>

<script>
import User from '../apis/User'
import { mapState } from "vuex";

export default ({
    data() {
        return {
            id : 2,
            dialog: false,
        }


    },
    mounted(){

 //Liste des Stagiaires
        User.listUserByRole(this.id)
            .then(response =>{
                // console.log(response.data)
                this.$store.state.formation.itemsFormateur = response.data.users
                })
            .catch(error => console.log(error))

        },

    computed: {
        ...mapState['formation'],

        selectedFormateur:{
            get(){
                return this.$store.state.formation.selectedFormateur
            },
            set(data){
                this.$store.commit('UPDATE_FORMATION_FORMATEUR',data)
            }
    },

    }
})
</script>
