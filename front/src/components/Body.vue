<template>
  <div class="jumbotron text-center" v-if="page === 'home'">
    <h1 class="display-4">Bienvenue sur Réseau Social</h1>
    <p class="lead">Connectez-vous avec vos amis et le monde qui vous entoure.</p>
    <hr class="my-4">
    <p>Inscrivez-vous dès maintenant pour commencer à partager vos moments.</p>
    <a class="btn btn-primary btn-lg" href="#" role="button">S'inscrire</a>
    <a class="btn btn-secondary btn-lg" href="#" role="button">Se connecter</a>
  </div>
  <div class="jumbotron text-center" v-if="page === 'profile'">
    <h1 class="display-4">Votre Profil</h1>
    <p class="lead">Bienvenue sur votre espace personnel.</p>
  </div>
  <div class="jumbotron text-center" v-if="page === 'messages'">
    <h1 class="display-4">Vos Messages</h1>
    <p class="lead">Tous vos échanges en un seul endroit.</p>
  </div>
  <div class="jumbotron text-center" v-if="page === 'settings'">
    <h1 class="display-4">Paramètres</h1>
    <p class="lead">Gérez vos préférences et votre compte.</p>
  </div>
</template>

<script>
export default {
  props: ['page']
};
</script>

<style scoped>
.jumbotron {
  background-color: #e9ecef;
  padding: 2rem 1rem;
}
</style>
