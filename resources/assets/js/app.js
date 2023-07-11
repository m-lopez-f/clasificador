import Vue from 'vue'
import App from './App.vue'
import router from './router'
import {ServerTable, ClientTable, Event} from 'vue-tables-2';
Vue.use(ClientTable, [{}], [false], ['bootstrap3'], [{}]);
Vue.use(ServerTable, [{}], [false], ['bootstrap3'], [{}]);
const app = new Vue({
    el: '#root',
    router,
    render: h => h(App),
})