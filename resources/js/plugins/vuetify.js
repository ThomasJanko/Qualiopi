
import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import fr from 'vuetify/lib/locale/fr';

Vue.use(Vuetify)

const opts = {

    theme: {
        lang:{
            locales :{fr},
            current:'fr',
        },
        themes:{
            light:{
                primary: '#f47920',
                secondary: '#606162',
                accent: '#fcd4b8',
            // light:'#c6c6c6',
                light:'#4da1c4',
                // error: '#b71c1c',
                success: '#00C853',
            }
        }
    },
    fonts:[
        {family:"Open Sans"}
    ]


}
const vuetify = new Vuetify(opts)
export default vuetify

//  const Vuetify =new Vuetify({

//      theme: {
//          themes:{
//              light:{
//                  primary: '#f47920',
//                  secondary: '#606162',
//                  accent: '#fcd4b8',
//                 // light:'#c6c6c6',
//                  light:'#4da1c4',
//                  // error: '#b71c1c',
//                  success: '#00C853',
//              }
//          }
//        },
//        fonts:[
//            {family:"Open Sans"}
//        ]
//  })
