<template>
    <v-container class="justify-center" >



            <v-row justify="center" class="card-body mx-auto my-12">

                <v-col cols="10">
                    <v-card elevation="14"  class="rounded-xl" max-width="774">
                        <h4 class="primary--text text-center text-uppercase font-weight"> <h1>{{infos.name_formation}}</h1> </h4>

                            <!-- informations personnelles -->

                        <v-img class="pt-8"
                            height="256"
                            src="https://mpc-informatique.fr/images/GESTIMUM-partenaire-expert-support.png">
                        </v-img>

                        <v-card-text class="pt-6">
                           <h4 color="secondary"> Formateur:</h4>
                            <h5  class="teal--text text--lighten-1"> <v-icon size="32" >mdi-account-tie</v-icon> {{formateur[0].name}} {{formateur[0].surname}} </h5>
                            <h5  class="teal--text text--lighten-2 pl-9" > {{formateur[0].email}} </h5>

                        </v-card-text>


                            <v-card-text  >
                                <h4>Société: <v-chip  class="teal--text text--lighten-2">{{client.social_reason}} </v-chip> </h4>
                                <br/> <br/>
                                <h5> Stagiaires: </h5>


                                <v-simple-table >
                            <template v-slot:default>
                            <thead>
                                <tr>
                                <th class="text-left teal--text text--lighten-2 font-weight-black">
                                    Nom
                                </th>
                                <th class="text-left teal--text text--lighten-2 font-weight-black">
                                    Email
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                v-for="stagiaire in stagiaires"
                                :key="stagiaire.id"
                                >
                                <td>{{ stagiaire.name }} {{ stagiaire.surname }}</td>
                                <td>{{ stagiaire.email }}</td>
                                </tr>
                            </tbody>
                            </template>
                        </v-simple-table>

                            </v-card-text>

                             <v-card-text class="pt-6" >
                                <h4 color="secondary"> Plans de Formation:</h4>
                                <v-dialog  v-for="planformation in planformations" :key="planformation.id"

                                width="600"
                                >

                                <LigneFormation :plan='planformation' v-on:closeform='dialog = !dialog'>

                                </LigneFormation>

                     <template v-slot:activator="{ on, attrs }" >
                                <v-card-actions class="pb-4 pr-4" >
                                <v-icon color="teal lighten-2">mdi-arrow-right-circle-outline</v-icon>
                                <v-btn  v-bind="attrs" v-on="on"

                                    color="deep-purple darken-3"
                                    text

                                >
                                    {{planformation.name_formation}}
                                </v-btn>
                                 <v-chip class="teal--text text--lighten-2" >
                         {{planformation.time_formation}} heures
                        </v-chip>

                                </v-card-actions>
                                </template>
                                </v-dialog>
                                  <v-dialog
                                v-model="newPlan"
                                width="600"
                                >




                                <CreationPlan :forma="formation"  v-on:closeplan='newPlan = !newPlan'>

                                </CreationPLan>

                     <template v-slot:activator="{ on, attrs }">
                    <v-card-actions class="pb-4 pr-4">
                    <v-row>
                            <v-col>
                                <v-btn outlined  v-bind="attrs" v-on="on" justify-center
                                    color="deep-purple darken-3"
                                    :x-small="$vuetify.breakpoint.mdAndUp?false:true"

                                    snackbar=true;
                                    loader = 'loading3'
                                    rounded
                                    text>
                                    Ajouter un PLan
                                </v-btn>

                        </v-col>
                    </v-row>
                    </v-card-actions>
                    </template>
                    </v-dialog>
                                </v-card-text>



                            <v-card-text >
                                    <h4 class="secondary--text"> <v-icon>mdi-information-outline</v-icon> Informations:
                                    <v-chip class="teal--text text--lighten-2" v-model="state" >
                         {{infos.location_formation}}
                        </v-chip>


                        <v-chip class="teal--text text--lighten-2" >
                         {{infos.state_formation}}
                        </v-chip>
                        </h4>

                            </v-card-text>

                        <v-chip-group v-for="(date,index) in dates" :key="index" class="pl-2" >
                        <v-chip class="teal--text text--lighten-2"  >
                          <v-icon left>mdi-calendar  </v-icon>
                          {{date.dateformation}}
                        </v-chip>
                        <v-chip class="teal--text text--lighten-2"  >
                            <v-icon left>mdi-clock-time-seven</v-icon>
                          {{date.heuredebut}} - {{date.heurefin}}
                        </v-chip>
                        </v-chip-group>

                         <v-divider></v-divider>

                                <v-card-text>

                                    <v-btn icon hide-details v-model="enabled" @click="enabled= !enabled">  <v-icon >mdi-clipboard-edit-outline</v-icon></v-btn>
                                <v-textarea :disabled="!enabled"
                                class="font-italic"
                                v-model="informations.contenu">

                                </v-textarea>
                                  </v-card-text>
                                  <v-flex justify-center>
                                 <v-btn outlined  justify-center
                                 v-if="state === 'En attente'"
                                    color="deep-purple darken-3"
                                    :x-small="$vuetify.breakpoint.mdAndUp?false:true"
                                    @click="changeState('valider')"
                                    rounded
                                    text>
                                    Valider Formation
                                </v-btn>
                                  <v-btn outlined justify-center
                                   v-if="state === 'En cours'"
                                    color="deep-purple darken-3"
                                    :x-small="$vuetify.breakpoint.mdAndUp?false:true"
                                    @click="changeState('terminer')"
                                    rounded
                                    text>
                                    Terminer Formation
                                </v-btn>
                                </v-flex>
                                <br/>
                                <br/>



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
    dates: [],
    users:[{
        name: '',
        surname: '',
        email: '',
    }],
    state: '',
    informations: [],
    planformations: [],

    form: {
        state_formation: '',
    },

    client:[],
    newPlan: false,
    dialog: false,
    enabled: false,
    }),



    mounted(){

    //Infos de la formation sélectionnée
        Formation.infosFormation(this.$route.params.id)
            .then(response =>{
                console.log(response.data)
            this.infos = response.data
            this.users = response.data.users
            this.client = response.data.client
            this.dates = response.data.dates
            this.informations = response.data.informations
            this.planformations = response.data.planformation
            this.state = response.data.state_formation


            // console.log(this.dates)
            })
            .catch(error => console.log(error))





    },

    methods: {

        changeState(state){
            let form = {... this.form}

            if(state =='valider'){
                form.state_formation = 'En cours'

            }
            else{
                form.state_formation = 'Terminée'

            }


            Formation.updateState(form, this.$route.params.id)
                .then(response => {



                    Formation.infosFormation(this.$route.params.id)
            .then(response =>{
                console.log(response.data)
            this.infos = response.data
            this.users = response.data.users
            this.client = response.data.client
            this.dates = response.data.dates
            this.informations = response.data.informations
            this.planformations = response.data.planformation
            this.state = response.data.state_formation


            // console.log(this.dates)
            })
            .catch(error => console.log(error))
                })
            }

    },

    computed : {

        ...mapState(['formation']),

        formateur(){
            return this.users.filter(a => a.role_id =='2')


        },

        stagiaires(){
            return this.users.filter(b => b.role_id == '4')

        }
    }


}

</script>
