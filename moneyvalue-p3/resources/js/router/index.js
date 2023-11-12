import { createRouter, createWebHistory } from 'vue-router';


import LoginComponent from '../components/Login/Login.vue';
import AppComponent from '../App.vue';
import SignUp from '../components/Login/SignUp.vue';

const routes = [
  {
    path: '/',
    name: 'App',
    component: AppComponent,
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginComponent,
  },

  {
    path: '/signup',
    name: 'Signup',
    component: SignUp,
  }
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

export default router;
