<template>
    <div class="video--wrapper">
        <video requestFullScreen autoplay loop muted>
            <source  src="../assets/images/SampleVideo_1280x720_5mb.mp4"/>
        </video>

    </div>
</template>

<script>
    export default {
        name: "VideoBackground"
    }
</script>

<style lang="scss">
    .video--wrapper{
        position: relative;
        width: 100%;
        margin: 0;
        padding: 0;
        top: 0;
        height: 100%;
        z-index: -1;
        overflow: hidden;

    }
    video{
        position: fixed;
        right: 0;
        bottom: 0;
        width: 100%;
    }
    h1 {
        color: red;
    }
</style>