import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);


export default new Vuex.Store({


    state : {


        //utilisateur connecté
        users : {

            id :'',
            name : '',
            surname : '',
            email : '',
        },

        formation:{
            selectedUser: [],
            selectedFormateur: {id: ''},
            selectedClient: {
                disable:''
            },
            selectedFormation: {id : ''},

            itemsStagiaire: [],
            itemsClient: [],
            itemsFormateur: [],
            clients: [],
            // selectedDate : [],

            selectedCategorie: [],
            ItemsSouscategories: [],
            selectedSouscategorie: [],
            contenus: [],
        },


        events:[],

        dates : [],

        calendar:{

            dateformation:[],
            heuredebut: [],
            heurefin:[],
        },





    },


    mutations : {

        INFO_USERS(state, n){
            state.users = {...n};
        },
        // Mettre à jour les infos du l'autocomplete
        UPTADE_FORMATION_CLIENT(state, data){

            if(data == null){
                data = {
                    disable: ''
                }
          }
            state.formation.selectedClient = data;

        },

        UPDATE_FORMATION_USER(state, data){
            state.formation.selectedUser = data;
        },

        UPDATE_FORMATION_FORMATEUR(state, data){
            state.formation.selectedFormateur = data;
        },

        UPDATE_FORMATION_FORMATION(state, data){
            state.formation.selectedFormation = data;
        },

        //Reset du champ
        RESET_SELECTED_CLIENT(state){
            let reset = {
                 disable: ''
            }
            state.formation.selectedClient = reset;
        },


        UPDATE_ITEMS_USER(state, data){
            state.formation.itemsStagiaire = data;
        },

        UPDATE_ITEMS_CLIENT(state, data){
            state.formation.itemsClient = data;
        },

        UPDATE_CLIENTS(state, data){
            state.formation.clients = data;
        },

        UPDATE_ITEMS_FORMATEUR(state, data){
            state.formation.itemsFormateur = data;
        },

        // UPDATE_FORMATION_DATE(state, data){
        //     state.events.selectedDate = data;
        // },
        // UPDATE_START(state, data){
        //     state.events.start = data;
        // },
        // UPDATE_END(state, data){
        //     state.events.end = data;
        // },

        UPDATE_SELECTED_CATEGORIE(state, data){
            state.formation.selectedCategorie = data;
        },

        RESET_ITEMS_SOUSCATEGORIES(state){
            let reset = {
                 disable: ''
            }
            state.formation.ItemsSouscategories = reset;
        },



        UPDATE_ITEMS_SOUSCATEGORIES(state, data){
            state.formation.ItemsSouscategories = data;
        },


        UPDATE_SELECTED_SOUSCATEGORIE(state, data){
            state.formation.selectedSouscategorie = data;
        },

        UPDATE_ITEMS_CONTENUS(state, data){
            state.formation.contenus = data;
        },



        UPDATE_EVENT(state, data){
            state.events.push(data);
        },

        UPDATE_DATEFORMATION(state, data){
            state.calendar.dateformation = data;
        },

        UPDATE_HEUREDEBUT(state, data){
            state.calendar.heuredebut = data;
        },

        UPDATE_HEUREFIN(state, data){
            state.calendar.heurefin = data;
        },

        UPDATE_DATES(state, data){
            state.dates = data;
        }



    },

    actions:{
        //attend le reset avant l'uptadate
        async UPDATE_FORMATION_CLIENT({commit},data){
            commit('UPTADE_FORMATION_CLIENT',data , await commit('RESET_SELECTED_CLIENT'))
        },

        UPDATE_ITEMS_USER({commit},data){
            commit('UPTADE_ITEMS_USER',data )
        },

        UPDATE_ITEMS_Client({commit},data){
            commit('UPTADE_ITEMS_CLIENT',data )
        },

        UPDATE_CLIENTS({commit},data){
            commit('UPTADE_CLIENTS',data )
        },




        UPDATE_ITEMS_FORMATEUR({commit},data){
            commit('UPTADE_ITEMS_FORMATEUR',data )
        },

        UPDATE_DATEFORMATION({commit},data){
            commit('UPDATE_DATEFORMATION',data )
        },

        UPDATE_HEUREDEBUT({commit},data){
            commit('UPDATE_HEUREDEBUT',data )
        },

        UPDATE_HEUREFIN({commit},data){
            commit('UPDATE_HEUREFIN',data )
        },
        // UPDATE_FORMATION_DATE({commit},data){
        //     commit('UPTADE_FORMATION_DATE',data )
        // },
        // UPDATE_START({commit},data){
        //     commit('UPTADE_START',data )
        // },
        // UPDATE_END({commit},data){
        //     commit('UPTADE_END',data )
        // },
        // UPDATE_EVENT({commit},data){
        //     commit('UPTADE_EVENT',data )
        // },


        async UPDATE_ITEMS_SOUSCATEGORIES({commit},data){
            commit('UPDATE_ITEMS_SOUSCATEGORIES',data, await commit('RESET_ITEMS_SOUSCATEGORIES'))
        },

        UPDATE_SELECTED_SOUSCATEGORIE({commit},data){
            commit('UPDATE_SELECTED_SOUSCATEGORIE',data )
        },

        UPDATE_SELECTED_CATEGORIE({commit},data){
            commit('UPDATE_SELECTED_CATEGORIE',data )
        },

        UPDATE_ITEMS_CONTENUS({commit},data){
            commit('UPDATE_ITEMS_CONTENUS',data )
        },


        UPDATE_SDATES({commit},data){
            commit('UPDATE_DATES',data )
        },

    }

})
