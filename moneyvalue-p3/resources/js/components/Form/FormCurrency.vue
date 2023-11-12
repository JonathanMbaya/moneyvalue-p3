<template>
    <div class="form-area container">
      <form @submit.prevent="handleSubmit">
        <!-- Un input pour renter la valeur à convertir -->
        <div class="form-group">
            <label for="value_currency">Montant à convertir</label>
            <input type="text" name="value_currency"/>
        </div>

        <!-- Première liste déroulante pour la devise source -->
        <div class="form-group">
          <label for="currency_source">De</label>
          <select class="form-control" name="currency_source" id="currency_source" v-model="selectedSourceCurrency">
            <option v-for="currency in devises" :key="currency.id" :value="currency.code">{{ currency.code }}</option>
          </select>
        </div>

        <!-- Deuxième liste déroulante pour la devise cible -->
        <div class="form-group">
          <label for="currency_target">Vers</label>
          <select class="form-control" name="currency_target" id="currency_target" v-model="selectedTargetCurrency">
            <option v-for="currency in devises" :key="currency.id" :value="currency.code">{{ currency.code }}</option>
          </select>
        </div>



        <!-- Bouton de soumission -->
        <div class="form-group">
            <input type="submit" value="Convertir" />
        </div>
      </form>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    name: 'FormCurrency',

    data() {
      return {
        devises: [], // Utilisez un tableau vide au lieu d'une chaîne vide
        selectedSourceCurrency: '', // Ajoutez un modèle pour la devise source
        selectedTargetCurrency: '', // Ajoutez un modèle pour la devise cible
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

      handleSubmit() {
        // Ajoutez le code pour traiter la soumission du formulaire
        console.log('Form submitted');
        console.log('Source Currency:', this.selectedSourceCurrency);
        console.log('Target Currency:', this.selectedTargetCurrency);
      },
    },
  };
  </script>

  <style scoped>

.collapse .navbar-collapse{
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
}
  /* Ajoutez des styles si nécessaire */

  form {
    display: flex;
    justify-content: space-around;
    align-items: center;
    background-color: #044097;
    padding: 10% 0 10% ;
    margin-top: 5rem;
    border-radius: 1rem;
  }

  .form-area{
    color: #ffffff;
  }

  .form-group{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  select, input{
    margin: 2.5rem;
    padding: .5rem 2.5rem .5rem 2.5rem;
  }

  </style>
