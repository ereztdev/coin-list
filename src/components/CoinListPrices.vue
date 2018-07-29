<template>
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            <!--<tr v-for="coin in coins" :key="coin.id">-->
                <!--<td>{{ coin.id }}</td>-->
                <!--<td>{{ coin.name }}</td>-->
                <!--<td>{{ coin.price }}</td>-->
            <!--</tr>-->
            </tbody>
        </table>
        <select class="coin_list form-control" name="coin_list">
            <option v-for="(coin, index) in coinsList"
        </select>
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
            'coinsList'
        ])
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
</style>