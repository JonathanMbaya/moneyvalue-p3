import router from "../router";
import store from "../store";

export function authGuard()
{
    localStorage.setItem('token',store.state.user.token )
}

export function isLogged(to){
    let token = localStorage.getItem('token')
    router.push('/')
    return !!token;

}
