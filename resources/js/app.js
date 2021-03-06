
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
const axios = require('axios');
require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('curr-date', require('./components/curr-date.vue').default);
Vue.component('curr-time', require('./components/curr-time.vue').default);
Vue.component('countdown', require('./components/countdown.vue').default);
Vue.component('mindreader', require('./components/mindreader.vue').default);
Vue.component('tictactoe', require('./components/tictactoe.vue').default);
Vue.component('calculator', require('./components/calculator.vue').default);
Vue.component('restaurant', require('./components/restaurant.vue').default);
Vue.component('todo', require('./components/todo.vue').default);
Vue.component('weather', require('./components/weather.vue').default);
Vue.config.devtools = true;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
