<template>
  <div id="app">
    <!--<img src="./assets/logo.png">-->
    <!--<HelloWorld msg="Crypto Exchange API demo"/>-->
      <!--<CoinListPrices></CoinListPrices>-->
      <router-view></router-view>

  </div>
</template>

<script>
import HelloWorld from './components/HelloWorld.vue'
import CoinListPrices from "./components/CoinListPrices";

export default {
  name: 'app',
  components: {
      CoinListPrices,
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
