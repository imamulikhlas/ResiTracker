import { createRouter, createWebHistory } from "vue-router";

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
            component: () => import('../views/dashboard.vue')
        }
    ]
})

export default router