import { createApp } from 'vue';
import App from '@/App.vue';
import router from '@/router';  // Utilisation de l'alias pour router


createApp(App).use(router).mount('#app');
