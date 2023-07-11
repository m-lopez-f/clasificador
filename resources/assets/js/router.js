import Vue from 'vue'
import VueRouter from 'vue-router'
import List from './views/dog/List'
import Add from './views/dog/Add'
import Detail from './views/dog/Detail'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
	base: '/',
    routes: [
        {path: '/', component: List},
        {path: '/dog/add', component: Add},
        {path: '/dog/details/:dogId', component: Detail},
    ]
})

export default router