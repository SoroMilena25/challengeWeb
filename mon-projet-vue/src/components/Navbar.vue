<template>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="@/assets/logo1.png" alt="Logo" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Profils</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
              >Connexion</a
            >
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Se connecter</a></li>
              <li><a class="dropdown-item" href="#">S'inscrire</a></li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#">Autre option</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex ms-3">
          <input class="form-control me-2" type="search" placeholder="Rechercher" />
          <button class="btn btn-outline-light" type="submit">Rechercher</button>
        </form>
      </div>
    </div>
  </nav>
</template>


<style scoped>
.navbar {
  background-color: #343a40;
}
</style>
