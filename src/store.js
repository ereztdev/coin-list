import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(Vuex);
Vue.use(VueAxios, axios);
const HOST = 'http://localhost:3000';

export default new Vuex.Store({
  state: {
      coins:[],
      coin_list: []

  },
  mutations: {
      SET_COINS(state, coins){
          state.coins = coins;
      },
      SET_COIN_LIST(state, coin_list){
          state.coin_list = coin_list;
      }

  },
  actions: {
      loadCoins ({ commit }){
          axios
              .get(HOST+'/api/coins/?coinsFrom=LTC&coinsTo=ETH')
              .then(r => r.data)
              .then(coins =>{
                  // console.log(coins.DISPLAY);
                  commit('SET_COINS', coins)
              })
      },
      getCoinList({commit}){
          axios.get(HOST+'/api/coin_list')
              .then(r => r.data)
              .then(coin_list =>{
                  commit('SET_COIN_LIST', coin_list)
              })
      }
  }
})
