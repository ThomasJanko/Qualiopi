import Api from './Api';
import Csrf from './Csrf';

export default{



    async index()
    {
        await Csrf.getCookie();
        return Api.get('/listcategorie/categories');
    },

    async indexall()
    {
        await Csrf.getCookie();
        return Api.get('/listcategorie/categoriesall');
    },

    async add(form){
        await Csrf.getCookie();
        return Api.post('/add/categorie',form);

    },
    async edit(form){
        await Csrf.getCookie();
        return Api.post('/edit/categorie',form);

    },

    async delete(form){
        await Csrf.getCookie();
        return Api.post('/delete/categorie',form);

    },




}
