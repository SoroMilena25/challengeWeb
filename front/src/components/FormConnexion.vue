<template>
  <div class="form-connexion">
    <!-- Conteneur pour la section du logo -->
    <div class="logo-section">
      <div class="logo-container">
        <img src="@/assets/logo1.png" alt="Logo" class="logo" />
      </div>
    </div>
    <!-- Conteneur pour la section de connexion -->
    <div class="connexion-section">
      <div class="container">
        <h2 v-if="!isLoggedIn">Connexion</h2>
        <form v-if="!isLoggedIn" @submit.prevent="handleLogin">
          <!-- Email -->
          <div class="form-group">
            <label for="email">Email</label>
            <input
              type="email"
              id="email"
              v-model="email"
              placeholder="Entrez votre email"
              required
            />
          </div>
          <!-- Mot de passe -->
          <div class="form-group">
            <label for="password">Mot de passe</label>
            <input
              type="password"
              id="password"
              v-model="password"
              placeholder="Entrez votre mot de passe"
              required
            />
          </div>
          <!-- Boutons -->
          <div class="button-container">
            <button type="submit">Se connecter</button>
          </div>
        </form>

        <p v-if="isLoggedIn" class="success">{{ successMessage }}</p>

        <!-- Lien vers l'inscription -->
        <p>Pas encore de compte ? <router-link to="/inscription">Inscrivez-vous</router-link></p>

        <!-- Affichage d'une erreur -->
        <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: '',
      password: '',
      errorMessage: '',
    };
  },
  methods: {
    handleSubmit(event) {
      // Ici, vous ne gérez pas l'envoi en JSON, juste le formulaire classique
      console.log('Formulaire envoyé avec email:', this.email, 'et mot de passe:', this.password);
    }
  }
};
</script>

<style scoped>
.form-connexion {
  display: flex;
  flex-wrap: wrap;
  height: 98vh;
  font-family: Arial, sans-serif;
}

.form-connexion {
  display: flex;
  height: 100vh;
}

/* Conteneur pour la section gauche (logo) */
.logo-section {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: pink;
}

.logo-container {
  max-width: 80%; /* Limite la largeur du conteneur du logo */
  display: flex;
  justify-content: center;
  align-items: center;
}

.logo {
  width: 250px; /* Ajuste la taille du logo */
  height: auto;
}

.connexion-section {
  flex: 1;
  padding: 40px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  background-color: white;
}

h2 {
  margin-bottom: 20px;
  color: #333;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
  color: #555;
}

input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

button {
  background-color: #fb5abc;
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
}

button:hover {
  background-color: #fd89ce;
}

.error {
  color: red;
  margin-top: 10px;
  font-size: 14px;
}

/* Media Queries pour rendre l'affichage responsive */
@media (max-width: 1200px) {
  .logo {
    width: 300px;
  }
  .form-connexion {
    flex-direction: row;
  }
}

@media (max-width: 768px) {
  .logo {
    width: 200px;
  }
  .form-connexion {
    flex-direction: column;
    height: auto;
  }
  .left-section, .right-section {
    flex: none;
    width: 100%;
  }
  .right-section {
    padding: 20px;
  }
  button {
    font-size: 14px;
    padding: 8px 12px;
  }
}

@media (max-width: 480px) {
  .form-connexion {
    padding: 10px;
  }
  .right-section {
    padding: 15px;
  }
  h2 {
    font-size: 20px;
  }
  input, button {
    font-size: 14px;
    padding: 8px;
  }
}
</style>