<template>
  <div class="app-body">
    <div class="post-form">
      <textarea placeholder="Quoi de neuf ?"></textarea>
      <button>Publier</button>
    </div>
    <div class="posts">
      <div class="post" v-for="(post, index) in posts" :key="index">
        <div class="post-header">
          <img :src="post.user.avatar" alt="Avatar" class="avatar" />
          <span class="username">{{ post.user.username }}</span>
        </div>
        <p class="post-content">{{ post.content }}</p>
        <div class="post-actions">
          <button>J'aime</button>
          <button>Commenter</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Body',
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
    };
  },
};
</script>

<style scoped>
html, body {
  margin: 0;
  padding: 0;
  height: 100%;
  font-family: Arial, sans-serif;
}

.app-body {
  display: flex;
  flex-direction: column;
  min-height: 100vh; 
}

.post-form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  margin: 2rem;
  background-color: pink;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.4);
}

textarea {
  padding: 1rem;
  font-size: 1rem;
  width: 100%;
  border-radius: 8px;
  border: 1px solid #ccc;
  resize: vertical;
}

button {
  background-color: #9f56ac;
  color: white;
  border: none;
  padding: 0.5rem 1rem;
  cursor: pointer;
  border-radius: 5px;
  transition: background-color 0.3s;
}

button:hover {
  background-color: #733b84;
}

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
  background-color: pink;
  border-radius: 8px;
  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
}

.post-header {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
}

.username {
  font-weight: bold;
}

.post-content {
  margin-top: 1rem;
}

.post-actions {
  display: flex;
  gap: 1rem;
  margin-top: 1rem;
}

.post-actions button {
  padding: 0.5rem 1rem;
  background-color: #9f56ac;
  color: white;
  border: none;
  border-radius: 5px;
  transition: background-color 0.3s;
}

.post-actions button:hover {
  background-color: #733b84;
}
</style>
