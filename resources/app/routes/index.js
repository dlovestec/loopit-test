import {createRouter, createWebHashHistory} from "vue-router";
import HomeScreen from "../screens/HomeScreen";
import LoginScreen from "../screens/guest/LoginScreen";
import NotFoundScreen from '../screens/errors/NotFoundScreen';

const router = createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            path: '/home',
            name: 'HomeScreen',
            component: HomeScreen,
        },
        {
            path: '/guest/login',
            name: 'LoginScreen',
            component: LoginScreen,
        },
      {
            path: '/:pathMatch(.*)',
            name: '404NotFound',
            component: NotFoundScreen,
        },
    ]
});

export default router;
