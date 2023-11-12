// Importez Bootstrap avant d'importer le reste de vos fichiers
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap/dist/js/bootstrap.bundle.js';
import './bootstrap'; // Assurez-vous que le fichier bootstrap est correctement configuré

import { createApp } from 'vue';
import router from './router/index';

import AppComponent from './App.vue';
import LoginComponent from './components/Login/Login.vue';

const app = createApp({
  components: {
    AppComponent,
    LoginComponent
  }
});

app.use(router);

app.mount('#app');
