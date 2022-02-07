<template>
<RouterView/>
</template>

<script>
import {onBeforeMount} from 'vue';
import router from './routes';
import {useAuth} from './store/AuthStore';

export default {
    name: "LoopIt",
    setup() {
      const auth = useAuth();

      onBeforeMount(async () => {
        if (auth.profile) {
          return;
        }

        try {
          await auth.verify();

          await router.push({ name: 'HomeScreen' });
        } catch (e) {
          await router.push({ name: 'LoginScreen' });
        }
      });
    }
}
</script>

<style scoped>

</style>
