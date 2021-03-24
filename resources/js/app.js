/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}
require('./bootstrap');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.onload = function () {
    window.Vue = require('vue').default;
    Vue.component('example-component', require('./components/ExampleComponent.vue').default);
    Vue.component('v-create-project', require('./components/CreateProject.vue').default);



    if (window.location.pathname === '/') {
        const app = new Vue({
            el: '#vue-projects',
        });
    }
    // if (window.location.pathname === '/admin/create_project') {
    //     const createProject = new Vue({
    //         el: '#vueCreateProject'
    //     });
    // }
}
