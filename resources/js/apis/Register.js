import Api from "./Api";
import Csrf from './Csrf';

export default {


    register(form){
        return Api.post("/register", form);
    }
}
