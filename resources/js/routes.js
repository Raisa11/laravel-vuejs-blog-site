import HomeComponent from './components/blog/home/PublicHome'
import BlogComponent from "./components/blog/home/BlogComponent";
import PostComponent from "./components/blog/home/PostComponent";
import BlogCatComponent from "./components/blog/home/BlogCatComponent";


export const routes = [
    { path: '/',
        component: HomeComponent },
    { path: '/blog',
        component: BlogComponent },
    { path: '/blog/:id/:title',
        component: PostComponent },
    { path: '/categories/:id',
        component: BlogCatComponent },


 ]
