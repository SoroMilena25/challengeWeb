import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import path from "path";


export default defineConfig({
  plugins: [vue()],
  build: {
    outDir: '../public/build', // Placer les fichiers compilés dans public/build
    emptyOutDir: true,         // Nettoyer le dossier build avant chaque compilation
    manifest: true             // Générer un fichier manifest.json pour Symfony
  },
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "src"),
    },
  },
});

// front/vite.config.js
/*
export default {
  build: {
    outDir: '../public/build', // Cela place les fichiers compilés dans le dossier public/build de Symfony
    emptyOutDir: true,
    manifest: true,  // Génère un fichier manifest.json
  },
  server: {
    proxy: {
      '/': 'http://localhost:8000', // Redirige les requêtes vers le serveur Symfony si nécessaire
    }
  }
}
*/
