import Api from './Api';
import Csrf from './Csrf';

export default{


    async add(form){
        await Csrf.getCookie();
        return Api.post('/create/formation',form);

    },
    async edit(form){
        await Csrf.getCookie();
        return Api.post('/delete/formation',form);

    },

    async delete(form){
        await Csrf.getCookie();
        return Api.post('/update/formation',form);

    },
    async index()
    {
        return Api.get('/formations/')
    },

    async indexUserAuth()
    {
        return Api.get('/formations/client');
    },

    async infosFormation(id){
        await Csrf.getCookie();
        return Api.get('/formation/'+id+'/infos/')
    },


}
