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
        <h2 v-if="!isRegistered">Inscription</h2>
        <form v-if="!isRegistered" @submit.prevent="handleSignup">
        <!-- Nom -->
        <div class="form-group">
          <label for="nom">Nom</label>
          <input type="text" id="nom" v-model="nom" placeholder="Entrez votre nom" required />
        </div>
        <!-- Prénom -->
        <div class="form-group">
          <label for="prenom">Prénom</label>
          <input type="text" id="prenom" v-model="prenom" placeholder="Entrez votre prénom" required />
        </div>
        <!-- Pseudo -->
        <div class="form-group">
          <label for="pseudo">Pseudo</label>
          <input type="text" id="pseudo" v-model="pseudo" placeholder="Entrez un pseudo" required />
        </div>
        <!-- Email -->
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" v-model="email" placeholder="Entrez votre email" required />
        </div>
        <!-- Mot de passe -->
        <div class="form-group">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" v-model="password" placeholder="Entrez votre mot de passe" required />
        </div>
        <!-- Confirmation mot de passe -->
        <div class="form-group">
          <label for="confirmPassword">Confirmer le mot de passe</label>
          <input type="password" id="confirmPassword" v-model="confirmPassword" placeholder="Entrez de nouveau votre mot de passe" required />
        </div>
        <!-- Bouton d'inscription -->
        <button type="submit">S'inscrire</button>
      </form>

        <!-- Message de succès -->
        <p v-if="isRegistered" class="success">{{ successMessage }}</p>
        
        <!-- Affichage des erreurs -->
        <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
      </div>
    </div>
  </div>
</template>


<script>
// J'ai ajouté l'import de la configuration Axios ici
import api from '../axios'; // Assurez-vous que le chemin d'importation est correct pour ton projet

export default {
  name: 'FormConnexion',
  data() {
    return {
      nom: '',               // Ajout des propriétés pour le formulaire
      prenom: '',
      pseudo: '',
      email: '',
      password: '',
      confirmPassword: '',
      errorMessage: '',      // Message d'erreur à afficher si l'inscription échoue
      successMessage: '',
      isRegistered: false
    };
  },
  methods: {
    // Méthode d'inscription
    async handleSignup() {
      // Vérification de la correspondance des mots de passe
      if (this.password !== this.confirmPassword) {
        this.errorMessage = "Les mots de passe ne correspondent pas."; // Message d'erreur si les mots de passe ne correspondent pas
        return;
      }

      // Création des données de l'utilisateur à envoyer
      const userData = {
        nom: this.nom,
        prenom: this.prenom,
        pseudo: this.pseudo,
        email: this.email,
        mdp: this.password, // Le champ 'mdp' correspond à la clé dans ton entité Symfony
      };

      try {
        // Envoi des données à l'API Symfony via Axios avec le bon Content-Type
        const response = await api.post('/users', userData, {
          headers: {
            'Content-Type': 'application/ld+json', // Type de contenu attendu par l'API
          }
        });
        console.log('Inscription réussie:', response.data);

        // Réinitialiser les messages d'erreur et de succès
        this.errorMessage = ''; 
        this.successMessage = 'Inscription réussie, redirection en cours...';
        this.isRegistered = true; // Inscription réussie, changer l'état

        // Rediriger après 3 secondes
        setTimeout(() => {
          this.$router.push('/connexion'); // Redirection vers la page de connexion
        }, 3000); // 3000 ms = 3 secondes

      } catch (error) {
        // Gestion des erreurs si l'inscription échoue
        this.errorMessage = error.response ? error.response.data.message : "Erreur lors de l'inscription.";
        console.error('Erreur lors de l\'inscription:', error);
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