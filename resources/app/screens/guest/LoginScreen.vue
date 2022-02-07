<template>
  <div class="guest">
    <form @submit.prevent="onLoginRequest">
      <div class="mb-3">
        <label for="emailInput" class="form-label">Email address</label>
        <input type="email" class="form-control" :class="{'is-invalid': errors.email}" id="emailInput"
               aria-describedby="emailHelp" v-model="form.email">
        <div id="emailHelp" class="form-text text-danger" v-if="errors.email" v-text="errors.email"/>
      </div>
      <div class="mb-3">
        <label for="passwordInput" class="form-label">Password</label>
        <input type="password" class="form-control" :class="{'is-invalid': errors.password}" id="passwordInput"
               v-model="form.password">
        <div id="passwordHelp" class="form-text text-danger" v-if="errors.password" v-text="errors.password"/>
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="rememberMeCheck" v-model="form.remember">
        <label class="form-check-label" for="rememberMeCheck">Remember Me</label>
      </div>
      <button type="submit" class="btn btn-primary" :disabled="loading">Submit</button>
    </form>
  </div>
</template>

<script>
import {computed, reactive, ref} from 'vue';
import {useAuth} from '../../store/AuthStore';
import router from '../../routes';

export default {
  name: 'LoginScreen',
  setup() {
    const form = reactive({
      email: '',
      password: '',
      remember: false,
    });

    const errors = ref({});

    const auth = useAuth();

    return {
      async onLoginRequest() {
        if (auth.meta.loading) {
          return;
        }

        errors.value = {};

        const [_, error] = await auth.login(form);

        if (!error) {
          await router.push({ name: 'HomeScreen' });

          return;
        }

        if (error && error.errors) {
          errors.value = error.errors;
        }

        error && error.message && console.log(error.message);
      },
      form,
      errors,
      loading: computed(() => auth.meta.loading),
    };
  },
};
</script>

<style scoped>
.guest {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  width: 100vw;
  overflow: hidden;
}
</style>
