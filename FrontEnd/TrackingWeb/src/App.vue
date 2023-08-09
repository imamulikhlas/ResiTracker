<script setup>
import MainLayout from "./layout/default.vue"
import WithoutNav from "./layout/withoutnav.vue"
import { useRoute } from 'vue-router'
 
const route = useRoute()
</script>
 
<template>
    <!-- If Route LOGIN -->
    <RouterView v-slot="{ Component }">
        <WithoutNav v-if="!route.meta.requiresAuth">
            <Component :is="Component"/>
        </WithoutNav>
 
        <!-- If Route for Dashboard -->
        <MainLayout v-else>
            <Component :is="Component"/>
        </MainLayout>
    </RouterView>
</template>