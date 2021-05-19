
 require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex';
import router from './router';
import vuetify from './plugins/vuetify.js'
import store from './store';
import Vuetify from 'vuetify/lib';


window.Vue = require('vue');


Vue.use(Vuex);




//Importation  des composants
Vue.component('Homecomponent', require('./components/HomeComponent.vue').default); //premier composant chargé dans blade il doit etre en minuscule dans welcome.blade.php // peut etre en majuscule dans app.blade.php
Vue.component('CreationUtilisateur', require('./components/CreationUtilisateur.vue').default);
Vue.component('maincomponent', require('./components/maincomponent.vue').default);
Vue.component('TestRelationsComponent', require('./components/TestRelationsComponent.vue').default);
Vue.component('ClientComponent', require('./components/ClientComponent.vue').default);
Vue.component('SelectionStagiaire', require('./components/SelectionStagiaire.vue').default);
Vue.component('Navigation', require('./components/Navigation.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
Vue.component('CreationClient', require('./components/CreationClient.vue').default);
Vue.component('SelectionFormateur', require('./components/SelectionFormateur.vue').default);
Vue.component('SelectionFormateur', require('./components/SelectionFormateur.vue').default);
Vue.component('SelectionCalendar', require('./components/SelectionCalendar.vue').default);
Vue.component('PlanFormation', require('./components/PlanFormation.vue').default);



 const app = new Vue({
    mode: 'history',
    el: '#app',
    store,
    router,
    vuetify,


    })




