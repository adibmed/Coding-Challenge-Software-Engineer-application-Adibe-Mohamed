/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
window.Vue = require('vue');
import App from './App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import {routes} from './routes';

axios.defaults.baseURL = "http://localhost:8000/api/"
 
  
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
  
const router = new VueRouter({
    mode: 'history',
    routes: routes
});
  
const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});
  


  
  
