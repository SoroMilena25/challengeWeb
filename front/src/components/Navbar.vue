<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="@/assets/logo1.png" alt="Logo" width="120" />
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Explorer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Notifications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Messages</a>
          </li>
        </ul>
      </div>

      <div class="d-flex">
        <button class="btn btn-primary me-2">Profil</button>
        <button class="btn btn-danger">Déconnexion</button>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'Navbar',
};
</script>

<style scoped>
.navbar {
  width: 100%; 
  background-color:pink;
  position:relative; 
  top: 0;
  left: 0;
  z-index: 1000; 
}

.container-fluid {
  width: 100%;
}

.navbar .logo img {
  width: 120px;
}

.navbar .nav-links a {
  margin: 0 1rem;
  text-decoration: none;
  color: #333;
}

.navbar .user-actions button {
  padding: 0.5rem 1rem;
  cursor: pointer;
  
}

.logo {
  width: 200px;
  height: auto;
}

.logo {
  width: 200px;
  height: auto;
}
</style>
