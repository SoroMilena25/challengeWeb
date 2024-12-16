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
        <h2>Connexion</h2>
        <form @submit.prevent="handleLogin">
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
          <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input
              type="password"
              id="mdp"
              v-model="mdp"
              placeholder="Entrez votre mot de passe"
              required
            />
          </div>
          <div class="button-container">
            <button type="submit">Se connecter</button>

            <router-link to="/inscription">
              <button class="btn btn-success">Inscription</button>
            </router-link>
          </div>
        </form>

        <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "FormConnexion",
  data() {
    return {
      email: "",
      mdp: "",
      errorMessage: "",
    };
  },
  methods: {
    async handleLogin() {
      try {
        const response = await fetch("http://localhost:3000/api/login", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            email: this.email,
            mdp: this.mdp,
          }),
        });

        const data = await response.json();

        if (response.ok) {
          alert("Connexion réussie !");
          localStorage.setItem("token", data.token);
          this.$router.push("/dashboard");
        } else {
          this.errorMessage = data.message || "Erreur lors de la connexion.";
        }
      } catch (error) {
        this.errorMessage =
          "Une erreur est survenue. Veuillez réessayer plus tard.";
      }
    },
  },
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

.logo-section {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: pink;
}

.logo-container {
  max-width: 80%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.logo {
  width: 250px;
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
button + button {
  margin-top: 10px;
}
input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.button-container {
  display: flex;
  justify-content: space-between;
  gap: 10px;
  margin-top: 20px;
}

button {
  background-color: #fb5abc;
  color: white;
  padding: 10px 150px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  flex-grow: 1;
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
  .left-section,
  .right-section {
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
  input,
  button {
    font-size: 14px;
    padding: 8px;
  }
}
</style>
