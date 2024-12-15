import { createRouter, createWebHistory } from 'vue-router';
import Home from '@/views/Home.vue';
import Connexion from '@/views/Connexion.vue'; 
import Inscription from '@/views/Inscription.vue'; 
import Profil from '@/views/Profil.vue'; 

const routes = [
  { path: '/', name: 'Home', component: Home },  
  { path: '/inscription', name: 'Inscription', component: Inscription },
  { path: '/connexion', name: 'Connexion', component: Connexion },
  { path: '/profil', name: 'Profil', component: Profil }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
