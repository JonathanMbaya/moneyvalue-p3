import './bootstrap';

import {createApp} from "vue";

import Login from "./components/login-part/Login.vue";


const app = createApp();
app.component('Login', Login);
app.mount('#app');
