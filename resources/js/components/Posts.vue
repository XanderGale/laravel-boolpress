<template>
    <section>

        <div class="container">

            <h1 class="pt-3 pb-3">Lista Post:</h1>

            <div class="row-cols-1">
                    
                <div v-for="post in posts" :key="post.id">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <!-- <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text">{{ cutText(post.content, 500) }}</p>
                    </div> -->
                    <!-- <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                    </ul> -->
                    <!-- <div class="card-body">
                        <a href="#" class="btn btn-primary">Details</a>
                        <a href="#" class="card-link">Another link</a>
                    </div> -->

                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <!-- <img src="..." class="img-fluid rounded-start" alt="..."> -->
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ post.title }}</h5>
                                    <p class="card-text">{{ cutText(post.content, 500) }}</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
            </div>

        </div>

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
        },
        cutText: function(content, max_chars_number) {
            if (content.length > max_chars_number ) {
                return content.substr(0, max_chars_number) + '...';
            }

            return content;
        }
    },
    created: function(){
        this.getPosts();
    }
}
</script>