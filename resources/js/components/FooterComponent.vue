<template>
    <v-footer  app
    color="white"
        >
            <v-col >
<v-row justify="center"
            class="text-center px-2 mx-2"
            no-gutters>
                        <!-- bouton "contacter" -->
                <v-btn text class="disable"  color="dark" :x-small="$vuetify.breakpoint.mdAndUp? false :true">
                   Contacter
                </v-btn>
                <v-btn icon small style="text-decoration:none" href="mailto:contact@gestimum.com" >
                    <v-icon >mdi-email</v-icon>
                </v-btn>
                <v-btn icon small style="text-decoration:none; color:black">
                    <v-icon>mdi-phone</v-icon>
                </v-btn>
                <v-btn icon small style="text-decoration:none; color:black">
                    <v-icon>mdi-home</v-icon>
                </v-btn>
                <v-divider inset vertical></v-divider>

                        <!-- bouton "confidentialité" -->
                <v-btn text  :x-small="$vuetify.breakpoint.mdAndUp? false :true">
                    Confidentialité
                </v-btn>
                <v-divider inset vertical></v-divider>

                        <!-- bouton "mentions legales" -->
                <v-btn text  :x-small="$vuetify.breakpoint.mdAndUp? false :true" href="https://www.gestimum.com/mentions-legales/">
                    Mentions Légales
                </v-btn>
                <v-divider inset vertical></v-divider>

                        <!-- bouton "nous suivre" -->
                <v-btn text class="disable" :x-small="$vuetify.breakpoint.mdAndUp? false :true" style="text-decoration:none;pointer-events: none" >Nous suivre</v-btn>

                <v-btn icon small style="text-decoration:none" href="https://twitter.com/gestimum_erp" target="_blank" >
                    <v-icon >mdi-twitter</v-icon>
                </v-btn>
                <v-btn icon small style="text-decoration:none; color:black"  href="https://www.facebook.com/gestimum" target="_blank" >
                    <v-icon >mdi-facebook</v-icon>
                </v-btn>
                <v-btn icon small style="text-decoration:none; color:black" target="_blank" href="https://www.youtube.com/channel/UCOuX7-emD48GQVOKhYT9bsQ">
                    <v-icon >mdi-youtube</v-icon>
                </v-btn>
                <v-btn icon small style="text-decoration:none; color:black" target="_blank" href="https://www.linkedin.com/company/gestimum">
                    <v-icon >mdi-linkedin</v-icon>
                </v-btn>
                </v-row>

                        <!-- bouton "copyright" -->
                <v-col
                    class="text-center">
                    <v-icon small>mdi-copyright</v-icon>Gestimum - 2020
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
