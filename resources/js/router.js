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
import CreationPlan from './components/CreationPlan'
import ListFormation from './components/ListFormation'
import GestionListFormation from './components/GestionListFormation'
import LigneFormation from './components/LigneFormation'
// import Categories from './components/Categories'

import SousCategories from './components/SousCategories'
import Contenus from './components/Contenus'


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
            name : 'CreationPlan',
            path : '/create-plan/:id',
            component : CreationPlan,
        },
        {
            name : 'listFormation',
            path : '/listformation/:id',
            component : ListFormation,
        },
        {
            name : 'GestionListFormation',
            path : '/gestionlistformation/',
            component : GestionListFormation,
        },
        {
            name : 'ligneFormation',
            path : '/ligneformation/:id',
            component : LigneFormation,
        },
        // {
        //     name : 'categories',
        //     path : '/categories',
        //     component : Categories,
        // },
        {
            name : 'souscategories',
            path : '/souscategories',
            component : SousCategories,
        },
        {
            name : 'contenus',
            path : '/contenus',
            component : Contenus,
        },


    ]
})

export default router;
