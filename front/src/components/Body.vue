<template>
  <div class="app-body">
    
    <!-- Conteneur Flexbox pour aligner la carte à gauche et les posts à droite -->
    <div class="main-content">
      <!-- Carte à gauche -->
      <div class="left-side">
        <div class="card" style="width: 18rem;">
          <div class="text-profil">
            <p><a href="#">Mon profil</a></p>
          </div> 
                   
          <!-- Conteneur de l'avatar dans la carte -->
          <div class="avatar-container">
            <img src="@/assets/img_avatar.png" class="avatar-card" />
          </div>          
          <div class="card-body">
            
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><div class="well">
          <p>Centre d'intérêt</p>
          <p>
            <span class="label label-default">Dessin</span>
            <span class="label label-primary">Informatique</span>
            <span class="label label-success">Crochet</span>
            <span class="label label-info">Peinture</span>
            <span class="label label-warning">Gaming</span>
            <span class="label label-danger">Nourriture</span>
          </p>
        </div>
</li>
            <li class="list-group-item">
       <div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>WOW!</strong><br> Quelqu'un a vue votre profile !
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div></li>
          </ul>
        </div>
      </div>

      <!-- Liste des posts à droite -->
      <div class="right-side">
        <div class="posts">
          <div class="post" v-for="(post, index) in posts" :key="index">
            <!-- En-tête du post -->
            <div class="post-header">
              <img :src="post.user.avatar" alt="Avatar de {{ post.user.username }}" class="avatar" />
              <span class="username">{{ post.user.username }}</span>
            </div>

            <!-- Contenu du post -->
            <p class="post-content">{{ post.content }}</p>

            <!-- Actions du post -->
            <div class="post-actions">
              <button aria-label="Aimer">
                <img src="@/assets/heart-fill.svg" alt="Aimer" />
              </button>
              <button aria-label="Aimer">
                <img src="@/assets/chat.svg" alt="Commentaire" />
              </button>
            </div>
          </div>
        </div>

        <!-- Bouton flottant pour publier un post -->
        <BoutonFloat @open-modal="openModal" />

        <!-- Modal pour créer un post -->
        <Popup 
          v-if="isModalVisible" 
          @close="closeModal" 
          @publish="publishPost"
        />
      </div>
    </div>
  </div>
</template>

<script>
import BoutonFloat from "@/components/BoutonFloat.vue";
import Popup from "@/components/Popup.vue";

export default {
  name: "Body",
  components: {
    BoutonFloat,
    Popup
  },
  data() {
    return {
      posts: [
        {
          user: { avatar: 'https://via.placeholder.com/40', username: 'Alice' },
          content: 'Ceci est un post.',
        },
        {
          user: { avatar: 'https://via.placeholder.com/40', username: 'Bob' },
          content: 'Voici un autre post.',
        },
      ],
      isModalVisible: false, // Contrôle l'affichage du modal
    };
  },
  methods: {
    // Ouvre le modal
    openModal() {
      this.isModalVisible = true;
    },
    // Ferme le modal
    closeModal() {
      this.isModalVisible = false;
    },
    // Publie le post et l'ajoute à la liste
    publishPost(content) {
      if (content.trim()) {
        this.posts.unshift({
          user: { avatar: 'https://via.placeholder.com/40', username: 'You' },
          content: content,
        });
      }
      this.closeModal(); // Ferme le modal après publication
    },
  },
};
</script>

<style scoped>
html,
body {
  margin: 0;
  padding: 0;
  height: 100%;
  font-family: 'Arial', sans-serif;
  background-color: #f5f5f5;
}

.app-body {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  background-color: #fafafa;
}

/* Conteneur principal pour aligner la carte et le contenu des posts */
.main-content {
  display: flex;
  padding: 2rem;
  gap: 2rem;
}

.left-side {
  flex: 0 0 20%; /* La carte prend 20% de la largeur */
}

.right-side {
  flex-grow: 1; /* Le reste du contenu prend toute la largeur restante */
}

/* Styles de la carte */
.card {
  width: 100%; /* La carte prend toute la largeur de son conteneur */
  margin-bottom: 2rem;
}

/* Conteneur de l'avatar dans la carte */
.avatar-container {
  display: flex;
  justify-content: center;
  margin-bottom: 1rem;
}
.text-profil {
  display: flex;
  justify-content: center;  /* Centrer horizontalement */
  align-items: center;      /* Centrer verticalement */
  margin-top: 1rem;         /* Espacement au-dessus du texte */
  font-size: 1.5rem;        /* Taille du texte */
  font-weight: bold;        /* Mettre le texte en gras */
}
.avatar-card {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  object-fit: cover;
}

/* Liste des posts */
.posts {
  flex-grow: 1; /* Prendre tout l'espace restant */
  padding: 2rem;
  display: flex;
  flex-direction: column;
  gap: 2rem;
  overflow-y: auto; /* Permettre le défilement si nécessaire */
}

.post {
  padding: 1.5rem;
  background-color: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.post:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

.post-header {
  display: flex;
  align-items: center;
}

.avatar {
  width: 45px;
  height: 45px;
  border-radius: 50%;
  border: 2px solid #9f56ac;
}

.username {
  font-weight: bold;
  font-size: 1.1rem;
}

.post-content {
  margin-top: 1rem;
  font-size: 1rem;
  color: #333;
}

.post-actions {
  display: flex;
  gap: 1.5rem;
  margin-top: 1rem;
}

.post-actions button {
  padding: 0.5rem 1.2rem;
  background-color: #9f56ac;
  color: white;
  border: none;
  border-radius: 5px;
  transition: background-color 0.3s, transform 0.2s ease;
}

.post-actions button:hover {
  background-color: #733b84;
  transform: scale(1.05);
}
/* Style pour la section "Interests" */
.well {
  background-color: #f7f7f7;
  padding: 1rem;
  margin-top: 1rem;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.well p {
  margin: 0;
  font-size: 1rem;
}

.well .label {
  display: inline-block;
  padding: 0.5rem 1rem;
  margin: 0.25rem;
  border-radius: 15px;
  color: white;
  font-size: 0.85rem;
}

.well .label-default {
  background-color: #999;
}

.well .label-primary {
  background-color: #337ab7;
}

.well .label-success {
  background-color: #5cb85c;
}

.well .label-info {
  background-color: #5bc0de;
}

.well .label-warning {
  background-color: #f0ad4e;
}

.well .label-danger {
  background-color: #d9534f;
}

</style>
