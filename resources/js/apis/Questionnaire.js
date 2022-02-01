import Api from './Api';
import Csrf from './Csrf';

export default{


    async add(form){
        await Csrf.getCookie();
        return Api.post('create/quizz/',form);

    },
    async update(id){
        await Csrf.getCookie();
        return Api.post('update/quizz'+id);

    },

    async delete(id){
        await Csrf.getCookie();
        return Api.get('/delete/quizz'+id);

    },

    async index()
    {
        await Csrf.getCookie();
        return Api.get('/quizz');
    },

    // async questionnaire(id){
    //     await Csrf.getCookie();
    //     return Api.get('/planformation/questionnaire'+id);

    // },




}
