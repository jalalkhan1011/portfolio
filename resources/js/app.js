/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";

require('./bootstrap');

window.Vue = require('vue').default;
import VueRouter from "vue-router";
import VueAxios from "vue-axios";
import axios from "axios";



window.Vue.use(VueRouter);
Vue.use(VueAxios,axios);
Vue.config.productionTip = false

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
import SkillIndex from './components/skills/SkillIndex';
import SkillCreate from './components/skills/SkillCreate';

const routes = [
    {
        path: '/admin/skills',
        components: {
            skillIndex: SkillIndex
        }
    },
    {
        path: '/admin/skills/create',
        component:SkillCreate,
        name: 'createSkills'
    },
    // {path: '/admin/companies/edit/:id', component: CompaniesEdit, name: 'editCompany'},
]



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    routes,
    mode: 'history'
})

// const app = new Vue({
//     el: '#app',
// });
const app = new Vue({router}).$mount('#app');
