import { createRouter, createWebHistory } from "vue-router";
import Cookies from 'js-cookie';

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            name:"home",
            path:"/",
            component: () => import('../views/home.vue')
        },
        {
            name:"login",
            path:"/login",
            component: () => import('../views/auth/login.vue')
        },
        {
            name:"dashboard",
            path:"/dashboard",
            component: () => import('../views/dashboard.vue'),
            beforeEnter: (to, from, next) => {
                const token = Cookies.get('auth_token');
                if (!token) {
                  next({ name: 'login' });  // Redirect to login if user is not authenticated
                } else {
                  next();
                }
            }
        },

        {
            name:"404",
            path: '/:pathMatch(.*)*',
            component: ()=> import('../views/error/404.vue'),
        },
    ]
})

export default router