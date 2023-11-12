<template>
    <div class="app">
        <NavbarComponent/>


        <h1>MoneyValue</h1>

        <h2>Nous vous aidons dans la conversion de vos devises</h2>

        <div>
            <p>Sélectionnez vos devises et laissez vous guider par MoneyValue</p>
        </div>

        <FormCurrency/>

    </div>

</template>

<script>
    import NavbarComponent from './components/Navbar.vue';
    import FormCurrency from './components/Form/FormCurrency.vue'
    import axiosClient from './axios';

    export default {
        name : 'AppComponent',

        components : {
            NavbarComponent, FormCurrency
        },

        methods:{
            getInformations(){
                axiosClient.post('/privateInformation')

                .then(res=> console.log(res))
                .catch(err => console.log(err));
            }
        }


    }
</script>

<style scoped>

h1,h2{
    margin-top: 5rem;
}


h1, h2, h3, p {
    display: flex !important;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}



</style>
