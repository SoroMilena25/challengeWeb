<template>
  <div class="app-body">
    

    <!-- Liste des posts -->
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

    <BoutonFloat @open-modal="openModal" />

    <Popup 
      v-if="isModalVisible" 
      @close="closeModal" 
      @publish="publishPost"
    />
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
          user: { avatar: 'https://via.placeholder.com/40', username: 'Ichigo' },
          content: "trop bien le film",
        },
        {
          user: { avatar: 'https://via.placeholder.com/40', username: 'KK_du_94' },
          content: 'Trop bien Arcane.',
        },
      ],
      isModalVisible: false,
    };
  },
  methods: {
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
      this.closeModal(); 
      
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

/* Style de la bannière */
.banner {
  background-color: #9f56ac;
  color: white;
  padding: 2rem;
  text-align: center;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.banner h1 {
  margin: 0;
  font-size: 2.5rem;
}

.banner p {
  font-size: 1.2rem;
  margin-top: 0.5rem;
}

/* Liste des posts */
.posts {
  flex-grow: 1;
  padding: 2rem;
  display: flex;
  flex-direction: column;
  gap: 2rem;
  overflow-y: auto;
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
  gap: 1rem;
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
</style>
