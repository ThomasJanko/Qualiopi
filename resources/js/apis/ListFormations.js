import Api from './Api';
import Csrf from './Csrf';

export default{


    async add(form){
        await Csrf.getCookie();
        return Api.post('create/listformations',form);

    },
    async edit(id){
        await Csrf.getCookie();
        return Api.post('/update/listformations',+id);

    },

    async delete(id){
        await Csrf.getCookie();
        return Api.delete('/deactivate/listformations',+id);

    },

    async index()
    {
        await Csrf.getCookie();
        return Api.get('/listformations');
    },

    async listFormation(){
        await Csrf.getCookie();
        return Api.get('/formation/listformations/')
    },

    async listsouscategories(id){
        await Csrf.getCookie();
        return Api.get('/formation/'+id+'/listsouscategories')
    },



    async test(){
        await Csrf.getCookie();
        return Api.get('/formation/test/')
    },

}
