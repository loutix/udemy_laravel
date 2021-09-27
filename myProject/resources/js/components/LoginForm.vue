<template>
<div>
    <form @submit.prevent="handleLogin">
        <div class="form-group">
            <input class="form-control" type="text" id="name" v-model="form.email">
            <span class="text-danger" v-if="errors.email">{{  errors.email[0]  }}</span>
        </div>

        <div class="form-group">
            <input class="form-control" type="password" id="name" v-model="form.password">
            <span class="text-danger" v-if="errors.email">{{  errors.email[0]  }}</span>

        </div>

        <button class="btn btn-primary" type="submit">Se connecter</button>
    </form>
</div>
</template>

<script>
    export default {
        data() {
            return {
                form: { email:null, password:null},
                errors: {}
            }
        },

        methods:{
            async handleLogin (){
                try {
                    await axios.get('/sanctum/csrf-cookie');
                    await axios.post('/login', this.form);
                    window.location ='/';
                } catch(error){
                    this.errors = error.response.data.errors;
                }
            }
        }
    }
</script>
