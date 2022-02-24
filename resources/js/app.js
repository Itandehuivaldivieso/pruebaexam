/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 import Vue from 'vue'
 import BootstrapVue from "bootstrap-vue"
 import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap-vue/dist/bootstrap-vue.css"

require('./bootstrap');

window.Vue = require('vue');
Vue.use(BootstrapVue)

Vue.component('form-component', require('./components/Tasks/Form.vue').default);

// vue.component('Maestros', require('./components/Tasks/Maestros.vue'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
   
});
