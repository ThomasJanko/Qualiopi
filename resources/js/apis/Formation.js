import Api from './Api';
import Csrf from './Csrf';

export default{


    async add(form){
        await Csrf.getCookie();
        return Api.post('/create/formation', form);

    },
    async edit(form){
        await Csrf.getCookie();
        return Api.post('/delete/formation', form);

    },

    async delete(form){
        await Csrf.getCookie();
        return Api.post('/update/formation', form);

    }

}
