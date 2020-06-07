<template>
<div>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4"> Blogs

                </h1>

                <!-- Blog Post -->
                <div v-for="blog in blogs" class="card mb-4">
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





                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        <a class="page-link" href="#">&larr; Older</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Sidebar Widgets Column -->

<BlogSideBar></BlogSideBar>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
</template>

<script>
    import BlogSideBar from '../includes/CategoryComponent'
    export default {
        name: "BlogComponent",

        components:{
            BlogSideBar
        },
        mounted() {
            this.$store.dispatch('getAllBlogs')
        },
        computed:{
            blogs(){
                return this.$store.getters.getallblogs
            }
        }
    }
</script>

<style scoped>

</style>
