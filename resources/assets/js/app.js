require('./bootstrap');
import Vue from 'vue';
window.Vue = require('vue');
Vue.component('auth_form', require('./components/authForm.vue').default);
const auth_form = new Vue({
    el: '#auth_form'
});