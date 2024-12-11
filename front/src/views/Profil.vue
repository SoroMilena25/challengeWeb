<template>
    <div>
      <Navbar />
      <NavBarProfil />
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
import NavBarProfil from "@/components/NavBarProfil.vue";
import Footer from "@/components/Footer.vue";
import Popup from "@/components/Popup.vue";
import BoutonFloat from "@/components/BoutonFloat.vue";


export default {
  name: "Profil",
  components: {
      Navbar,
      NavBarProfil,
      Footer,
      Popup,
      BoutonFloat
  },
  data() {
    return {
      showModal: false, // État pour gérer l'affichage du modal
      posts: [],
    };
  }
};
</script>
  