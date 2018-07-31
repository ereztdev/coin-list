<template>
    <div class="title">
        <h1>{{msg}}</h1>
    <CoinListPrices></CoinListPrices>
    </div>
</template>
<script>
    import CoinListPrices from "../components/CoinListPrices";

    export default {
        name: "ExRate",
        components:{
            CoinListPrices
        },
        data() {
            return {
                msg: 'This is ExRate'
            }
        }
    }

</script>

<style scoped>

</style>