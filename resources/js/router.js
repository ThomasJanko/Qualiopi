import Vue from 'vue';

import routerVue from 'vue-router';
Vue.use(routerVue);

//import des composants:
import HomeComponent from './components/ExampleComponent';
import TestComponent from './components/TestComponent';





// Router :
const router = new routerVue ({

    routes : [

        {
            name : 'home',
            path : '/',
            component : HomeComponent,
        },

        {
            name : 'test',
            path : '/test',
            component : TestComponent,
        },

    ]
})

export default router;
