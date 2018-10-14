<template>
    <div class="container">
        <video-background></video-background>
        <div class="title">
            <h1>{{msg}}</h1>
        </div>
    </div>
</template>

<script>
    import VideoBackground from '../components/VideoBackground';
    export default {
        components: {
            VideoBackground
        },
        name: "Home",
        data() {
            return {
                msg: 'This is Home'
            }
        }
    }

</script>

<style scoped>

</style>