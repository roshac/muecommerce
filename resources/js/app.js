/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('order-track', require('./components/orderTrack.vue').default);
Vue.component('time-ago', require('./components/timeAgo.vue').default);
Vue.component('order-notification', require('./components/order_notification.vue').default);
Vue.component('chart-e', require('./components/chartComponet.vue').default);
Vue.component('bid-track', require('./components/bidChange.vue').default);
const app = new Vue({
    el: '#app',
    mounted(){
        Echo.channel('order-tracker')
      .listen('OrderChange', (e) => {
        console.log('Its kkworking');
      });
    }
});


// window.onload = function () {
const bid = new Vue({
  el: '#bid',
  mounted(){
      Echo.channel('bid-change')
    .listen('Bidchange', (e) => {
      console.log('Its bid working');
    });
  }
});

// }
// window.onload = function () {
//   var main = new Vue({
//       el: '#main',
//       data: {
//           currentActivity: 'home'
//       }
//   });
// }