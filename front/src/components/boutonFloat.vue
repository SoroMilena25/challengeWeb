<template>
    <button class="floating-button" @click="handleClick">+</button>
  </template>
  
  <script>
  export default {
    name: "BoutonFloat",
    methods: {
      handleClick() {
        this.$emit("open-modal"); // Émet l'événement pour ouvrir le modal
      },
    },
  };
  </script>
  
  <style scoped>
  .floating-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #9f56ac;
    color: white;
    font-size: 2rem;
    border: none;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s, transform 0.2s;
    z-index: 1000;
  }
  
  .floating-button:hover {
    background-color: #733b84;
    transform: scale(1.1);
  }
  </style>
  