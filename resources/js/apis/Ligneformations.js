import Api from './Api';
import Csrf from './Csrf';

export default{


    async add(form){
        await Csrf.getCookie();
        return Api.post('create/ligneformation',form);

    },

    async index(){
        await Csrf.getCookie();
        return Api.get('index/ligneformation');

    },

    async lignesFormation(id){
        await Csrf.getCookie();
        return Api.get('/formation/'+id+'/lignesformation/')
    },


}
