import { createRouter, createWebHistory } from 'vue-router';

import LoginComponent from '../components/Login/Login.vue';
import AppComponent from '../App.vue';
import SignUp from '../components/Login/SignUp.vue';
import FormAddDevises from '../components/Form/FormAddDevises.vue';
import FormEditDevises from '../components/Form/FormEditCurrency.vue'
import CurrencyList from '../components/Currency/Currency.vue';
import store from '../store';

const routes = [
  {
    path: '/',
    name: 'App',
    component: AppComponent,
  },

  {
    path: '/devises',
    name: 'Currency',
    component: CurrencyList,
  },

  {
    path: '/devises/add',
    name: 'AddDevises',
    component: FormAddDevises,
  },

  {
    path: '/devises/edit/:id(\\d+)',
    name: 'EditDevises',
    component: FormEditDevises,
    props: true
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


// router.beforeEach((to, from, next) => {
//     if (from.meta.requiresAuth && to.meta.requiresAuth && !store.state.user.token){
//         next({name: 'Login'});
//     }

//     else{
//         next();
//     }
// })


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

export default router;
