import { createApp } from "vue";
import { createPinia } from 'pinia'
import LoopIt from "./LoopIt.vue";
import router from "./routes/index.js";

createApp(LoopIt).use(router).use(createPinia()).mount('#app')
