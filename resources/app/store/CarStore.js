import {defineStore} from 'pinia';
import {reactive, ref} from 'vue';
import * as CarService from '../services/CarService';

export const useCar = defineStore('CarStore', () => {
  const cars = ref(null);
  const meta = reactive({
    loading: false,
  });

  const getCars = async () => {
    meta.loading = true;

    const [response, error] = await CarService.getCars();
    meta.loading = false;

    if (error) {
      return [null, error];
    }

    const {data: {cars: _cars}} = response;
    cars.value = _cars;
    return [response, null];
  };

  return {
    cars, meta, getCars,
  };
});
