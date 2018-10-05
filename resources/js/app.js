require('./bootstrap');

window.Vue = require('vue');

import VueGallery from 'vue-gallery';
import { yandexMap, ymapMarker } from 'vue-yandex-maps'

Vue.component('vue-gallery', VueGallery);
Vue.component('upload-images', require('./components/UploadImages'));
Vue.component('image-gallery', require('./components/ImageGallery'));
Vue.component('yandex-map', yandexMap);
Vue.component('yandex-marker', ymapMarker);

const app = new Vue({
    el: '#app'
});