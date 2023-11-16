<template>
    <div>
        <NavbarComponent/>
        <div class="container">
            <div>
                <button>
                    <router-link to="/devises/add">Ajouter une devise +</router-link>
                </button>
            </div>
            <ul class="info-devise" v-for="currency in devises" :key="currency.id">
                <li>{{ currency.code }}</li>
                <li>{{ currency.name }}</li>
                <button @click="goEdit(currency.id)">
                    Modifier
                </button>
                <a @click="deleteDevise(currency.id)">
                    <button>Supprimer</button>
                </a>
            </ul>
        </div>
    </div>
</template>

<script>
import NavbarComponent from '../Navbar.vue';
import FormAddDevises from '../Form/FormAddDevises.vue';
import axios from 'axios';

export default {
    name: 'CurrencyList',
    props: ['id'],
    components: {
        NavbarComponent,
        FormAddDevises
    },
    data() {
        return {
            devises: []
        };
    },
    async created() {
        await this.getDevises();
    },
    methods: {
        async getDevises() {
            try {
                const response = await axios.get('http://127.0.0.1:8000/api/devises');
                this.devises = response.data.data;
            } catch (error) {
                console.error('Error fetching devises:', error);
            }
        },
        goEdit(id) {
            axios.get(`http://127.0.0.1:8000/api/devises/${id}`)
                .then(response => {
                    console.log(response.data.data);
                    this.$router.push(`/devises/edit/${id}`);
                })
                .catch(err => console.log(err));
        }
        // deleteDevise(id) {
        //     // Ajoutez votre logique de suppression ici
        // }
    }
}
</script>

<style scoped>
.info-devise {
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-top: 2rem;
}
li {
    display: flex;
    justify-content: center;
    align-items: center;
    list-style-type: none;
    text-decoration: none;
    color: #ffffff;
    font-weight: bold;
}
</style>
