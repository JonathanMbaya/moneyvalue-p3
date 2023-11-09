import './bootstrap';

import {createApp} from "vue";

import DevisesList from "./components/devises/DevisesList.vue";


const app = createApp();

app.component('DevisesList', DevisesList);

app.mount('#app')
