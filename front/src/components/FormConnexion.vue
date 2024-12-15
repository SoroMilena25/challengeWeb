<template>
  <div class="form-connexion">
    <div class="left-section">
      <img src="@/assets/logo1.png" alt="Logo" class="logo" />
    </div>

    <div class="right-section">
      <h2>Connexion</h2>
      <form @submit.prevent="handleLogin">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" v-model="email" placeholder="Entrez votre email" required />
        </div>
        <div class="form-group">
          <label for="mdp">Mot de passe</label>
          <input type="password" id="mdp" v-model="mdp" placeholder="Entrez votre mot de passe" required />
        </div>
        <button type="submit">Se connecter</button>
      </form>
      <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
    </div>
  </div>
</template>

<script>
export default {
  name: 'FormConnexion',
  data() {
    return {
      email: '',
      mdp: '',
      errorMessage: '',
    };
  },
  methods: {
    async handleLogin() {
      try {
        const response = await fetch('http://localhost:3000/api/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            email: this.email,
            mdp: this.mdp,
          }),
        });

        const data = await response.json();

        if (response.ok) {
          alert('Connexion réussie !');
          localStorage.setItem('token', data.token);
          this.$router.push('/dashboard');
        } else {
          this.errorMessage = data.message || 'Erreur lors de la connexion.';
        }
      } catch (error) {
        this.errorMessage = 'Une erreur est survenue. Veuillez réessayer plus tard.';
      }
    },
  },
};
</script>

<style scoped>
.form-connexion {
  display: flex;
  height: 98vh;
  font-family: Arial, sans-serif;
}

.left-section {
  flex: 1;
  background-color: pink;
  display: flex;
  justify-content: center;
  align-items: center;
}

.logo {
  width: 400px;
  height: auto;
}

.right-section {
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
</style>
