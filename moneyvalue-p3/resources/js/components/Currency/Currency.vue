<template>

    <NavbarComponent/>

    <div class="container">

        <div>
            <button>
                <router-link to="/add/devises" >Ajouter une devise +</router-link>


            </button>
        </div>

        <ul class="info-devise" v-for="currency in devises" :key="currency.id">
            <li>{{ currency.code }}</li>
            <li>{{ currency.name }}</li>
            <button>
                <router-link to='/edit/devises/' + {{currency.id}} >
                   Modifier
                </router-link>
            </button>
            <a @click="deleteCurrency(currency.id)"><button>Supprimer</button></a>
        </ul>


    </div>

</template>

<script>
import NavbarComponent from '../Navbar.vue';
import FormAddDevises from '../Form/FormAddDevises.vue';

    export default {

        name: 'CurrencyList',
        components: {
        NavbarComponent,
        FormAddDevises
        },

        data() {
            return {
                devises: [],
                 // Utilisez un tableau vide au lieu d'une chaîne vide

                code : this.code,
                name: this.name
            };
        },

        async created() {
        // Appelez getDevises lors de la création du composant
        await this.getDevises();
        },

        methods: {
        async getDevises() {
            try {
            const response = await axios.get('http://127.0.0.1:8000/api/devises');
            this.devises = response.data.data; // Assurez-vous d'ajuster selon la structure de votre réponse
            } catch (error) {
            console.error('Error fetching devises:', error);
            }
        },

        getCurrency(id){
            axios.put('http://127.0.0.1:8000/api/devises/delete/'+ id)
            .then(response =>{console.log(response);
                    this.$router.push('/devises');
            })
            .catch(err => console.log(err));

        },

        deleteCurrency(id){
            axios.delete('http://127.0.0.1:8000/api/devises/delete/'+ id)
            .then(response =>{console.log(response);
                    this.$router.push('/devises');
            })
            .catch(err => console.log(err));
        }

        }
    }
</script>

<style scoped>

.info-devise{
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-top: 2rem;
}

li{
    display: flex;
    justify-content: center;
    align-items: center;
    list-style-type: none;
    text-decoration: none;
    color: #ffffff;
    font-weight: bold;
}


</style>
