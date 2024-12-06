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
  width: 100%;               /* Assure que le footer occupe toute la largeur de la page */
  background-color: rgb(236, 112, 153);    /* Couleur de fond du footer */
  color: white;              /* Couleur du texte */
  text-align: center;        /* Centrer le texte */
  padding: 1rem;             /* Espacement interne */
  position: fixed;           /* Fixer le footer en bas de la page */
  bottom: 0;                 /* Positionner le footer au bas */
  left: 0;                   /* Assurer que le footer commence depuis le bord gauche */
  z-index: 1000;             /* Placer le footer par-dessus les autres éléments si nécessaire */
}

body {
  margin-bottom: 60px; /* Espacer le bas de la page pour éviter que le contenu ne soit masqué par le footer */

}
</style>
