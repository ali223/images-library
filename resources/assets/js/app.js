
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';

import VueRouter from 'vue-router';
import VModal from 'vue-js-modal'
import router from './routes';


window.Vue = require('vue');

Vue.use(VueRouter);
Vue.use(VModal, { dialog: true });

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    router
});