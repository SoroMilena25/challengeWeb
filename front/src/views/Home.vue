<template>
  <div>
    <Navbar />
    <Body />
    <Footer />
    
    <!-- Bouton flottant -->
    <BoutonFloat @open-modal="showModal = true" />
    
    <!-- Modal pour publier un post -->
    <Popup
      v-if="showModal"
      :isVisible="showModal"
      @close="showModal = false"
      @publish="addPost"
    />
  </div>
</template>

<script>
import Navbar from "@/components/Navbar.vue";
import Body from "@/components/Body.vue";
import Footer from "@/components/Footer.vue";
import Popup from "@/components/Popup.vue";
import BoutonFloat from "@/components/BoutonFloat.vue";

export default {
  name: "Home",
  components: {
    Navbar,
    Body,
    Footer,
    Popup,
    BoutonFloat  },
    
  data() {
    return {
      showModal: false, // État pour gérer l'affichage du modal
      posts: [],
    };
  },
  methods: {
    // Ajouter un post
    addPost(content) {
      this.posts.push({
        user: { avatar: 'https://via.placeholder.com/40', username: 'User' },
        content,
      });
      this.showModal = false; // Fermer le modal après la publication
    },
  },
};
</script>

<style scoped>
/* Ajoutez ici des styles si nécessaires */
</style>
