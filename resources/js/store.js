export default{
    state:{
     allblogs:[],
        singleblog:[],
        categories:[],
        catblogs:[]
    },
    getters:{
    getallblogs(state){
     return state.allblogs
    },
        getSingleBlog(state){
        return state.singleblog
        },
        getCategories(state){
        return state.categories
        },
        getCatBlogs(state){
        return state.catblogs
        }
    },
    actions:{
      getAllBlogs(context){
      axios.get('/all-blogs')
          .then((res)=>{
             // console.log(res.data.post)
              context.commit('allBlogs',res.data.post)
              })
      },
      singlePost(context,payload){
          axios.get('/single-blog/'+payload)
              .then((response)=>{
              //console.log(response.data.posts)
                  context.commit('singleBlog',response.data.posts)
          })

      },
        allCategories(context){
          axios.get('/all-categories')
              .then((res)=>{
                  //console.log(res.data.categories)
                 context.commit('allcategories',res.data.categories)
              })
        },
        getBlogByCat(context,payload){
          axios.get('/category-blogs/'+payload)
              .then((res)=>{
                  //console.log(res.data.catBlogs)
                  context.commit('allcategoryblogs',res.data.catBlogs)
              })

        },
        searchBlogs(context,payload){
          axios.get('/search?keyword='+payload)
              .then((res)=>{
                 //console.log(res.data.post)
                  context.commit('searchpost',res.data.post)
              })

        }


    },
    mutations:{
     allBlogs(state,payload){
         return state.allblogs = payload

     },
        singleBlog(state,payload){
         return state.singleblog = payload
        },
        allcategories(state,payload){
         return state.categories = payload
        },
        allcategoryblogs(state,payload){
         return state.catblogs = payload
        },
        searchpost(state,payload){
            return state.allblogs = payload
        }

    }
}
