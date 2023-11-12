import { createRouter, createWebHistory } from 'vue-router';

import LoginComponent from '../components/Login/Login.vue';
import AppComponent from '../App.vue';
import SignUp from '../components/Login/SignUp.vue';
import store from '../store';
// import { isLogged } from '../_helpers/auth-guard';

const routes = [
  {
    path: '/',
    name: 'App',
    component: AppComponent,
    meta: {requiresAuth : true}
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginComponent

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
