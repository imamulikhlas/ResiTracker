<script setup>
import Header from "./header.vue"
import Footer from "./footer.vue"

</script>

<template>
    <Header />
    <div>
        <div >
            TES LAYOUT
        </div>

        

        <div>
            <slot/>
        </div>
    </div>
     <Footer/>
</template>

