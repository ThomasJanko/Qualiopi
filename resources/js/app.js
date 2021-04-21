
require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex';
import router from './router';


window.Vue = require('vue');


Vue.use(Vuex);




//Importation  des composants
Vue.component('Homecomponent', require('./components/HomeComponent.vue').default); //premier composant chargé dans blade il doit etre en minuscule dans welcome.blade.php // peut etre en majuscule dans app.blade.php
Vue.component('ExampleComponent', require('./components/ExampleComponent.vue').default);
Vue.component('TestComponent', require('./components/TestComponent.vue').default);



 const app = new Vue({
    el: '#app',
    router,

    // store,

    })
