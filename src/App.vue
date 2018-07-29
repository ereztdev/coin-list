<template>
  <div id="app">
    <!--<img src="./assets/logo.png">-->
    <HelloWorld msg="Welcome to Your Vue.js App"/>
      <CoinList></CoinList>
  </div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import CoinList from "./components/CoinList";

export default {
  name: 'app',
  components: {
      CoinList,
    HelloWorld
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
