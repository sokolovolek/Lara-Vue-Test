/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

Vue.component(
    "employee-create",
    require("./pages/employee/Create.vue").default
);
Vue.component("employee-list", require("./pages/employee/List.vue").default);
Vue.component("employee-edit", require("./pages/employee/Edit.vue").default);

import Vuesax from "vuesax";
import VueToast from "vue-toast-notification";
import Notifications from "vue-notification";

import axios from "./axios.js";
import "vuesax/dist/vuesax.css";
import "material-icons/iconfont/material-icons.css";

Vue.prototype.$http = axios;

Vue.use(Vuesax);
Vue.use(VueToast);
Vue.use(Notifications);

const app = new Vue({
    el: "#app",
});
