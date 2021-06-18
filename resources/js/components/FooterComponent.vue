<template>


    <v-footer  app color="#f78736" max-height="70px">
        <v-col>
            <v-row justify="center"
                class="text-center  px-2 mx-2"
                no-gutters


            >

            <!-- bouton "contacter" -->
            <v-btn text class="disable size"  color="white" :x-small="$vuetify.breakpoint.mdAndUp? false :true">
                Contact
            </v-btn>
            <v-btn icon small style="text-decoration:none" href="mailto:contact@gestimum.com" color="white" >
                <v-icon>mdi-email</v-icon>
            </v-btn>
            <v-btn icon small style="text-decoration:none; color:black" color="white">
                <v-icon>mdi-phone</v-icon>
            </v-btn>
            <v-btn icon small style="text-decoration:none; color:black" color="white">
                <v-icon>mdi-home</v-icon>
            </v-btn>
            <v-divider inset vertical></v-divider>

            <!-- bouton "confidentialité" -->
            <v-btn text  :x-small="$vuetify.breakpoint.mdAndUp? false :true" color="white">
                Confidentialité
            </v-btn>
            <v-divider inset vertical></v-divider>

            <!-- bouton "mentions legales" -->
            <v-btn text  :x-small="$vuetify.breakpoint.mdAndUp? false :true" href="https://www.gestimum.com/mentions-legales/" color="white">
                Mentions Légales
            </v-btn>
            <v-divider inset vertical></v-divider>

            <!-- bouton "nous suivre" -->
            <v-btn text class="disable" :x-small="$vuetify.breakpoint.mdAndUp? false :true" style="text-decoration:none;pointer-events: none" color="white">Nous suivre</v-btn>

            <v-btn icon small style="text-decoration:none" href="https://twitter.com/gestimum_erp" target="_blank" color="white">
                <v-icon >mdi-twitter</v-icon>
            </v-btn>
            <v-btn icon small style="text-decoration:none; color:black"  href="https://www.facebook.com/gestimum" target="_blank" color="white">
                <v-icon >mdi-facebook</v-icon>
            </v-btn>
            <v-btn icon small style="text-decoration:none; color:black" target="_blank" href="https://www.youtube.com/channel/UCOuX7-emD48GQVOKhYT9bsQ" color="white">
                <v-icon >mdi-youtube</v-icon>
            </v-btn>
            <v-btn icon small style="text-decoration:none; color:black" target="_blank" href="https://www.linkedin.com/company/gestimum" color="white">
                <v-icon >mdi-linkedin</v-icon>
            </v-btn>
            </v-row>

            <!-- bouton "copyright" -->
            <v-col class="text-center">
                <v-icon small color="white">mdi-copyright</v-icon><v-btn text class="disable" :x-small="$vuetify.breakpoint.mdAndUp? false :true" style="text-decoration:none;pointer-events: none" color="white">Gestimum 2021</v-btn>
            </v-col>
        </v-col>
    </v-footer>
</template>

<script>

export default {


}


</script>


<style>



</style>
