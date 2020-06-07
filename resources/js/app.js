/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');



import VueRouter from 'vue-router'

Vue.use(VueRouter)
import Vuex from 'vuex'

Vue.use(Vuex)
import storeData from './store'

const store = new Vuex.Store(
    storeData
)

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('our-example', require('./components/OurComponent.vue').default);
Vue.component('public-nav', require('./components/blog/includes/PublicNav.vue').default);
Vue.component('public-footer', require('./components/blog/includes/PublicFooter.vue').default);
Vue.component('public-master', require('./components/blog/PublicMaster.vue').default);


import {routes} from "./routes";


const router = new VueRouter({
    routes // short for `routes: routes`
})

import { Form, HasError, AlertError } from 'vform'
window.Form = Form

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.Toast = Toast

const app = new Vue({
    el: '#app',
    router,
    store
});
