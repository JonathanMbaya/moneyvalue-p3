<template>
  <div class="navbar-app">
    <nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Ajouter une devise</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Configurer les paires</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"><router-link to="/login" >Connexion</router-link></a>
            </li>
        </ul>
    </div>
  </div>
</nav>
  </div>
</template>

<script>

    import Login from './Login/Login.vue';

    const routes = [
    {path: '/login',
    name: 'Login',
    component: Login }
    ];

    export default {
        name : "NavbarComponent",

        components:{
            Login
        }
    }
</script>

<style  scoped>

/* styles.css */

.navbar-custom a {
  color: #ffffff !important; /* Couleur du texte des liens */
}

.navbar-custom a:hover {
  color: #ffffff !important; /* Couleur du texte des liens au survol */
}

/* Style pour le contenu principal de la page */
.main-content {
  padding: 20px; /* Espacement interne du contenu principal */
}




</style>
