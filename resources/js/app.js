require('./bootstrap');

window.Vue = require('vue');

import VueGallery from 'vue-gallery';
Vue.component('vue-gallery', VueGallery);

Vue.component('upload-images', require('./components/UploadImages'));
Vue.component('image-gallery', require('./components/ImageGallery'));

const app = new Vue({
    el: '#app'
});