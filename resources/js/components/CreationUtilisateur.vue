<template>

    <v-container  >
            <v-row  justify="center" no-gutters>
                <v-card  class="elevation-12 text-center" justify="center" width="600">

                    <v-col order="auto">
                        <v-card-title slot="user-title" >
                             <slot v-if="!!$slots.title" name='title'/>
                            <p v-else :class=" $vuetify.breakpoint.mdAndUp? 'text-center primary--text  display-1 font-weight-bold' : 'text-center text-subtitle-1 primary--text font-weight-bold '">Nouvel Utilisateur</p>

                        </v-card-title>
                        <v-divider></v-divider>
                    </v-col>

                    <v-col order>

                    <v-card-text>




                        <v-form>
                            <v-text-field
                            label="Prénom"
                            name="Surname"
                            prepend-icon="mdi-format-title"
                            type="text"
                            color="primary accent-6"
                            v-model="form.surname">
                            </v-text-field>


                            <v-text-field
                            label="Nom"
                            name="Name"
                            prepend-icon=" mdi-format-text-variant-outline"
                            type="text"
                            color="primary accent-6"
                            v-model="form.name">
                            </v-text-field>


                            <v-text-field
                            label="Email"
                            name="Email"
                            prepend-icon="mdi-email"
                            type="email"
                            color="primary accent-6"
                            v-model="form.email">
                            </v-text-field>
                                 <span class="red--text" v-if="errors.email">Adresse mail invalide ou déjà utilisée </span>

                            <slot v-if="false" name="typeuser"/>

                            <v-autocomplete
                            v-model="roleId"
                            color="primary accent-6"
                            :items="roles"
                            dense
                            chips
                            :disabled="disabled"
                            small-chips
                            :label="label"
                            prepend-icon=" mdi-account"

                            > </v-autocomplete>

                                 <slot v-if="false" name="typesociety"/>
                             <v-autocomplete
                                v-model="selectedClient"
                                :items="$store.state.formation.itemsClient"
                                deletable-chips
                                clearable
                                dense
                                color=""
                                chips
                                :disabled="disabled"
                                small-chips
                                :label="label2"
                                prepend-icon=" mdi-format-text"
                                item-text="social_reason"
                                return-object
                            >


                                <template v-slot:selection="data">
                                <v-chip  v-text="data.item.social_reason"></v-chip>

                                </template>

                             </v-autocomplete>


                            <v-text-field
                            label="Mot de passe"
                            name="password"
                            prepend-icon="mdi-lock"
                            :type="showPassword ? 'text' : 'password' "
                            :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                            @click:append="showPassword=!showPassword"
                            :rules="inputRules"
                            color="primary accent-6"
                            v-model="form.password">
                            </v-text-field>

                             <v-text-field
                            label="Confirmation mot de passe"
                            name="confirm_password"
                            prepend-icon="mdi-lock"
                            :type="showPassword ? 'text' : 'password' "
                            :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                            @click:append="showPassword=!showPassword"

                            color="primary accent-6"
                            v-model="form.password_confirmation">
                            </v-text-field>









                        </v-form>

                    </v-card-text>

                        <v-row>
                            <v-col>
                                <v-btn class=" dark pa-2 primary"  :x-small="$vuetify.breakpoint.mdAndUp?false:true" @click="enregistrer(); close()" rounded>Enregistrer</v-btn>
                            </v-col>

                        </v-row>


                    </v-col >
                </v-card>
            </v-row>
        </v-container>



</template>


<script>


import User from '../apis/User';
import Client from '../apis/Client';
import { mapState } from "vuex";
export default {

    data(){
        return {

        form : {
        name : '',
        surname: '',
        email : '',
        password: '',
        roles_id: '',


        // client_id :''
        },
        disabled: false,
        showPassword: false,
        snackbar: false,
         text: `Successfully registered`,
        loader: null,
        loading3: false,
        inputRules: [
              v => v.length >= 4 || 'Minimum 4 caracters!'
            ],

        roles: ['Admin','Formateur','Client','Stagiaire'],
        errors : [],
        label: 'Role',
        label2 :'Société',
        selectedClient: [],
        roleId: '',
        }

    },

    methods: {

          close(){

                this.$emit('closeform')
        },
        enregistrer(){

            let form ={...this.form  }
            form.client_id = this.formation.selectedClient.id // ajout de l'id du client

        if(this.roleId ==='Admin'){
            form.role_id = '1';
        }else if(this.roleId ==='Client'){
             form.role_id = '2'
        }else if(this.roleId ==='Formateur'){
             form.role_id = '3'}
        else {form.role_id = '4'};
         // ajout de l'id du role

            User.register(form)// Il faut récupérer l'objet User créé -> l'ajouter dans le store dans selectedUser et mettre à jour itemsUsers dans le store
            .then(response=> {
                console.log(response.data)
                this.formation.selectedUser.push(response.data);

                 console.log(this.formation.selectedUser)
                this.form= {
                        name : '',
                        surname: '',
                        email : '',
                        password: '',

                        roles_id: ''


                        // client_id :''
                        }
                        this.roleId = [],
                        this.selectedClient= [],

                this.snackbar=true;
                console.log('Vous êtes bien eregistré')
            }).catch(error => {
                console.log('test')
                if(error.status === 422){
                    this.errors = error.data.errors;

                }
            })
        }
    },

    computed: {
            ...mapState (['formation']),
            //   selectedClient:{
            //     get(){
            //         return this.$store.state.formation.selectedClient
            //     },
            //   }
    },


    // loading
    watch: {
      loader () {
        const l = this.loader
        this[l] = !this[l]

        setTimeout(() => (this[l] = false), 1000)

        this.loader = null
      },
         },

    mounted() {

         Client.indexClient() //List des Clients
        .then(response =>{


            this.$store.state.formation.itemsClient= response.data

        })
        .catch(error => console.log(error))


        if(!!this.$slots.typeuser && this.$slots.typeuser[0].text =="Stagiaire"){
                this.form.role_id='4'
                this.label=this.$slots.typeuser[0].text
                this.disabled = true
        }
        if(!!this.$slots.typeuser && this.$slots.typeuser[0].text =="Formateur"){

                this.form.role_id='2'
                this.label=this.$slots.typeuser[0].text
                this.disabled = true
        }


        if(!!this.$slots.typesociety && this.$slots.typesociety[0].text =="Society"){

                this.label2=this.$store.state.formation.selectedClient.social_reason
                this.disabled = true
        }

        if(!!this.$slots.typesociety && this.$slots.typesociety[0].text =="Gestimum"){

                this.label2= 'Gestimum'
                this.disabled = true
        }






    }



    }


</script>

<style>


  .custom-loader {
    animation: loader 1s infinite;
    display: flex;
  }
  @-moz-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @-webkit-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @-o-keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
  @keyframes loader {
    from {
      transform: rotate(0);
    }
    to {
      transform: rotate(360deg);
    }
  }
</style>
