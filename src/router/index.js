import Vue from 'vue';
import  Router from 'vue-router';
import Home from '../pages/Home';
import Coin from '../pages/Coin';
import ExRate from '../pages/ExRate';

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/coin',
            name: 'Coin',
            component: Coin
        },
        {
            path: '/exchange-rate',
            name: 'ExRate',
            component: ExRate
        }
    ]
});
