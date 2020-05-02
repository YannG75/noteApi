import Vue from 'vue'
import VueRouter from 'vue-router'
import store from './store'
import vueDebounce from 'vue-debounce'
Vue.use(vueDebounce, {
    lock: true,
    listenTo: 'keyup',
    defaultTime: '1000ms'
})

Vue.use(VueRouter)

import App from './views/App'
import Home from './views/Home'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
    ],
});

const app = new Vue({
    el: '#app',
    store,
    components: { App },
    router,
});
