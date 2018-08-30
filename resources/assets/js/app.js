
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueRouter from 'vue-router';
import App from './App.vue';
import routes from './routes/index';
import store from './store/index';

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(VueRouter);

const router = new VueRouter({
	mode: 'history',
  	base: '/dashboard',
    routes: routes
});

window.events = new Vue();

window.flash = function(message, type = 'success') {
    window.events.$emit('flash', message, type);
};

new Vue({
    render: h => h(App),
    router,
    store,
}).$mount('#app')