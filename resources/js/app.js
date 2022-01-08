require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './vue/app';
import DailyLog from './vue/DailyLog';

Vue.use(VueRouter);

const routes = [
    {
      path: "/dailylog",
      name: "DailyLog",
      component: DailyLog,
    },
  ];
  
  const router = new VueRouter({
    routes: routes,
    mode: "history",
  });

const app = new Vue({
    router,
    el: '#app',
    components: { App },
});
