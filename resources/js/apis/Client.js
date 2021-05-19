import Api from './Api';
import Csrf from './Csrf';

export default{

    //creation d'un client
    async register(form){
        await Csrf.getCookie();
        return Api.post('/register/client',form)
    },

    // information d'un client
    async indexClient(){
        await Csrf.getCookie();
        return Api.get('/info/client')
    },

     //modification d'un  client
     async editClient(id){
        await Csrf.getCookie();
        return Api.get('/edit/client/'+id)
    },

    //enregistrer modification d'un  client
    async updateClient(form){
        await Csrf.getCookie();
        return Api.post('/update/client',form)
    },

    //suppression d'un  client
    async deactivateClient(id){
        await Csrf.getCookie();
        return Api.delete('/deactivate/client/'+id)
    },


}
