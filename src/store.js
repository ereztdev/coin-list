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
          console.log(this.state.coinExRate)
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
          axios.get(HOST+'/api/coins_rate/?coinsFrom='+this.state.coinFrom+'&coinsTo='+this.state.coinTo)
              .then(r => r.data)
              .then(coinExRate =>{
                  if (this.state.coinFrom in coinExRate.DISPLAY){
                      commit('SET_PAIR', coinExRate.DISPLAY[this.state.coinFrom][this.state.coinTo].PRICE);
                  }else{
                      commit('SET_PAIR', 'this exchange does not exist in current form, try the reverse rate');
                  }
                  // console.log(coinExRate.DISPLAY);
                  // if (coinExRate.DISPLAY === {}) {
                  //     return false;
                  // }
                  //
              })
      },
      getCoinList({commit}){
          axios.get(HOST+'/api/coin_list')
              .then(r => r.data)
              .then(coin_list =>{
                  commit('SET_COIN_LIST', coin_list.data)
              })
      },

  }
})
