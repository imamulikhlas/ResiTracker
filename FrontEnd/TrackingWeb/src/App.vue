<script setup>
import MainLayout from "./layout/default.vue"
import WithoutNav from "./layout/withoutnav.vue"
</script>

<template>
    <!-- If Route LOGIN -->
    <RouterView v-slot="{ Component }">
    <WithoutNav v-if="$route.name === 'home' || $route.name === '404' || $route.name === 'login'">
        <Component :is="Component"/>
    </WithoutNav>

    <!-- If Route for Dashboard -->
    <MainLayout v-else>
        <Component :is="Component"/>
    </MainLayout>
    </RouterView>
</template>