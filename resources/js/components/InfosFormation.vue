<template>
    <v-container>
        <h4 class="primary--text text-center text-uppercase font-weight"> <h1>{{infos.name_formation}}</h1> </h4>

            <v-row justify="center" class="card-body mx-auto my-12">
                <v-col cols="10">
                    <v-card elevation="14"  class="rounded-xl" max-width="774">

                            <!-- informations personnelles -->

                        <v-img
                            height="250"
                            src="https://mpc-informatique.fr/images/GESTIMUM-partenaire-expert-support.png">
                        </v-img>

                        <v-card-text class="pt-6">
                           <h4 color="secondary"> Formateur:</h4>
                            <h5  class="teal--text"> <v-icon size="32" >mdi-account-tie</v-icon> {{formateur[0].name}} {{formateur[0].surname}} </h5>
                            <h5  class="teal--text pl-9" > {{formateur[0].email}} </h5>

                        </v-card-text>


                            <v-card-text  >
                                <h4>Société: <v-chip  class="primary--text">{{client.social_reason}} </v-chip> </h4>
                                <br/> <br/>
                                <h5> Stagiaires: </h5>
                                <v-list-item
                            v-for="user in users"
                            :key="user.id"
                            >
                                <v-icon size="32" class="pb-4">mdi-account</v-icon><v-list-item-content class="teal--text" > <h5> {{user.name}} {{user.surname}}</h5> </v-list-item-content>
                                          <v-list-item-content class="teal--text text--darken-3"> <h5>{{user.email}}</h5> </v-list-item-content>
                                </v-list-item>

                            </v-card-text>



                            <v-card-text >
                                    <h4 class="secondary--text"> <v-icon>mdi-information-outline</v-icon> Informations:</h4>
                            </v-card-text>
                            <v-chip-group

                        class="pl-4"
                        active-class="teal accent-4 white--text"
                        column
                    >
                        <v-chip class="primary--text" >
                         {{infos.location_formation}}
                        </v-chip>

                         <v-chip class="primary--text" >
                         {{infos.date}} 10/03/2021
                        </v-chip>

                        <v-chip class="primary--text" >
                         {{infos.state_formation}}
                        </v-chip>

                         </v-chip-group>
                         <v-divider></v-divider>

                                <v-card-text>
                                <v-textarea disabled class="font-italic" v-model="informations.contenu"></v-textarea>
                                </v-card-text>
                                 <v-dialog
                                v-model="dialog"
                                width="600"
                                >




                                <PlanFormation  v-on:closeform='dialog = !dialog'>

                                </PlanFormation>

                     <template v-slot:activator="{ on, attrs }">
                    <v-card-actions class="pb-4 pr-4">
                        <v-spacer></v-spacer>
                    <v-btn  v-bind="attrs" v-on="on"
                    class="pb-4 pr-4"
                        color="deep-purple darken-3"
                        text

                    >
                        Plan de Formation
                    </v-btn>
                    </v-card-actions>
                    </template>
                    </v-dialog>


                    </v-card>
                </v-col>
            </v-row>
    </v-container>
</template>

<script>
import Formation from '../apis/Formation'
import { mapState } from "vuex";
export default {

    data: () => ({

    infos: [],
    users:[{
        name: '',
        surname: '',
        email: '',
    }],
    informations: [],


    client:[],

    dialog: false,
    }),



    mounted(){


        Formation.infosFormation(this.$route.params.id) //Infos de la formation sélectionnée
            .then(response =>{
                console.log(response.data)
            this.infos = response.data
            this.users = response.data.users
            this.client = response.data.client
            this.informations = response.data.informations

            console.log(this.users)
            })
            .catch(error => console.log(error))





    },

    methods: {

        // PlanFormation(id){


        //     this.$router.push({ name : 'planFormation', params: { id: id} });

        // }

    },

    computed : {

        ...mapState(['formation']),

        formateur(){
            return this.users.filter(a => a.role_id =='2')

        }
    }


}

</script>
