<template>
    <header>

        <div class="signup">

            <h1>Connexion</h1>

            <form  @submit.prevent="onSubmit"  @blur="v$.touch">
                <input type="text" name="email" placeholder="e-mail" v-model="email" @blur="v$.touch" required="required" />
                <p v-if="v$.email.error">{{ v$.email.$errors[0].$message }}</p>
                <input type="password" name="password" placeholder="Password" v-model="password" required="required" />
                <p v-if="v$.password.error">{{ v$.password.$errors[0].$message }}</p>
                <button type="submit" name="signup" class="btn btn-primary btn-block btn-large" >Let me in.</button>
                <p v-if="v$.signup.error">{{ v$.signup.$errors[0].$message }}</p>
            </form>

            <div>
                <p>Vous avez déjà un compte ?</p>

                <router-link to="login">Se connecter</router-link>
            </div>

        </div>

    </header>
</template>

<script>
    import { useVuelidate } from '@vuelidate/core';
    import { required, email } from '@vuelidate/validators';


    export default {

        name: "SignUp",

        data(){

        return {
            email : "",
            password : "",
            login : "",
            signupValid: null
        }

        },

        validations(){
        return {
            email : {required},
            password : {required},
            signup : {required, email}
        }
        },

        methods : {

        async onSubmit() {
            const valid = await this.v$.$validate();
            if (!valid) return "Erreur"
        },

        validSignUp() {
            this.signupValid = (this.signup.length >=3) ? true : false ;
            console.log(this.signupValid);
        }

        },

        setup() {

            return {
                v$: useVuelidate({ $autoDirty: true })
            }

        }


    }
</script>

<style>

</style>
