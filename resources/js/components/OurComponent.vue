<template>
    <div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div v-for="(blog,index) in blogs" class="carousel-item " :class="{active:index==0}" >
                    <img :src="`${blog.image}`" class="d-block " width="1140" height="450" >
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4">



                    <!-- Blog Post -->
                    <div v-for="(blog,index) in blogs" v-if="index == 0" class="card mb-4 my-4">
                        <img class="card-img-top" :src="`${blog.image}`" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{blog.title}}</h2>
                            <p class="card-text">{{blog.short_desc}}</p>
                            <router-link :to="`blog/${blog.id}/${blog.title}`" class="btn btn-primary">Read More &rarr;</router-link>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{blog.created_at}} by
                            <a href="#">{{blog.author}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">


                    <!-- Blog Post -->
                    <div v-for="(blog,index) in blogs" v-if="index == 1" class="card mb-4 my-4">
                        <img class="card-img-top" :src="`${blog.image}`" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{blog.title}}</h2>
                            <p class="card-text">{{blog.short_desc}}</p>
                            <router-link :to="`blog/${blog.id}/${blog.title}`" class="btn btn-primary">Read More &rarr;</router-link>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{blog.created_at}} by
                            <a href="#">{{blog.author}}</a>
                        </div>
                    </div>

                </div>

                    <BlogSideBar></BlogSideBar>

            </div>
        </div>
    </div>
</template>

<script>
    import BlogSideBar from './blog/includes/CategoryComponent.vue'
    export default {
        name: "OurComponent",
        components:{
            BlogSideBar
        },

        mounted() {
            this.$store.dispatch('getAllBlogs')
        },
        computed: {
            blogs() {
                return this.$store.getters.getallblogs
            }
        }
    }
</script>

<style scoped>

</style>
