<template>
  <div>
    <Navbar />
    <FormMessages />
    <Footer />
  </div>
</template>

<script>
import FormMessages from "@/components/FormMessages.vue"
import Navbar from "@/components/Navbar.vue";
import Footer from "@/components/Footer.vue";

export default {
  name: "Messages",
  components: {
    Navbar,
    Footer,
    FormMessages
  }
};
</script>
