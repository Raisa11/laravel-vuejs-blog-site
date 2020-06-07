<template>
    <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
                <form @keyup="searchBlog()">
                <div class="input-group">

                    <input type="text" class="form-control" placeholder="Search for" v-model="search">
                    <span class="input-group-btn">
                <button class="btn btn-secondary" type="submit" @click.prevent="searchBlog()">Go!</button>
              </span>

                </div>
                </form>
            </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-unstyled mb-0">
                            <li v-for="(category,index) in categories" v-if="index <= 4">
                                <router-link :to="`/categories/${category.id}`">{{category.cat_name}}</router-link>
                            </li>

                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-unstyled mb-0">
                            <li v-for="(category,index) in categories" v-if="index > 4">
                                <router-link :to="`/categories/${category.id}`" >{{category.cat_name}}</router-link>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
            <h5 class="card-header">Recent Blogs</h5>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li v-for="(blog,index) in blogs" v-if="index == (index-1), index">
                        <img :src="`${blog.image}`" width="100">
                        <router-link :to="`/blog/${blog.id}/${blog.title}`">{{blog.title}}</router-link>
                    </li>

                </ul>

            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "CategoryComponent",
        data(){
            return{
                search:''
            }
        },
        mounted() {
            this.$store.dispatch('allCategories')
            this.$store.dispatch('getAllBlogs')
        },
        computed: {
            categories() {
                return this.$store.getters.getCategories
            },
            blogs() {
                return this.$store.getters.getallblogs
            }
        },
        methods:{
            searchBlog(){
                this.$store.dispatch('searchBlogs',this.search)
            }
        }
    }

</script>

<style scoped>

</style>
