require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './vue/app';
import Dashboard from './vue/Dashboard';
import DailyLog from './vue/DailyLog';
import ActivityTracker from './vue/ActivityTracker';
import HydrationTracker from './vue/HydrationTracker';
import SleepLog from './vue/SleepLog';

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Dashboard",
    component: Dashboard,
  },
    {
      path: "/dailylog",
      name: "DailyLog",
      component: DailyLog,
    },
    {
      path: "/activitytracker",
      name: "ActivityTracker",
      component: ActivityTracker,
    },
    {
      path: "/hydrationtracker",
      name: "HydrationTracker",
      component: HydrationTracker,
    },
    {
      path: "/sleeplog",
      name: "SleepLog",
      component: SleepLog,
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
