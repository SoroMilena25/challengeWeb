<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <img src="@/assets/logo1.png" alt="Logo" class="logo" />
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item" @click="changePage('home')">
            <a class="nav-link" :class="{'active': currentPage === 'home'}" href="#">Accueil</a>
          </li>
          <li class="nav-item" @click="changePage('profile')">
            <a class="nav-link" :class="{'active': currentPage === 'profile'}" href="#">Profil</a>
          </li>
          <li class="nav-item" @click="changePage('messages')">
            <a class="nav-link" :class="{'active': currentPage === 'messages'}" href="#">Messages</a>
          </li>
          <li class="nav-item" @click="changePage('settings')">
            <a class="nav-link" :class="{'active': currentPage === 'settings'}" href="#">Paramètres</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  props: ['currentPage', 'changePage']
};
</script>

<style scoped>
.navbar {
  margin-bottom: 20px;
}

.logo {
  width: 200px;
  height: auto;
}
</style>
