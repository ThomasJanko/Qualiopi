<template>
    <div>
        <h2>Afficher les relations</h2>

    <!-- {{ userList }} -->

         <table class="table table-bordered">
        <tbody>
            <tr  v-for=" user in userList" :key="user.id">
                <td>{{user.name}}</td>
                <td>{{user.surname}}</td>
                <td>{{user.email}}</td>
                <td>{{user.role_id}}</td>
                <td>{{user.client_id}}</td>
                <td></td>

                <button @click="supprimer(user.id)">Désactiver</button>
            </tr>
        </tbody>
        </table>

        <!-- <button @click="test()">tests</button>
        {{testLog}} -->

           <v-btn @click="test()"
      rounded
      color="primary"
      dark
    >
      Test
    </v-btn>
    {{testLog}}


    </div>

</template>


<script>

import User from '../apis/User.js'
import Test from '../apis/Test.js'

export default {

data(){

    return{

        userList : [],
        user : '',
        testLog :[]
     }

},

methods: {
    //
    supprimer(id){
        User.deactivate(id)
        .then((res) => {
            console.log('utilisateur désactivé')
            this.user.splice(1)
        }).catch(error => {
            console.log('utilisateur non désactivé')
        })
    },
    test(){
        Test.test()
        .then(response => this.testLog = response.data)

    }
},

mounted(){

    User.index()
    .then( response => {
        this.userList = response.data.users
    })
}


}
</script>


