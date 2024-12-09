<template>
    <div v-if="isVisible" class="modal-overlay" @click="$emit('close')">
      <div class="modal-content" @click.stop>
        <button class="close-btn" @click="$emit('close')">&times;</button>
        <h2>Publier un Post</h2>
        <textarea v-model="postContent" placeholder="Quoi de neuf ?"></textarea>
        <div class="modal-actions">
          <button @click="publishPost">Publier</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "Popup",
    props: {
      isVisible: Boolean, // Contrôle la visibilité du modal
    },
    data() {
      return {
        postContent: "", // Contenu du post
      };
    },
    methods: {
      publishPost() {
        if (this.postContent.trim()) {
          this.$emit('publish', this.postContent); // Envoie le contenu du post au parent
          this.postContent = ""; // Réinitialise après publication
          this.$emit('close'); // Ferme le modal après publication
        } else {
          alert("Le contenu ne peut pas être vide.");
        }
      },
    },
  };
  </script>
  
  <style scoped>
  .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }
  
  .modal-content {
    background-color: white;
    padding: 2rem;
    border-radius: 12px;
    width: 400px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  
  .modal-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 1rem;
  }
  
  .modal-actions button {
    padding: 0.75rem 1.5rem;
    background-color: #9f56ac;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  
  .modal-actions button:hover {
    background-color: #733b84;
  }
  
  textarea {
    width: 100%;
    height: 150px;
    padding: 1rem;
    font-size: 1rem;
    border-radius: 8px;
    border: 1px solid #ccc;
    resize: vertical;
  }
  
  .close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    background: transparent;
    border: none;
    font-size: 2rem;
    color: #9f56ac;
    cursor: pointer;
  }
  
  .close-btn:hover {
    color: #733b84;
  }
  </style>
  