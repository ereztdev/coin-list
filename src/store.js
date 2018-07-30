import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(Vuex);
Vue.use(VueAxios, axios);

const HOST = 'http://localhost:3000';

export default new Vuex.Store({
  state: {
      coinExRate:'',
      coin_list: [],
      coinFrom: '',
      coinTo: '',
  },
  mutations: {
      SET_PAIR(state, coinExRate){
          state.coinExRate = coinExRate;
      },
      SET_COIN_LIST(state, coin_list){
          state.coin_list = coin_list;
      },
      coinFromSelect(state, symbol){
         state.coinFrom = symbol;
      },
      coinToSelect(state, symbol){
         state.coinTo = symbol;
      }

  },
  actions: {
      loadRate ({ commit }){


          axios
              .get(HOST+'/api/coins_rate/?coinsFrom='+this.state.coinFrom+'&coinsTo='+this.state.coinTo)
              .then(r => r.data)
              .then(coinExRate =>{
                  // let regExp = /=\(([0-9|.]+)\)/;
                  // let matches = regExp.exec(coinExRate.DISPLAY[this.state.coinFrom][this.state.coinTo].PRICE);
                  // let result = matches[1];
                  commit('SET_PAIR', coinExRate.DISPLAY[this.state.coinFrom][this.state.coinTo].PRICE);
                  // console.log(coinExRate.DISPLAY[coinFromResponse][coinToResponse].PRICE)
              })
      },
      getCoinList({commit}){
          axios.get(HOST+'/api/coin_list')
              .then(r => r.data)
              .then(coin_list =>{
                  // console.log(coin_list.data);
                  commit('SET_COIN_LIST', coin_list.data)
              })
      },

  }
})
