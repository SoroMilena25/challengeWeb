<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="http://localhost:5173">
        <img src="@/assets/logo1.png" alt="Logo" width="120" />
      </a>

      <!-- Toggle button for mobile view -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="http://localhost:5173">Accueil</a>
          </li>

          <li class="nav-item">
            <router-link to="/profil" class="nav-link">Profil</router-link>
          </li>
          <!-- Remplacement du lien Messages par un bouton avec notification -->
          <li class="nav-item">

          </li>
        </ul>
      </div>

      <!-- User actions -->
      <div class="d-flex">
        <!-- Lien vers la page Profil avec Vue Router -->
        <router-link to="/Messages">
          <button type="button" class="btn btn-purple position-relative me-3">
            <img src="@/assets/send.svg" alt="Envoyer" />
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              2+
              <span class="visually-hidden">message pas lu</span>
            </span>
          </button>
        </router-link>

        <!-- Bouton Connexion avec redirection via router-link -->
        <router-link v-if="!isLoggedIn" to="/connexion" class="me-2">
          <button class="btn btn-purple">
            Connexion
          </button>
        </router-link>

        <!-- Bouton Déconnexion -->
        <button v-if="isLoggedIn" class="btn btn-danger me-2" @click="toggleConnexion">
          Déconnexion
        </button>
        <!-- Nouveau bouton Inbox avec badge -->

      </div>

    </div>
  </nav>
</template>

<script>
export default {
  name: 'Navbar',
  data() {
    return {
      // Variable pour savoir si l'utilisateur est connecté ou non
      isLoggedIn: false,
    };
  },
  methods: {
    // Fonction pour alterner l'état entre connecté et déconnecté
    toggleConnexion() {
      this.isLoggedIn = !this.isLoggedIn;
    },
  },
};
</script>

<style scoped>
.navbar {
  width: 100%;
  /* Assure que la navbar occupe toute la largeur de la page */
  background-color: pink;
  position: relative;
  /* Fixe la navbar en haut de la page */
  top: 0;
  left: 0;
  z-index: 1000;
  /* Assure que la navbar reste au-dessus du contenu */
}

/* Ajout de la classe pour le bouton violet */
.btn-purple {
  background-color: #d32e89;
  /* violet */
  color: white;
  border: none;
}

.btn-danger {
  background-color: rgb(221, 49, 49);
  /* violet */
  color: white;
  border: none;

}

.container-fluid {
  width: 100%;
  margin-top: 10px;
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
  color: #893998;
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
  background-color: #d93376;
  color: black;
}

.btn-outline-warning {
  border: 2px solid #893998;
  color: #893998;
  background-color: transparent;
}

.btn-outline-warning:hover {
  background-color: #d93376;
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
</style>
