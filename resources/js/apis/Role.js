import Api from './Api';
import Csrf from './Csrf';

export default{

    //creation d'un role
    async register(form){
        await Csrf.getCookie();
        return Api.post('/register/role',form)
    },


}
