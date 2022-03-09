<template>
    <div>
        <header>
            <Navbar/>
        </header>
        <router-view></router-view>
    </div>
</template>

<script>
import Posts from '../components/Posts.vue';
import Navbar from '../components/Navbar.vue';

export default {
    name: 'App',
    components: {
        Posts,
        Navbar,
    }
}
</script>