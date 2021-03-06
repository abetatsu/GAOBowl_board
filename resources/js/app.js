/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue'); //Vue.jsの読み込み

import VueAwesomeSwiper from 'vue-awesome-swiper'// VueAwesomeSwiperの読み込み
import VCalendar from 'v-calendar';
import VueStar from 'vue-star'
Vue.use(VueAwesomeSwiper);// Vue.jsで、VueAwesomeSwiperを使うように設定
Vue.use(require('vue-moment'));
Vue.use(VCalendar);


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
Vue.component('like-component', require('./components/LikeComponent.vue').default);
Vue.component('dislike-component', require('./components/DislikeComponent.vue').default);
Vue.component('swiper-component', require('./components/SwiperComponent.vue').default);
Vue.component('fullcalendar-component', require('./components/FullcalendarComponent.vue').default);
Vue.component('vcalendar-component', require('./components/VcalendarComponent.vue').default);
Vue.component('datalist-component', require('./components/DatalistComponent.vue').default);
Vue.component('question-component', require('./components/QuestionComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

require('./swiper');
