import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';
//Importo le rotte
import { router } from './router';

createApp(App).use(router).mount('#app');
