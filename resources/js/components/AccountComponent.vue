<template>
    <v-container>

        <h1 class='titre pa-15 ml-15 mr-15 justify-center grey--text ' color='red' > Votre compte personnel !</h1>
<!--
        <h4 class="primary--text text-center text-uppercase"><v-icon :size="$vuetify.breakpoint.smAndUp? '24px' :'16px'" right>mdi-account</v-icon> Compte personnel </h4> -->


                    <!-- message d'alerte en reponse à la modification d'un mot de passe -->
                <v-snackbar  shaped bottom elevation="24"  :value="message=='false'?false:true" :color="error==true?'error':'success'" timeout="4000" >
             {{message}}
            </v-snackbar>

            <v-row justify="center" class="card-body">
                <v-col cols="10">
                    <v-card elevation="14" >

                            <!-- informations personnelles -->
                        <v-card-title class="text-center">
                            <v-icon :size="$vuetify.breakpoint.smAndUp? '24px' :'16px'" right color="f78736">mdi-information-variant </v-icon>
                            <h4 class="primary--text text-center">Informations personnelles</h4>
                        </v-card-title>

                        <v-card-text>
                            <v-text-field disabled type="email" label="E-mail" v-model="$store.state.users.email"></v-text-field>
                        </v-card-text>

                        <v-card-text>
                        <v-text-field disabled label="Nom" v-model="$store.state.users.name"></v-text-field>
                        </v-card-text>


                                <!-- changer de mot de passe -->
                        <v-card-title>
                            <v-icon :size="$vuetify.breakpoint.smAndUp? '24px' :'16px'" right color="f78736">mdi-border-color </v-icon>
                            <h4 class="primary--text text-center" >Changer votre mot de passe</h4>
                        </v-card-title>




                                <!-- mot de passe actuel -->
                        <v-card-text>
                            <v-text-field for="password"
                                    label="Ancien mot de passe*"
                                    type="password"
                                    v-model="form.CurrentPassword"
                                    id="Currentpassword"
                                ></v-text-field>
                                <span class="text-danger" v-if="errors.CurrentPassword">
                                    <p> Veuillez vérifier votre ancien mot de passe !</p>
                                </span>
                        </v-card-text>

                                <!-- nouveau mot de passe  -->
                        <v-card-text>
                            <v-text-field for="password"
                                    label="Nouveau mot de passe*"
                                    type="password"
                                    v-model="form.password"
                                    id="password"
                                ></v-text-field>
                                <!-- <span class="text-danger" v-if="errors.password">
                                    <p> Nouveau de passe obligatoire !</p>
                                </span> -->
                        </v-card-text>

                                <!-- confirmation nouveau mot de passe -->
                        <v-card-text>
                            <v-text-field
                                label="Confirmation mot de passe*"
                                for="password_confirmation"
                                type="password"
                                v-model="form.password_confirmation"
                                id="password_confirmation"
                            >
                            </v-text-field>
                            <span class="text-danger" v-if="errors.password_confirmation">
                                <p> Vos nouveaux mots passes sont différents !</p>
                            </span>
                        </v-card-text>

                        <!-- bouton de validation -->
                        <v-card-actions>
                            <v-btn   class="primary text-center"
                            @click="resetPassword"
                            >
                                modifier mot de passe
                            </v-btn>
                        </v-card-actions>
                    <p>&nbsp;</p>
                    </v-card>
                </v-col>
            </v-row>

    </v-container>

</template>
<script>
import {mapState} from 'vuex';
import User from "../apis/User";

export default {
    data() {
        return {
            form:{
                password:"",
                password_confirmation:"",
                email:"",
                CurrentPassword:"",
            },
            errors:[],
            error:'',
            message:"false",
        }
    },


    mounted() {
        //Infos des utilisateurs
        User.index()
        .then(response =>{

            this.items=response.data
            // console.log(this.items)

            })
        .catch(error => console.log(error))

    },
    methods: {

        //methode de modification de mot de passe
        resetPassword(){

            this.form.email=this.users.email;

                User.resetPassword(this.form)
                .then(response => {
                    if(response.data==true){
                        this.message="Mot de passe modifié avec succès !!";
                        this.error=false;
                        this.form= {
                            password:"",
                            password_confirmation:"",
                            CurrentPassword:"",
                        }
                    }else{
                        this.message="Erreur lors de la modification, mot de passe actuel incorrect !!";
                        this.error=true;
                    }
                })
                .catch(error => {
                    if (error.response.status === 422) {
                        this.errors = error.response.data.errors;
                    }
                            this.message="Erreur lors de la modification, vérifiez tous les champs !!";
                            this.error=true;
                    });
                this.message="false";
        }
    },

    computed: {
    ...mapState(['users']),
    },
}
</script>
