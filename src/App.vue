<template>
    <div id="app">
        <!--<img src="./assets/logo.png">-->
        <!--<HelloWorld msg="Crypto Exchange API demo"/>-->
        <nav>
            <div class="container">
                <ul class="nav__left">

                    <!-- Navigation Links -->
                    <li>
                        <router-link to="/">Home</router-link>
                    </li>
                    <li>
                        <router-link to="/coin">Coin</router-link>
                    </li>
                    <li>
                        <router-link to="/exchange-rate">Exchange Rate</router-link>
                    </li>

                </ul>
            </div>
        </nav>
        <router-view></router-view>

    </div>
</template>

<script>
    import BodySplit from './components/BodySplit'

    export default {
        name: 'app',
        components: {
            BodySplit,
        }
    }
</script>

<style lang="scss">
    #app {
    @import url('https://fonts.googleapis.com/css?family=Catamaran:100,300,800|Open+Sans:800');
        font-family: 'Open Sans', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 50px;
    }
    $black: #1d1d1d;
    body{
        background: $black;
    }
    nav{
        ul{
            list-style-type: none;
            li{
                display: inline-block;
                margin: 0 25px;
                a{
                    font-size: 35px;
                    font-weight: 600;
                    text-decoration: none;
                    color: #fff;
                }
            }
        }
    }

</style>
