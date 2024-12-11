<script>
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

export default {
  data() {
    return {
      posts: [
        {
          content: 'Ceci est un post.',
        },
        {
          content: 'Voici un autre post.',
        },
        {
          content: "J'adore les pitis chaaaaaaaats !!!!",
        },
        {
          content: 'Bienvenue <3',
        }
      ],
      isModalVisible: false, // Contrôle l'affichage du modal
    };
  }
  }
</script>

<template>
    <div id="contenuProfil">
        <div id="navBarProfilEntier">
            <div class="container text-center">
                <div class="row row-cols-3">
                    <div class="col"><img src="@/assets/meuf.jpg" alt="Photo" id="photoProfil"/></div>
                    <div class="col"><div class="titreProfil">Abonnés</div><div class="sousTitreProfil">22</div></div>
                    <div class="col"><div class="titreProfil">Abonnements</div><div class="sousTitreProfil">44</div></div>
                    <div class="col"><div class="titreProfil">Pseudo</div></div>
                </div>
            </div>
        </div>

        <!-- Liste des posts -->
        <div id="listPosts">
            <div class="posts">
                <div class="post" v-for="(post, index) in posts" :key="index">

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
        </div>
    </div>



</template>

<style>
#contenuProfil{
    width: 80%;
    margin: 1% auto;
    border: 1px transparent solid;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.362);
    background-color: #33333382;
    padding-bottom: 1%;
}

#navBarProfil{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    padding-top: 2%;
}

#navBarProfil div{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

#navBarProfilEntier{
    background-color: #ffffff;
    margin: 1px 2px;
    margin-bottom: 1%;
    border-top-left-radius : 12px;
    border-top-right-radius : 12px;
    padding: 2% 0;
}

#photoProfil{
    width: 22%;
    border-radius: 100px;
}

.sousTitreProfil{
    font-weight: bold;
}

.titreProfil{
    font-weight: bold;
    font-size: 18px;
}

.col{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

/* Liste des posts */
.posts {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}

.post {
  padding: 1.5rem;
  padding-top: 0;
  background-color: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.337);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.post:hover {
  /*transform: translateY(-5px);*/
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.186);
}

.post-header {
  display: flex;
  align-items: center;
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

#listPosts{
    width: 95%;
    margin: auto;
}
</style>
