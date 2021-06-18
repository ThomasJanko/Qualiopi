
 require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex';
import router from './router';
import vuetify from './plugins/vuetify.js'
import store from './store';
import Vuetify from 'vuetify/lib';
import { VDigitalTimePicker } from 'v-digital-time-picker'




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
Vue.component('CreationPlan', require('./components/CreationPlan.vue').default);
Vue.component('ListFormation', require('./components/ListFormation.vue').default);
Vue.component('GestionListFormation', require('./components/GestionListFormation.vue').default);
Vue.component('LigneFormation', require('./components/LigneFormation.vue').default);
Vue.component('Categories', require('./components/Categories.vue').default);
Vue.component('SousCategories', require('./components/SousCategories.vue').default);
Vue.component('Contenus', require('./components/Contenus.vue').default);
Vue.component('CreationCategorie', require('./components/CreationCategorie.vue').default);
Vue.component('CreationSousCategorie', require('./components/CreationSousCategorie.vue').default);
Vue.component('CreationContenu', require('./components/CreationContenu.vue').default);
Vue.component('v-digital-time-picker', VDigitalTimePicker)





 const app = new Vue({
    mode: 'history',
    el: '#app',
    store,
    router,
    vuetify,



    })




