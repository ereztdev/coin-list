<template>
    <div>
        <div class="upper"></div>
        <div class="bottom"></div>
    </div>
</template>

<script>
    export default {
        name: "BodySplit"
    }
</script>

<style lang="scss">
    .upper {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translate(-50%, 0);
        width: 100vw;
        height: 50vh;
        background-color: #e1c900;
    }
</style>