import Api from './Api';
import Csrf from './Csrf';

export default{



    async index()
    {
        await Csrf.getCookie();
        return Api.get('/listcategorie/contenus');
    },



}
