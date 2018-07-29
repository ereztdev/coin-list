<template>
    <div class="container">
        <div id="priceFrom">
        <select class="coin_list form-control" name="coin_list">
            <option value="">Choose Your Coin</option>
            <option v-bind:key="(id)" v-for="(coin, id) in coin_list">{{coin.name}}-{{coin.symbol}}</option>
        </select>
        </div>
        <h2 class="vs">VS</h2>
        <div id="priceTo">
        <select class="coin_list form-control" name="coin_list">
            <option value="">Choose Your Coin</option>
            <option v-bind:key="(id)" v-for="(coin, id) in coin_list">{{coin.name}}-{{coin.symbol}}</option>
        </select>
        </div>
    </div>
</template>

<script>
    import { mapState } from 'vuex'
    export default {
        name: "CoinListPrices",
        mounted() {
            this.$store.dispatch('loadCoins');
            this.$store.dispatch('getCoinList');
        },
        computed: mapState([
            'coins',
            'coin_list'
        ]),
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
    #priceFrom, #priceTo, .vs{
        display: inline-block;
    }
    .vs{
        margin: 0 50px;
    }

</style>