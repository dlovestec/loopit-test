<template>
  <div class="container">
    <Navbar/>
    <table class="table">
      <thead>
      <tr>
        <th scope="col">Make</th>
        <th scope="col">Model</th>
        <th scope="col">Year</th>
        <th scope="col">Price</th>
        <th scope="col">Color</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="car in cars" :key="car.id">
        <th scope="row">{{ car.make }}</th>
        <td>{{ car.model }}</td>
        <td>{{ car.year }}</td>
        <td>{{ car.price }}</td>
        <td>{{ car.color }}</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import Navbar from '../components/Navbar';
import {useCar} from '../store/CarStore';
import {computed, onMounted, ref} from 'vue';

export default {
  name: 'HomeScreen',
  components: {Navbar},
  setup() {
    const errors = ref({});
    const car = useCar();

    onMounted(async () => {
      if (car.meta.loading) {
        return;
      }
      errors.value = {};

      const [_, error] = await car.getCars();

      if (error && error.errors) {
        errors.value = error.errors;
      }

      error && error.message && console.log(error.message);
    });

    return {
      errors,
      loading: computed(() => car.meta.loading),
      cars: computed(() => car.cars),
    };
  },
};
</script>

<style scoped>

</style>
