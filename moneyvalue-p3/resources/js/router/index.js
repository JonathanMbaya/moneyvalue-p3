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
    meta: {requiresAuth : true}
  },

  {
    path: '/devises',
    name: 'Currency',
    component: CurrencyList,
    meta: {requiresAuth : true}
  },

  {
    path: '/add/devises',
    name: 'AddDevises',
    component: FormAddDevises,
    meta: {requiresAuth : true}
  },

  {
    path: '/edit/devises/:id',
    name: 'EditDevises',
    component: FormEditDevises,
    meta: {requiresAuth : true}
  },

  {
    path: '/login',
    name: 'Login',
    component: LoginComponent,
    meta : {requiresAuth: false}

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

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token){
        next({name: 'Login'});
    }

    else{
        next();
    }
})

export default router;
