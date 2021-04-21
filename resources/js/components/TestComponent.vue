
<template>
    <div>
        <h2>Afficher les users</h2>

    <!-- {{ userList }} -->
         <table class="table table-bordered">
        <tbody>
            <tr  v-for=" user in userList" :key="user.id">
                <td>{{user.name}}</td>
                <td>{{user.surname}}</td>
                <td>{{user.email}}</td>
                <td></td>

                <button @click="supprimer(user.id)">Désactiver</button>
            </tr>
        </tbody>
        </table>
    </div>

</template>


<script>

import User from '../apis/User.js'
export default {


data(){

        return{

            userList : [],
            user : '',
        }

},

methods: {
    supprimer(id){
        User.deactivate(id)
        .then((res) => {
            console.log('utilisateur désactivé')
            this.user.splice(1)
        }).catch(error => {
            console.log('utilisateur non désactivé')
        })
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


