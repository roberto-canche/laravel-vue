
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { ServerTable, ClientTable } from 'vue-tables-2';
Vue.use(ClientTable, {}, false, 'bootstrap4', 'default');
Vue.use(ServerTable, {}, false, 'bootstrap4', 'default')

Vue.component( 'projects', require('./components/Projects/Projects'))

/*Vue.component('example', require('./components/Example.vue'));*/

const app = new Vue({
    el: '#app'
});
