import Api from './Api';
import Csrf from './Csrf';

export default{

    //creation d'un user
    async register(form){
        await Csrf.getCookie();
        return Api.post('/register',form)
    },

     //connection d'un user
    async login(form){
        await Csrf.getCookie();
        return Api.post('/login',form)
    },

     //deconnection d'un user
    async logout(){
        await Csrf.getCookie();
        return Api.post('/logout')
    },

       //information des users
       async index(){
        await Csrf.getCookie();
        return Api.get('/test')
    },
       //Récupération des utilisateurs d'un client
       async listUserOfClient(id){
        await Csrf.getCookie();
        return Api.get('client/'+id+'/users/')
    },

    async listFormateur(){
        await Csrf.getCookie();
        return Api.get('/formation/formateur')
    },


     //modification d'un user
     async edit(id){
        await Csrf.getCookie();
        return Api.get('/edit/user/'+id)
    },

    //enregistrer modification d'un user
    async update(form){
        await Csrf.getCookie();
        return Api.post('/update/user',form)
    },

    //suppression d'un user
    async deactivate(id){
        await Csrf.getCookie();
        return Api.delete('/deactivate/user/'+id)
    },
    //changer mdp
    async resetPassword(form){
        await Csrf.getCookie();
         return Api.post("/resetPassword",form);
    },


    auth(){

        return Api.get('/user')
    },

         //List user par type role
         async listUserByRole(id){
            await Csrf.getCookie();
            return Api.get('/user/role/'+id)
        },
}
