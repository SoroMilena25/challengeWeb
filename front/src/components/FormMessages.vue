<template>
  <div class="messages-page container-fluid d-flex">
    <!-- Liste des conversations -->
    <div class="message-list col-3 p-3 border-end">
      <div 
        v-for="(conversation, index) in conversations" 
        :key="index" 
        class="conversation mb-2 p-3 border rounded d-flex align-items-center"
        @click="openConversation(index)"
      >
        <img :src="conversation.avatar" alt="Avatar de {{ conversation.username }}" class="avatar rounded-circle me-3" />
        <div class="conversation-info flex-column">
          <span class="username fw-bold">{{ conversation.username }}</span>
          <p class="last-message text-muted">{{ conversation.lastMessage }}</p>
        </div>
        <div v-if="conversation.newMessages" class="new-messages bg-light p-1 rounded ms-auto">
          <span>Vous avez des nouveaux messages</span>
        </div>
      </div>
    </div>

    <!-- Fenêtre de conversation -->
    <div v-if="selectedConversation !== null" class="conversation-window col-9 p-3">
      <div class="conversation-header d-flex align-items-center mb-3">
        <img :src="conversations[selectedConversation].avatar" alt="Avatar de {{ conversations[selectedConversation].username }}" class="avatar rounded-circle me-3" />
        <span class="username fw-bold">{{ conversations[selectedConversation].username }}</span>
      </div>

      <div class="message-content">
        <!-- Messages de la conversation -->
        <div 
          v-for="(message, index) in conversations[selectedConversation].messages" 
          :key="index" 
          :class="['message mb-3', message.sender === 'Moi' ? 'sent' : 'recu']"
        >
          <div :class="['message-text', message.sender === 'Moi' ? 'sent-text' : 'received-text', 'p-2 rounded']">
            {{ message.text }}
          </div>
          <div class="message-time text-muted small">{{ message.time }}</div>
        </div>
      </div>

      <!-- Champ pour répondre -->
      <div class="reply-section mt-3 d-flex flex-column">
        <textarea 
          v-model="newMessage" 
          class="form-control mb-2"
          rows="3"
          placeholder="Écrire un message..." 
          @keydown.enter="sendMessage"
        ></textarea>
        <button class="btn btn-pink" @click="sendMessage">Envoyer</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Messages",
  data() {
    return {
      newMessage: "",
      selectedConversation: null, // Indice de la conversation sélectionnée
      conversations: [
        {
          username: 'Alice',
          avatar: 'https://via.placeholder.com/40',
          lastMessage: 'Salut, comment ça va ?',
          newMessages: true,
          messages: [
            { sender: 'Alice', text: 'Salut, comment ça va ?', time: '12:30' },
            { sender: 'Moi', text: 'Ça va bien, et toi ?', time: '12:32' },
          ]
        },
        {
          username: 'Bob',
          avatar: 'https://via.placeholder.com/40',
          lastMessage: 'Tu as vu le dernier film ?',
          newMessages: false,
          messages: [
            { sender: 'Bob', text: 'Tu as vu le dernier film ?', time: '13:00' },
            { sender: 'Moi', text: 'Oui, c’était génial !', time: '13:05' },
          ]
        },
        {
          username: 'Charlie',
          avatar: 'https://via.placeholder.com/40',
          lastMessage: 'Tu veux prendre un café demain ?',
          newMessages: false,
          messages: [
            { sender: 'Charlie', text: 'Tu veux prendre un café demain ?', time: '14:00' },
            { sender: 'Moi', text: 'Oui, avec plaisir !', time: '14:10' },
          ]
        }
      ]
    };
  },
  methods: {
    // Ouvre la conversation sélectionnée
    openConversation(index) {
      this.selectedConversation = index;
      // Marquer tous les messages comme lus
      this.conversations[index].newMessages = false;
    },
    // Envoie un message dans la conversation sélectionnée
    sendMessage() {
      if (this.newMessage.trim()) {
        const message = {
          sender: 'Moi',
          text: this.newMessage,
          time: new Date().toLocaleTimeString(),
        };
        this.conversations[this.selectedConversation].messages.push(message);
        this.newMessage = ''; // Réinitialiser le champ de message
      }
    }
  }
};
</script>

<style scoped>
/* Ajout de Bootstrap par défaut */
.messages-page {
  min-height: 100vh;
}

.avatar {
  width: 40px;
  height: 40px;
}

.new-messages {
  font-size: 0.9rem;
}

.conversation-window {
  background-color: #f8f9fa;
}

.message-text {
  background-color: #f1f1f1;
}

.sent-text {
  background-color: #a9f5d0;
  color: #2a4d2f;
}

.received-text {
  background-color: #f0f0f0;
  color: #333;
}

button.btn-pink {
  background-color: #ff69b4;
  color: white;
  border: none;
}

button.btn-pink:hover {
  background-color: #ff1493;
}

.message-time {
  font-size: 0.8rem;
  color: #888;
}
</style>
