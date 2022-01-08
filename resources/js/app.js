require('./bootstrap');

import Vue from 'vue';
import App from './vue/App';

const app = new Vue({
    el: '#app',
    components: { App },
});
