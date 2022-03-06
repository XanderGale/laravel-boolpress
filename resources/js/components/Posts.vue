<template>
    <section>
        <h1>Lista post:</h1>
    </section>
</template>

<script>
export default {
    name: 'Posts',
    data: function() {
        return {
            posts: [],
        };
    },
    methods: {
        getPosts: function() {
            // chiamata all' api per l'array posts
            axios.get('/api/posts')
            .then((response) =>{
                this.posts = response.data.results;
            });
        }
    },
    created: function(){
        this.getPosts();
    }
}
</script>