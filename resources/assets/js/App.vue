<template>
    <div id="">
        <navbar></navbar>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    import NavBar from './components/NavBar.vue'
    export default {
        name: 'index',
        components: {
            'navbar': NavBar
        }
    }
</script>