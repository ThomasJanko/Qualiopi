<template>
    <div>

 <!-- <v-navigation-drawer width="350" absolute mini-variant v-model="drawer" @click="drawer=!drawer" app class="blue-grey darken-1">
        <v-list dark>
          <div class="mx-auto text-center">

              <v-avatar
              size="60"
                color="orange"
              >
              <v-icon size="36">mdi-account</v-icon>
              </v-avatar>

              <h3>{{user.name}}</h3>
              <p class="caption mt-1">
                {{user.email}}
              </p>
              <v-divider class="my-3"></v-divider>
              <v-btn v-if="isLoggedIn"
                depressed
                rounded
                text  @click.prevent='logout()'
              >
                Connexion
              </v-btn>
              <v-divider class="my-3"></v-divider>
              <v-btn v-if="!isLoggedIn"
                depressed
                rounded
                text  @click.prevent='logout()'
              >
                Changer de compte
              </v-btn>
              <v-divider class="my-3"></v-divider>
              <v-btn v-if="!isLoggedIn"
                depressed
                rounded
                text
                @click.prevent='logout()'
              >
                Deconnection
              </v-btn>
            </div>
            <br/>
          <v-list-item class="font-weight-black" v-for="link in links" :key="link.text" router :to="link.route">
            <v-list-item-action>
              <v-icon>{{link.icon}}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
            <v-list-item-title>{{link.text}}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>

        </v-list>

      </v-navigation-drawer> -->

        <v-app-bar fixed flat class="pb-8"
            color="white"
        >
        <v-app-bar-nav-icon v-show="$vuetify.breakpoint.lgAndUp? false:true" class=" grey--text" @click="$vuetify.breakpoint.lg?'':drawer=!drawer"></v-app-bar-nav-icon>
            <v-toolbar-title>
                <span>
                    <v-img @click="home" :width="$vuetify.breakpoint.mdAndUp?'150px':'90px'" src="https://www.gestimum.com/wp-content/uploads/2018/07/cropped-gestimum_erp_pme.png"></v-img>
                </span>
            </v-toolbar-title>
            <v-spacer></v-spacer>
        <v-btn  text
            @click.prevent="Account"
            v-if="isLoggedIn"

            >
            <span v-show="$vuetify.breakpoint.mdAndUp?true:false" >Mon Compte</span>
                <v-icon :size="$vuetify.breakpoint.smAndUp? '24px' :'16px'" right>mdi-account</v-icon>
        </v-btn>

        <v-btn text
            @click.prevent="login"
            v-if="!isLoggedIn"

            >
            <span v-show="$vuetify.breakpoint.mdAndUp?true:false">Connexion</span>
                <v-icon :size="$vuetify.breakpoint.smAndUp? '24px' :'16px'" right>mdi-login</v-icon>
        </v-btn>
                 <!-- <v-btn text
                @click.prevent="subscribe"
                v-if="!isLoggedIn"
                >
                    <span v-show="$vuetify.breakpoint.mdAndUp?true:false">Incription</span>
                    <v-icon :size="$vuetify.breakpoint.smAndUp? '24px' :'16px'" right>mdi-login</v-icon>
                </v-btn> -->
        <v-btn text
            @click.prevent="logout"
            v-if="isLoggedIn"
            >
                <span v-show="$vuetify.breakpoint.mdAndUp?true:false">Déconnexion</span>
                    <v-icon :size="$vuetify.breakpoint.smAndUp? '24px' :'16px'" right>mdi-logout</v-icon>
        </v-btn>


      <!-- <v-app-bar-title >

         <v-btn  href="/" rounded color="orange" elevation="1" dark  height="40" width="100" :ripple="{ class: 'purple--text' }">  Acceuil </v-btn>
         <v-btn  href="/formation" rounded color="blue-grey darken-1" elevation="1" dark  height="40" width="100" :ripple="{ class: 'purple--text' }">  Formation </v-btn>
         </v-app-bar-title>

      <v-spacer></v-spacer>
        <v-btn  href="/testcreations" rounded color="blue-grey darken-1" elevation="1" dark  height="40" width="100" :ripple="{ class: 'purple--text' }"> Inscription </v-btn>

        <v-btn  v-if="!isLoggedIn" href="/login" rounded color="orange" elevation="1" dark  height="40" width="100" :ripple="{ class: 'purple--text' }">  Connection </v-btn>
        <v-btn v-if="isLoggedIn" href="/logout" rounded color="orange" elevation="1" dark  height="40" width="100" :ripple="{ class: 'purple--text' }" @click.prevent='logout()'>  Déconnection </v-btn>

      <v-menu
        top
      >

        <template v-slot:activator="{ on }">
          <v-btn
            icon
            x-large
            v-on="on"
          >
            <v-avatar
              color="blue-grey darken-1"
              size="48"
            >
              <v-icon>mdi-account</v-icon>
            </v-avatar>
          </v-btn>
        </template>
        <v-card>
          <v-list-item-content class="justify-center">
            <div class="mx-auto text-center">
              <v-avatar
                color="blue-grey darken-1"
              >
              <v-icon>mdi-account</v-icon>
              </v-avatar>
              <h3>{{user.name}}</h3>
              <p class="caption mt-1">
                {{user.email}}
              </p>
              <v-divider class="my-3"></v-divider>
              <v-btn v-if="!isLoggedIn"
                depressed
                rounded
                text  @click.prevent='logout()'
              >
                Connexion
              </v-btn>
              <v-divider class="my-3"></v-divider>
              <v-btn v-if="isLoggedIn"
                depressed
                rounded
                text  @click.prevent='logout()'
              >
                Changer de compte
              </v-btn>
              <v-divider class="my-3"></v-divider>
              <v-btn v-if="isLoggedIn"
                depressed
                rounded
                text
                @click.prevent='logout()'
              >
                Deconnection
              </v-btn>
            </div>
          </v-list-item-content>
        </v-card>
      </v-menu> -->

    </v-app-bar>
     <v-card>

<!-- :mini-variant.sync="mini" option v-navigation  -->
        <v-navigation-drawer flat clipped app class="pt-50"
            v-model="drawer"

            permanent

            >
            <v-list dense nav class="px-2">
                <v-list-item three-line>
                    <v-list-item-avatar>
                        <v-icon size="60" color="primary"> mdi-account</v-icon>
                            <!-- <v-img src="https://randomuser.me/api/portraits/men/85.jpg" ></v-img> -->
                    </v-list-item-avatar>
                    <v-list-item-content>
                        <h3 v-bind:style="styleObject"  v-if="!isLoggedIn"> Connection  </h3>
                            <v-list-item-title class="text-lg-subtitle-1" v-if="isLoggedIn">
                                <h3 v-bind:style="styleObject"  v-if="isLoggedIn"> Bienvenue  </h3>
                                    <p>{{users.name}} {{users.surname}} </p>
                                            <!-- <p>{{users.email}}</p> -->
                            </v-list-item-title>


                    </v-list-item-content>
                    <!-- <v-btn
                        icon
                        @click.stop="mini = !mini"
                        >
                        <v-icon>mdi-chevron-left</v-icon>
                    </v-btn> -->
                </v-list-item>
            </v-list>

            <v-divider ></v-divider>
                <v-list shaped>
                    <v-list-item-group v-model="model">
                        <v-list-item
                            v-for="(item, i) in items"
                            :key="i"
                            router :to="item.route"


                        >
                            <v-list-item-icon>
                                <v-icon v-text="item.icon"></v-icon>
                            </v-list-item-icon>
                            <v-list-item-content>
                                <v-list-item-title v-text="item.text"></v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                        <v-list-group
          :value="true"
          no-action
          sub-group
        >
          <template v-slot:activator>
            <v-list-item-content>
            <v-list-item-title> <v-icon>mdi-wrench-outline</v-icon> Administration</v-list-item-title>

            </v-list-item-content>
          </template>

          <v-list-item
            v-for="(admin, i) in admins"
            :key="i"
            router :to="admin.route"

          >
            <v-list-item-icon>
            <v-icon v-text="admin.icon"></v-icon>
            </v-list-item-icon>
            <v-list-item-content>
                <v-list-item-title v-text="admin.text"></v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-group>

                    </v-list-item-group>
                </v-list>
        </v-navigation-drawer>
    </v-card>
    <v-sheet
        id="scrolling-techniques-7"
        class="overflow-y-auto"
        max-height="600"
        >
        <div class="pt-14"></div>
    </v-sheet>
  </div>

</template>


<script>

import User from '../apis/User';
import { mapState } from "vuex";
export default {

        // props: ['user'],
        data() {
            return {

        isLoggedIn : false,
        offset: true,
        mini: true,
        user: null,
        drawer:false,
        model: 1,
        mini:true,
        ad:false, //valeur utilisé dans computed cuurent-side pour savoir de quelle coté

        //contient le menu admin
        items: [

             {
          icon: 'mdi-home',
          text: 'Accueil',
          route: '/',
        },
        {
          icon: 'mdi-account-multiple-plus',
          text: 'Créer un client',
          route: '/create-client',
        },
        {
          icon: 'mdi-account-multiple-plus-outline',
          text: 'Créer un utilisateur',
          route: '/creation-utilisateur',
        },
        {
          icon: 'mdi-playlist-edit',
          text: 'Formulaire formation',
          route: '/formation',

        },
        {
          icon: 'mdi-view-list-outline',
          text: 'Vos formations',
          route: '/client',

        },
          {
          icon: 'mdi-account',
          text: ' Mon Compte',
          route: '/account',
        },

      ],
      admins: [
            {
                icon: 'mdi-view-list',
                text: 'gestion List',
                route: '/gestionlistformation'
            },
      ],
        styleObject: {
        color:'#e37a39',
        fontSize: '20px'
        }
    }
  },

    methods: {

    //authentification
        login(){
            this.$router.push({name : 'login'})
            // this.isLoggedIn = true;
        },

        //enregistrement nouvel utilisateur
        subscribe(){
            this.$router.push({name : 'create-utilisateur'})
        },

        //déconnexion
        logout(){
            User.logout().then(() => {
                localStorage.removeItem('auth')
                this.isLoggedIn = false;
                this.users.name= '',
                this.users.email= '',
                this.$router.push({name : 'login'})
            })
        },

        test(){
            if(this.drawer==true){
            this.drawer=false;
            console.log(this.drawer)
            }

        },

        //aller à la page Account
        Account(){
            this.$router.push({name:'Account'}).catch(()=>{});
        },
                //click sur l'image du menu
        home(){

        this.ad=false;
        this.$router.push({name:'home'}).catch(()=>{});

        },
    },

    computed: {
        // ... mapState(['users']),
        users(){
            return this.$store.state.users;
        }

    },


    mounted() {
        //Utilisateur athentifié ?
        this.$root.$on('login', () => {
            this.isLoggedIn = true;
        })
        this.isLoggedIn = !! localStorage.getItem('auth');
    }
  };

</script>


<style>
    .pt-50{
        padding-top: 60px;
    };
    .li{
        text-decoration: none;
    }
</style>
