import Api from './Api';
import Csrf from './Csrf';

export default{

    //test
    async test(){
        await Csrf.getCookie();
        return Api.get('/test')
    }
}
