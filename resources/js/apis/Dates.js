import Api from './Api';
import Csrf from './Csrf';

export default{


    async add(form){
        await Csrf.getCookie();
        return Api.post('create/datesformation/',form);

    },
    async update(id){
        await Csrf.getCookie();
        return Api.post('update/datesformation'+id);

    },

    async delete(id){
        await Csrf.getCookie();
        return Api.get('/delete/datesformation/'+id);

    },

    async index()
    {
        await Csrf.getCookie();
        return Api.get('/datesformation');
    }


}
