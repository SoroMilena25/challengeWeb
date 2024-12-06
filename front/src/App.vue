<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
import Home from '@/views/Home.vue'; 
import 'bootstrap/dist/css/bootstrap.min.css';


export default {
  name: 'App',
};
</script>

<style>
#app {
background-color: pink;

}
</style>
