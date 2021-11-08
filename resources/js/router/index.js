

import {routes} from './routes';
import VueRouter from 'vue-router';

const router = new VueRouter({
    mode: 'history',
    routes: routes
});


export default router