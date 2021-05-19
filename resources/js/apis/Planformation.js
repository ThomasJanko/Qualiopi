import Api from './Api';
import Csrf from './Csrf';

export default{



    async index()
    {
        return Api.get('/planformation/')
    },


    async PlanFormation(id){
        await Csrf.getCookie();
        return Api.get('/formation/'+id+'/plan/')
    }
}
