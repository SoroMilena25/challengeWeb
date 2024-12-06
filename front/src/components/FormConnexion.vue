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
          <label for="password">Mot de passe</label>
          <input type="password" id="password" v-model="password" placeholder="Entrez votre mot de passe" required />
        </div>
        <button type="submit">Se connecter</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: 'FormConnexion',
  data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    handleLogin() {
      console.log('Email:', this.email, 'Password:', this.password);
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
</style>
