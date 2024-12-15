<template>
  <footer class="footer">
    <p>&copy; 2024 Mon Réseau Social. Tous droits réservés.</p>
  </footer>
</template>

<script>
export default {
  name: 'Footer',
};
</script>

<style scoped>
.footer {
  width: 100%;               
  background-color: rgb(236, 112, 153);   
  color: white;             
  text-align: center;        
  padding: 1rem;            
  position: fixed;           
  bottom: 0;                 
  left: 0;                   
  z-index: 1000; 
}           

body {
  margin-bottom: 60px; 
}
</style>
