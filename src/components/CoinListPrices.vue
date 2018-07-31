<template>
    <div class="container">
        <div id="exchange_rate_wrapper">
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

<style lang="scss">

    #exchange_rate_wrapper{
        position: absolute;
        width: 100%;

        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
    }
    #price_from, #price_to, .vs {
        display: inline-block;
        margin: 0 25px;
    }

    .vs {
        transform: translate(0,50px);
        margin: 0 50px;
        font-size: 150px;
    }

    .break-50 {
        height: 50px;
        clear: both;
    }

    select {
        font-size: 25px;
        font-family: 'Catamaran', sans-serif;
    }

    .exchange_rate {
        font-family: 'Catamaran', sans-serif;
        font-weight: 100;

        font-size: 35px;
        color: #000;
    }


</style>