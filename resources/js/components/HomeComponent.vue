<template>
<v-container>
  <v-carousel v-model="model">
    <v-carousel-item
      v-for="(item,i) in items"
      :key="i"
      :src="item.src"
       reverse-transition="fade-transition"
      transition="fade-transition"
    >

        <v-row
          class="fill-height"
          align="center"
          justify="center"
        >
          <div class="display-3">
            <!-- Slide {{ i + 1 }} -->
          </div>
        </v-row>

    </v-carousel-item>
  </v-carousel>
  <v-card v-if="user" justify-center >
      <v-alert
        color="success"
        dismissible
        elevation="5"

        type="success">
        Vous êtes connecté avec le compte {{user.email}}
      </v-alert>
    </v-card>
</v-container>
</template>
<script>

import User from '../apis/User'
export default {

    data: () => ({
      model: 0,
      user : null,
      items: [
        {
            src: "https://scontent-cdt1-1.xx.fbcdn.net/v/t31.18172-8/13576903_491764424352747_7395197862118146408_o.jpg?_nc_cat=110&ccb=1-3&_nc_sid=973b4a&_nc_ohc=rvM9K4wxUPoAX8nIvk7&_nc_ht=scontent-cdt1-1.xx&oh=918fbcf3ca9f92065edab8e6b2a20a93&oe=60BF9C73",
          },
          {
            src: 'https://media-exp1.licdn.com/dms/image/C561BAQHrva_3oDtBbg/company-background_10000/0/1601630162047?e=2159024400&v=beta&t=298bZ2OE9ilB2uJEHMB3iUIDDgXQZbhSwqDY03IThCA',
          },
      ],
    }),

        mounted() {
        User.auth().then(response => {
            this.user = response.data;
        })
    },

    //     created() {
    //     info.idex(this.$route.params.id)
    //         .then((res => {

    //     this.user = res.data
    //     this.$store.commit('NAME_USER', res.data.name);
    //     this.$store.commit('SURNAME_USER', res.data.surname);

    // }))


}


</script>
