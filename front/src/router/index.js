import { createRouter, createWebHistory } from 'vue-router';
import Home from '@/views/Home.vue';
import Connexion from '@/views/Connexion.vue'; 
import Inscription from '@/views/Inscription.vue'; 

const routes = [
  { path: '/', name: 'Home', component: Home },  
  { path: '/inscription', name: 'Inscription', component: Inscription },
  { path: '/connexion', name: 'Connexion', component: Connexion }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
