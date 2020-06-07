<template>
    <div>
        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <!-- Blog Entries Column -->
                <div class="col-md-8">

                    <h1 class="my-4" v-for="cat in blogs">
                        {{cat.admincategory.cat_name}}

                    </h1>

                    <!-- Blog Post -->
                    <div v-for="blog in blogs" class="card mb-4">
                        <img class="card-img-top" :src="`${blog.adminblog.image}`" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{blog.adminblog.title}}</h2>
                            <p class="card-text">{{blog.adminblog.short_desc}}</p>
                            <router-link :to="`/blog/${blog.adminblog.id}/${blog.adminblog.title}`" class="btn btn-primary">Read More &rarr;</router-link>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{blog.adminblog.created_at}} by
                            <a href="#">{{blog.adminblog.author}}</a>
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
        name: "BlogCatComponent",
        components:{
            BlogSideBar
        },
        computed:{
            blogs(){
                return this.$store.getters.getCatBlogs
            }
        },
        mounted() {
              this.getAllCategoryBlogs();
        },
        methods:{
            getAllCategoryBlogs(){
                this.$store.dispatch('getBlogByCat',this.$route.params.id)
            }
        },
        watch:{
            $route(to,from){
                this.getAllCategoryBlogs();
            }
        }
    }
</script>

<style scoped>

</style>
