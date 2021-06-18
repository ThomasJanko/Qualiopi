<template>
<v-app>

     <Navigation></Navigation>

<v-main>

        <router-view></router-view>


</v-main>
<footer-component></footer-component>
  </v-app>
</template>

<script>

import User from '../apis/User';
import FooterComponent from './FooterComponent.vue';
export default {
  components: { FooterComponent },

    // props: ['user'],

        data() {
            return {


        }

        },


//  mounted() {

//   this.$root.$on('login', () => {
//     this.isLoggedIn = true;
//   })
//  this.isLoggedIn = !! localStorage.getItem('auth');
// },

        mounted() {
            //infos utilisateur si authentifié
            if(localStorage.getItem("auth")=="true"){
                User.auth().then(response => {
                            this.$store.commit("INFO_USERS", response.data)
                        })


                 }
            }
        }






</script>

<style>
</style>
