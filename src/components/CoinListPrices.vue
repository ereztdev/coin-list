<template>
    <div class="container">
        <div id="price_from">
            <select class="coin_list coinFrom form-control" name="coin_list" @input="coinFromSelect">
                <option>Choose Your Coin</option>
                <option :value="coin.symbol" v-for="(coin, id) in coin_list">{{coin.name}}-{{coin.symbol}}</option>
            </select>
        </div>
        <h2 class="vs">VS</h2>
        <div id="price_to">
            <select class="coin_list coinTo form-control" name="coin_list" @input="coinToSelect">
                <option>Choose Your Coin</option>
                <option :value="coin.symbol" v-for="(coin, id) in coin_list">{{coin.name}}-{{coin.symbol}}</option>
            </select>
        </div>
        <div class="break-50"></div>
        <div v-if="this.$store.state.coinFrom && this.$store.state.coinTo" class="exchange_rate">
            1 {{this.$store.state.coinFrom}} = {{this.$store.state.coinExRate}}
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'

    export default {
        name: "CoinListPrices",
        mounted() {
            // console.log(this.$store);

            this.$store.dispatch('getCoinList');
        },
        computed: mapState([
            'coins',
            'coin_list',
            'coinFrom',
            'coinTo'
        ]),
        methods: {
            getRate() {
                if (this.$store.state.coinFrom && this.$store.state.coinTo) {
                    this.$store.dispatch('loadRate');
                }
            },
            coinFromSelect(e) {
                const symbol = e.target.value;
                this.$store.commit('coinFromSelect', symbol);
                this.getRate();
            },

            coinToSelect(e) {
                const symbol = e.target.value;
                this.$store.commit('coinToSelect', symbol);
                this.getRate();
            }

        }
    }

</script>

<style scoped>
    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        margin: 0 10px;
    }

    #price_from, #price_to, .vs {
        display: inline-block;
    }

    .vs {
        margin: 0 50px;
    }

    .break-50 {
        height: 50px;
        clear: both;
    }

</style>