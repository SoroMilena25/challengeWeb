import { createRouter, createWebHistory } from 'vue-router';
import Home from '@/views/Home.vue';
import Connexion from '@/views/Connexion.vue'; 

const routes = [
  { path: '/', name: 'Home', component: Home }, 
  { path: '/about', name: 'Connexion', component: Connexion }, 
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
