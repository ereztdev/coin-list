<template>
    <div class="container">
        <vimeo-background></vimeo-background>
        <div class="title">
            <h1>{{msg}}</h1>
        </div>
    </div>

</template>

<script>
    import VimeoBackground from '../components/VimeoBackground';
    export default {
        components: {
            VimeoBackground
        },
        name: "Coin",
        data() {
            return {
                msg: 'This is Coin'
            }
        }
    }

</script>

<style scoped>

</style>