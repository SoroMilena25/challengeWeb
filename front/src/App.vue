<template>
  <div id="app">
    <Home />
  </div>
</template>

<script>
import Home from '@/views/Home.vue'; 
import 'bootstrap/dist/css/bootstrap.min.css';


export default {
  name: 'App',
  components: {
    Home
  }
};
</script>

<style>
#app {
background-color: pink;

}
</style>
