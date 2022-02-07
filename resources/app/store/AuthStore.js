import {defineStore} from 'pinia';
import {reactive, ref} from 'vue';
import * as AuthService from '../services/AuthService';
import {setAuthToken} from '../core/request';

export const useAuth = defineStore('AuthStore', () => {
  const profile = ref(null);
  const meta = reactive({
    loading: false,
  });

  const login = async (credential) => {
    meta.loading = true;

    const [response, error] = await AuthService.login(credential);

    meta.loading = false;

    if (error) {
      return [null, error];
    }

    const {data: {user, token}} = response;
    profile.value = user;

    setAuthToken(token);

    return [response, null];
  };

  const verify = async () => {
    profile.value = await AuthService.verifyToken();
  }

  return {
    profile, meta, login, verify,
  };
});
