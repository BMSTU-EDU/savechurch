require('./bootstrap');

window.Vue = require('vue');

// import VuePictureSwipe from 'vue-picture-swipe';
import VueGallery from 'vue-gallery';
// Vue.component('vue-picture-swipe', VuePictureSwipe);
Vue.component('vue-gallery', VueGallery);
Vue.component('upload-images', require('./components/UploadImages.vue'));

const app = new Vue({
    el: '#app'
});
