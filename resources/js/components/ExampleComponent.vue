<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Test creation users</div>

                     <!-- <div class="card-body">
                        <label for=''>nom</label>
                        <input type="text"  class="form-control" aria-describedby=""> -->
                        <!-- <span class="red--text" v-if="errors.name">Le prénom ne peut être vide !</span> -->
                    <!-- </div> -->

                     <div class="card-body">
                        <label for=''>nom</label>
                        <input type="text"  class="form-control" aria-describedby="" v-model="form.name">
                        <!-- <span class="red--text" v-if="errors.surname === '' ">Le nom ne peut être vide !</span> -->
                    </div>
                     <div class="card-body">
                        <label for=''>prénom</label>
                        <input type="text"  class="form-control" aria-describedby="" v-model="form.surname">
                    </div>
                     <div class="card-body">
                        <label for=''>email</label>
                        <input type="text"  class="form-control" aria-describedby="" v-model="form.email">
                    </div>
                    <div class="card-body">
                        <label for=''>mot de passe</label>
                        <input type="text"  class="form-control" aria-describedby="" v-model="form.password">
                    </div>
                     <div class="card-body">
                        <label for=''>confirmation du mot de passe </label>
                        <input type="text"  class="form-control" aria-describedby="" v-model="form.password_confirmation">
                    </div>
                    <div>
                        <button @click="enregistrer()">enregistrer</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>



<script>

import Users from '../apis/User';

    export default {

        data(){
            return {

                form : {

                name : '',
                surname : '',
                email : '',
                password : '',
                password_confirmation : '',

               }, error : [],

        }

    },

        methods: {
            enregistrer(){
                Users.register(this.form)
                .then(()=> {
                    console.log('Vous êtes bien enegistré')
                }).catch(error => {
                    if(error.response.status === 422){
                        this.errors = error.response.data.errors;
                    }
                })
            }

        },



        mounted() {
            console.log('Component mounted.')
        }
}

</script>
