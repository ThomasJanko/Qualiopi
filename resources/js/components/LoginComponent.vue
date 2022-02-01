<template>

 <v-container class=" fill-height my-5 " >
            <v-row  justify="center" no-gutters>
                <v-card  class="elevation-12 text-center" justify="center">

                    <v-col order="auto">
                        <v-card-title >
                            <p  :class=" $vuetify.breakpoint.mdAndUp? 'text-center primary--text  display-1 font-weight-bold' : 'text-center text-subtitle-1 primary--text font-weight-bold '">Mon accès privé à Gestimum</p>
                        </v-card-title>
                        <v-divider></v-divider>
                    </v-col>

                    <v-col order>

                    <v-card-text>

                        <!-- <div class="text-center ">
                            <v-btn icon :small="$vuetify.breakpoint.mdAndUp?false:true" href="https://www.facebook.com/gestimum/" class="mx-2" outlined="">
                                <v-icon :small="$vuetify.breakpoint.mdAndUp?false:true"  >mdi-facebook</v-icon>
                            </v-btn>
                            <v-btn icon :small="$vuetify.breakpoint.mdAndUp?false:true" href="https://www.linkedin.com/company/gestimum" class="mx-2" outlined>
                                <v-icon :small="$vuetify.breakpoint.mdAndUp?false:true">mdi-linkedin</v-icon>
                            </v-btn>
                            <v-btn icon :small="$vuetify.breakpoint.mdAndUp?false:true" href="https://twitter.com/gestimum_erp?lang=en" class="mx-2" outlined>
                                <v-icon :small="$vuetify.breakpoint.mdAndUp?false:true" >mdi-twitter</v-icon>
                            </v-btn>
                        </div> -->

                        <v-form>

                            <v-text-field
                            label="Email*"
                            name="Email"
                            prepend-icon="mdi-email"
                            type="email"
                            color="primary accent-6"
                            v-model="form.email">
                            </v-text-field>
                            <v-text-field
                            label="Mot de passe*"
                            name="password"
                            prepend-icon="mdi-lock"
                            :type="showPassword ? 'text' : 'password' "
                            :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'"
                            @click:append="showPassword=!showPassword"
                            color="primary accent-6"
                            @keydown.enter="login"
                            v-model="form.password">
                            </v-text-field>
                            <span class="text-danger" v-if="errors.email">
                            <p> Veuillez vérifier votre adresse email ou votre mot de passe !</p>
                            </span>
                            <!-- <span class="text-danger" v-if="errors.password">
                                <p> Votre mot de passe est incorrecte !</p>
                            </span> -->
                        </v-form>

                    </v-card-text>

                        <v-row>
                            <v-col>
                                <v-btn class=" dark pa-2 primary" :x-small="$vuetify.breakpoint.mdAndUp?false:true" @click.prevent="login" type="submit" rounded>Connexion</v-btn>
                            </v-col>
                            <v-spacer></v-spacer>
                            <v-col cols=auto>
                            <v-btn text class="accent--text pa-2" :x-small="$vuetify.breakpoint.mdAndUp?false:true">Mot de passe oublié ?</v-btn>

                            </v-col>
                        </v-row>

                        <v-row>
                        </v-row>
                    </v-col >
                    <v-progress-linear
                        :active="loading"
                        :indeterminate="loading"
                        absolute
                        bottom
                        color="#f78736"
                    >
                    </v-progress-linear>

                       <!-- <v-container style="height: 282px;">
      <v-row
        class="fill-height"
        align="center"
        justify="center"
      >
        <v-scale-transition>
          <div
            v-if="!loading"
            class="text-center"
          >
            <v-btn
              color="primary"
              @click="loading = true"
            >Start loading</v-btn>
          </div>
        </v-scale-transition>
      </v-row>
    </v-container> -->
                </v-card>

            </v-row>
        </v-container>


 <!--
     <v-container class="">


<v-flex row class="pt-2 text-center justify-center"  >
    <v-card dark style="background-image: url(https://cdn.wallpapersafari.com/63/74/IKPCHu.jpg)" class="" width="800" height="340"  shaped >
        <v-card-title >
            <v-icon  size="50">mdi-account</v-icon> <h2>Connectez-vous !</h2> <v-spacer> </v-spacer>
                <v-btn text rounded href="/testcreations"  mx-0 mt-3 >Créer un compte </v-btn>
        </v-card-title>
        <v-card-text >
         <v-form  class="px-3 " color="red--text" ref="form">
            <v-text-field class="orange--text" color="primary" type="email" label="Email" prepend-icon=" mdi-email" v-model="form.email"></v-text-field>
            <span class="red--text" v-if="errors.email">Votre adresse email ou votre mot de passe est incorrect</span>
                <v-text-field class="orange--text" color="primary" :type="showPassword ? 'text' : 'password' " :append-icon="showPassword ? 'mdi-eye' : 'mdi-eye-off'" label="Password" v-model="form.password"
                    prepend-icon=" mdi-lock"  @click:append="showPassword=!showPassword" ></v-text-field>



    <v-spacer></v-spacer>
    <div class="form-group f-flex justify-content-center">
        <v-btn
            :loading="loading3"
            :disabled="loading3"
            text rounded  class="success" mx-0 mt-3 @click.prevent="login(); loader = 'loading3' "  >Connection
        </v-btn>
    </div>
        </v-form>
        </v-card-text>
      </v-card>

</v-flex>



</v-container> -->

</template>

<script>


import User from "../apis/User"
import { mapState } from "vuex";
export default {

    data() {
        return {

            form:{
            email: '',
            password: '',

            },

            showPassword : false,
            password: '',
            name: '',
            email: '',
            text: `login in!`,
            loader: null,
            loading3: false,
            errors : [],
            loading: false,

        }

    },

    methods: {
        //authentification utilisateur
        login(){

        this.loading = true;

        User.login(this.form).then(response => {

            this.$root.$emit('login', true) //TODO: besoin0 d'éclaircifier le role de l'émit
            localStorage.setItem('auth', 'true');
            this.$router.push({ name : 'home'});
            this.$store.commit('INFO_USERS' , response.data)

            })
        .catch( error => {
            if(error.response.status === 422){
                this.errors = error.response.data.errors
                this.loading = false;
            }else if(error.response.status === 401){
                this.errors = error.response.data.errors
                console.log('vous avez été déconnectez')

            }
        })


        },

    },

//loading
     watch: {
       loader () {
         const l = this.loader
         this[l] = !this[l]

        setTimeout(() => (this[l] = false), 1000)

         this.loader = null
       },
           loading (val) {
        if (!val) return

        setTimeout(() => (this.loading = false), 500)
      }, else(val){
          return this.loading = true
      }
    },

    computed:{
       ... mapState(['users']),
        selectedClient:{
             get(){
                 return this.$store.state.formation.selectedClient
             },
             set(data){
                 this.$store.commit('UPTADE_FORMATION_CLIENT' , data)
             }
         },


    },



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


