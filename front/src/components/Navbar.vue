<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
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
        <button class="btn btn-outline-primary me-2">Profil</button>
        <button class="btn btn-outline-danger">Déconnexion</button>
      </div>
    </div>
  </nav>

  
  <div class="banner-content">
    
    <div class="banner">
      <h1>StarNet</h1>
      <p>Connectez-vous à l'univers de vos idées.</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Navbar',
};
</script>

<style scoped>

.navbar {
  width: 100%;
  background-color: #6a4c93; 
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1050; 
  transition: background-color 0.3s ease; 
}


.navbar:hover {
  background-color: #5e3b77; 
}

.container-fluid {
  width: 100%;
}

.navbar .navbar-brand img {
  width: 120px;
  height: auto;
}


.navbar-nav .nav-item {
  margin-left: 1rem;
}

.nav-link {
  color: #e23589; 
  font-weight: 500;
  text-transform: uppercase;
  font-size: 1rem;
  transition: color 0.3s ease, transform 0.2s ease; 
}

.nav-link:hover {
  color: #ff0088; 
  transform: translateY(-3px); 
}


.d-flex button {
  padding: 0.6rem 1.5rem;
  font-size: 1rem;
  border-radius: 50px;
  font-weight: 600;
  transition: background-color 0.3s, transform 0.2s ease; 
}

.d-flex button:hover {
  transform: scale(1.05); 
}

.btn-outline-primary {
  border: 2px solid #ff008c;
  color: #ff008c;
  background-color: transparent;
}

.btn-outline-primary:hover {
  background-color: #ff008c;
  color: white;
}

.btn-outline-danger {
  border: 2px solid #893998;
  color: #893998;
  background-color: transparent;
}

.btn-outline-danger:hover {
  background-color: #893998;
  color: white;
}

@media (max-width: 992px) {
  .navbar-nav {
    text-align: center;
  }
  .navbar-nav .nav-item {
    margin-left: 0;
  }
  .d-flex {
    margin-top: 10px;
  }
}

.banner-content {
  padding-top: 120px; 
}


.banner {
  background-color: #9f56ac;
  color: white;
  text-align: center;
  padding: 50px;
}

.banner h1 {
  font-size: 3rem;
}

.banner p {
  font-size: 1.5rem;
}
</style>
