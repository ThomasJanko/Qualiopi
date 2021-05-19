import Vue from 'vue';

import routerVue from 'vue-router';
Vue.use(routerVue);

//import des composants:
import HomeComponent from './components/HomeComponent';
import TestRelationsComponent from './components/TestRelationsComponent';
import CreationUtilisateur from './components/CreationUtilisateur';
import LoginComponent from './components/LoginComponent';
import FormationComponent from './components/FormationComponent';
import ClientComponent from './components/ClientComponent';
import CreationClient from './components/CreationClient';
import AccountComponent from './components/AccountComponent';
import InfosFormation from './components/InfosFormation';
import PlanFormation from './components/PlanFormation'
import ListFormation from './components/ListFormation'



// Router :
const router = new routerVue ({
    mode: 'history',
    routes : [

        {
            name : 'home',
            path : '/',
            component : HomeComponent,
        },

        {
            name : 'test',
            path : '/test',
            component : TestRelationsComponent,
        },

        {
            name : 'create-utilisateur',
            path : '/creation-utilisateur',
            component : CreationUtilisateur,
        },
        {
            name : 'login',
            path : '/login',
            component : LoginComponent,
        },
        {
            name : 'formation',
            path : '/formation',
            component : FormationComponent,
        },
        {
            name : 'client',
            path : '/client',
            component : ClientComponent,
        },
        {
            name : 'create-client',
            path : '/create-client',
            component : CreationClient,
        },
        {
            name : 'Account',
            path : '/account',
            component : AccountComponent,
        },

        {
            name : 'infosFormation',
            path : '/infos-formation/:id',
            component : InfosFormation ,
        },
        {
            name : 'planFormation',
            path : '/planformation/:id',
            component : PlanFormation,
        },
        {
            name : 'listFormation',
            path : '/listformation/:id',
            component : ListFormation,
        },


    ]
})

export default router;
