<template>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

                <!-- Title -->
                <h1 class="mt-4">{{blog.title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by
                    <a href="#">{{blog.author}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p>Posted on {{blog.created_at}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-fluid rounded" :src="`${blog.image}`" alt="">

                <hr>

                <!-- Post Content -->
                <div v-html="blog.long_desc"></div>






                <hr>

                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form @submit.prevent="addComment()">
                            <div class="form-group">
                                <input type="text" name="name" placeholder="name" class="form-control" v-model="form.name" >
                                <input type="hidden" name="blog_id" class="form-control" v-model="form.blog_id" >
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="comment" placeholder="comment" v-model="form.comment" ></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

                <!-- Single Comment -->
                <div v-for="comment in blog.comment" class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">{{comment.name}}</h5>
                        <p>{{comment.comment}}</p>
                        <button @click="toggle = !toggle"> Reply</button>
                        <form v-show="toggle" >
                           <div class="form-group">
                                <input type="text" name="name" placeholder="name" class="form-control" v-model="form.name" >
                                <input type="hidden" name="blog_id" class="form-control" v-model="form.blog_id" >
                               <input type="hidden" name="comment_id" class="form-control" v-model="form.comment_id" >
                            </div>
                           <div class="form-group">
                               <textarea class="form-control" rows="3" name="comment" placeholder="comment" v-model="form.comment" ></textarea>
                           </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    </div>
                </div>



            </div>

            <!-- Sidebar Widgets Column -->

            <BlogSideBar></BlogSideBar>







        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</template>

<script>
    import BlogSideBar from '../includes/CategoryComponent'
    export default {
        name: "PostComponent",
        data() {
            return{
                form: new Form({
                    name:'',
                    blog_id: this.$route.params.id,
                    comment:'',
                   // comment_id: blog.comment.id
                }),
                toggle: false
            }
        },
        components:{
            BlogSideBar
        },

        computed:{
            blog() {
                return this.$store.getters.getSingleBlog
            }
        },
        methods:{
            singleBlog(){
                this.$store.dispatch('singlePost',this.$route.params.id)
            },
            addComment(){
                this.form.post('/add-comment')
                .then((res)=>{
                    console.log(res.data);
                    this.singleBlog();
                    Toast.fire({
                        icon: 'success',
                        title: 'Comment added successfully'
                    })
                })


            },
            addReply:function(){




            }
            // addReply(){
            //     this.form.post('/add-reply')
            //     .then((res)=>{
            //         console.log(res.data)
            //     })
            // }
        },
        mounted(){
            this.singleBlog();
        },
        watch:{
            $route(to,from){
                this.singleBlog();
            }
        }
    }
</script>

<style scoped>

</style>
