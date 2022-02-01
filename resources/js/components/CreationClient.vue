<template>


    <v-container >

        <h1 class='titre pa-15 ml-15 mr-15  justify-center grey--text ' color='red' > Créez le profil d'un nouveau client ! </h1>

         <v-snackbar width="1000" class="text-center" shaped bottom elevation="24"  :value="message=='false'?false:true" :color="error==true?'error':'success'" timeout="4000" >
             {{message}}
            </v-snackbar>
            <v-row  justify="center" no-gutters>
                <v-card  class="elevation-12 text-center" justify="center" width="600">

                    <v-col order="auto">
                        <v-card-title >
                            <p  :class=" $vuetify.breakpoint.mdAndUp? 'text-center primary--text  display-1 font-weight-bold' : 'text-center text-subtitle-1 primary--text font-weight-bold '">Nouveau Client</p>
                        </v-card-title>

                        <v-divider></v-divider>
                    </v-col>

                    <v-col order>

                    <v-card-text>


                        <v-form>
                            <v-text-field
                            label="Société*"
                            name="Society"
                            prepend-icon="mdi-format-title"
                            type="text"
                            color="primary accent-6"
                            v-model="form.social_reason">
                            </v-text-field>

                            <v-text-field
                            label="Email*"
                            name="Email"
                            prepend-icon="mdi-email"
                            type="email"
                            color="primary accent-6"
                            v-model="form.email">
                            </v-text-field>
                                <span class="red--text" v-if="errors.email">Adresse mail invalide ou déjà utilisée </span>


                            <v-text-field
                            label="Pays*"
                            name="Country"
                            prepend-icon=" mdi-flag-variant"
                            type="text"
                            color="primary accent-6"
                            v-model="form.country">
                            </v-text-field>

                             <v-text-field
                            label="Ville*"
                            name="City"
                            prepend-icon="  mdi-home-city-outline"
                            type="text"
                            color="primary accent-6"
                            v-model="form.city">
                            </v-text-field>

                             <v-text-field
                            label="Adresse*"
                            name="Address"
                            prepend-icon="mdi-google-maps"
                            type="text"
                            color="primary accent-6"
                            v-model="form.address">
                            </v-text-field>

                            <v-text-field
                            label="Code Postal*"
                            name="Postal"
                            prepend-icon="mdi-home-map-marker"
                            type="text"
                            color="primary accent-6"
                            v-model="form.postal">
                            </v-text-field>





                        </v-form>

                    </v-card-text>

                        <v-row>
                            <v-col>
                                <v-btn  class=" dark pa-2 primary" @keydown.enter="enregistrer()" :x-small="$vuetify.breakpoint.mdAndUp?false:true" @click="enregistrer(); close()" rounded>Enregistrer</v-btn>
                            </v-col>


                        </v-row>

                        <v-row>
                        </v-row>
                    </v-col >

                </v-card>
            </v-row>
        </v-container>


</template>





<script>


import Client from '../apis/Client'
export default {

    data(){
        return {

        form : {

        social_reason : '',
        email: '',
        address : '',
        city: '',
        country: '',
        postal: '',

        // client_id :''
        },

        message:"false",
        error: 'false',
        loader: null,
        loading3: false,



        errors : [],

        }

    },

    methods: {
        //ferme le popup
        close(){

                this.$emit('closeform')
        },
        //enregistre le nouveau client
        enregistrer(){
            Client.register(this.form)
            .then(()=> {

                this.loader = 'loading3';
                this.form ='';
                this.message="Client créé avec succés !";
                this.error=false;

            }).catch(error => {
                this.message="Echec lors de la création du client !";
                this.error=true;
                if(error.response.status === 422){
                    this.errors = error.response.data.errors;
                }
            })
        }
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
        console.log('Component mounted.')
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
