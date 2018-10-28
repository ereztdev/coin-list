import Vue from 'vue'
import App from './App.vue'
import store from './store'
import router from './router/index'
var Web3 = require('aion-web3');
var web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));

if(!web3.isConnected())
    console.log("not connected");
else
    console.log("connected");

Vue.config.productionTip = false


new Vue({
    store,
    router,
    render: h => h(App)
}).$mount('#app');
