import Api from './Api';
import Csrf from './Csrf';

export default{


    async add(form){
        await Csrf.getCookie();
        return Api.post('add/listformation',form);

    },
    async edit(id){
        await Csrf.getCookie();
        return Api.post('/update/listformations',+id);

    },

    async delete(id){
        await Csrf.getCookie();
        return Api.get('/delete/listformation/'+id);

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


    async listcategories(id){
        await Csrf.getCookie();
        return Api.get('/formation/'+id+'/listcategories')
    },

    async listsouscategories(id){
        await Csrf.getCookie();
        return Api.get('/formation/'+id+'/listsouscategories')
    },
    async listcontenus(id){
        await Csrf.getCookie();
        return Api.get('/formation/'+id+'/listsouscategorie/listcontenus')
    },



    async categories()
    {
        await Csrf.getCookie();
        return Api.get('/listformation/categories/');
    },
    async souscategories()
    {
        await Csrf.getCookie();
        return Api.get('/listformation/souscategories/');
    },

    async contenus()
    {
        await Csrf.getCookie();
        return Api.get('/listformation/contenus/');
    },





}
