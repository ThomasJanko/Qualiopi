import Api from './Api';
import Csrf from './Csrf';

export default{



    async index()
    {
        return Api.get('/informations/')
    },



}
