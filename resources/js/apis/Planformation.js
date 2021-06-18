import Api from './Api';
import Csrf from './Csrf';

export default{


    async add(form){
        await Csrf.getCookie();
        return Api.post('create/planformation',form);

    },

    async PlanFormation(id){
        await Csrf.getCookie();
        return Api.get('/formation/'+id+'/plan/')
    },

    async infosPlanformation()
    {
        return Api.get('/planformation/')
    },

}
