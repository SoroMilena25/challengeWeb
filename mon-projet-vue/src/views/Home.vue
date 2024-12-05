<template>
  <div>
    <Navbar />
    <Message />
  </div>
</template>

<script>
import Navbar from "@/components/Navbar.vue";
import Message from "@/components/Message.vue";


export default {
  name: "Home",
  components: {
    Navbar,
    Message
  }
};
</script>
