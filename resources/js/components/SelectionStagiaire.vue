<template>


<v-row class="pl-3">
    <v-row>
        <v-flex col-6>
          <v-autocomplete height="50"
            v-model="selectedUser"
            :items="$store.state.formation.itemsStagiaire"
            outlined
            rounded
            clearable
            dense
            color="orange"
            chips
            small-chips
            label="Sélection Stagiaire"
            multiple
            item-text="email"
            item-value="id"
          >


                <template v-slot:selection="data">
                  <v-chip color="orange" v-text="data.item.name"></v-chip> |

                </template>

            </v-autocomplete>

</v-flex>

    <v-flex col-3 class="pt-5">
        <v-dialog
      v-model="dialog"
      width="500"
    >
       <template v-slot:activator="{ on, attrs }"> <v-btn  v-bind="attrs"
          v-on="on" class=" dark pa-2 primary"  > <v-icon>mdi-account-plus</v-icon>Stagiaire</v-btn>  </template>


       <CreationUtilisateur v-on:closeform="dialog=!dialog" >
           <template v-slot:title>
               <p  :class=" $vuetify.breakpoint.mdAndUp? 'text-center primary--text  display-1 font-weight-bold' : 'text-center text-subtitle-1 primary--text font-weight-bold '">Nouveau Stagiaire</p>
           </template>
        <template v-slot:typeuser>Stagiaire</template>
        <template v-slot:typesociety>Society</template>
       </CreationUtilisateur>


    </v-dialog>
    </v-flex>
</v-row>

</v-row>
</template>
<script>
import User from '../apis/User'
import { mapState } from "vuex";

export default ({
    data() {
        return {
            dialog: false,
        }


    },
    mounted(){


        User.listUserOfClient(this.$store.state.formation.selectedClient.id) //List des Stagiaires
            .then(response =>{
            this.$store.state.formation.itemsStagiaire= response.data

                })
            .catch(error => console.log(error))

        },
    computed: {
        ...mapState['formation'],

        selectedUser:{
            get(){
                return this.$store.state.formation.selectedUser
            },
            set(data){
                this.$store.commit('UPDATE_FORMATION_USER',data)
            }
    },
    }
})
</script>
