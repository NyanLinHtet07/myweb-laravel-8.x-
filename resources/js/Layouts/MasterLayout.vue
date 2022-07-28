<template>
    <div class=" flex w-screen h-screen relative  bg-gradient-to-t from-sky-400 to-sky-100">

<!--        
        <div class=" absolute bottom-0 left-8 mix-blend-multiply animate-blob animation-delay-2000 filter blur-xl rounded-full bg-slate-300 w-96 h-96"></div>
        <div class=" absolute top-20 right-28 mix-blend-multiply animate-blob animation-delay-4000 filter blur-xl rounded-full bg-rose-300 w-96 h-96"></div>
          <div class=" absolute top-0 right-8 mix-blend-multiply animate-blob animation-delay-2000 filter blur-xl rounded-full bg-slate-300 w-96 h-96"></div>     -->

       
          <nav class=" w-44 mt-10 hidden md:block">
            <header class=" text-center">
                <h2 class=" font-title font-extrabold title text-rose-800 subpixel-antialiased drop-shadow-xl">N</h2>
            </header>
            <div class=" ml-4 z-20">
                    <Link :href="route('home')" class=" bg-white/10 rounded-xl font-black text-gray-700 hover:text-rose-600 active:text-rose-700 flex px-4 hover:px-3 transition delay-75 w-32 my-5 py-3 justify-between border-spacing-1 border-gray-200/30 border-b-2">
                        <HomeIcon/>  <p class="">Home</p>
                    </Link>

                    

                     <Link :href="route('project')" class=" bg-white/10 rounded-xl font-black text-gray-700 hover:text-rose-600 active:text-rose-700 flex px-4 hover:px-3 transition delay-75 w-32 my-5 py-3 justify-between border-spacing-1 border-gray-200/30 border-b-2">
                        <ProjectIcon />  <button class="">Projects</button>
                    </Link>

                     <Link :href="route('blogM')" class=" bg-white/10 rounded-xl font-black text-gray-700 hover:text-rose-600 active:text-rose-700 flex px-4 hover:px-3 transition delay-75 w-32 my-5 py-3 justify-between border-spacing-1 border-gray-200/30 border-b-2">
                        <BookIcon />  <button class="">Blogs</button>
                    </Link>

                     <!-- <Link :href="route('about')" class=" bg-white/10 rounded-xl font-black text-gray-700 hover:text-rose-600 active:text-rose-700 flex px-4 hover:px-3 transition delay-75 w-32 my-5 py-3 justify-between border-spacing-1 border-gray-200/30 border-b-2">
                        <AboutIcon />  <button class="">About</button>
                    </Link> -->
                    <!-- <Link :href="route('service')" class=" bg-white/10 rounded-xl font-black text-gray-700 hover:text-rose-600 active:text-rose-700 flex px-4 hover:px-3 transition delay-75 w-32 my-5 py-3 justify-between border-spacing-1 border-gray-200/30 border-b-2">
                            <ServiceIcon />  <button class="">Services</button>
                        </Link> -->

                     <Link :href="route('contact')" class=" bg-white/10 rounded-xl font-black text-gray-700 hover:text-rose-600 active:text-rose-700 flex px-4 hover:px-3 transition delay-75 w-32 my-5 py-3 justify-between border-spacing-1 border-gray-200/30 border-b-2">
                        <CommentIcon />  <button class="">Contact</button>
                    </Link>
            </div> 
            </nav>
            <div class=" md:hidden block w-6">
                <button @click=" showSidebar = !showSidebar" v-if="! showSidebar" class="bg-white/10 drop-shadow-md ml-2 z-40 mt-6 mb-4 px-2 py-1 rounded-lg text-gray-700 hover:text-rose-600 delay-200"> <MenuIcon /> </button>
                 
                 
                 <div class=" block md:hidden h-screen w-48 max-h-full bg-white bg-opacity-90 backdrop-blur-lg border-b border-gray-100 px-3 py-2 rounded-r-3xl  space-y-6
                                             absolute inset-0 left-0 transform -translate-x-full transition duration-400 ease-in-out z-40"
                                    :class="{' relative -translate-x-0 transition duration-500': showSidebar}">
                    <div class=" text-right">
                        <button class=" mr-2 mt-3 text-red-900" @click="showSidebar = !showSidebar"> <CancelIcon/> </button>
                    </div>
                     <header class=" text-center">
                        <h2 class=" font-title font-extrabold text-2xl text-rose-700 subpixel-antialiased drop-shadow-xl">N</h2>
                    </header>
                     <div class=" mt-24 ml-4 z-20">
                        <Link :href="route('home')" class=" bg-white/20 rounded-xl font-black text-gray-700 hover:text-rose-600 active:text-rose-700 flex px-4 hover:px-3 transition delay-75 w-32 my-5 py-3 justify-between border-spacing-1 border-gray-200/30 border-b-2">
                            <HomeIcon/>  <p class="">Home</p>
                        </Link>

                        <Link :href="route('blogM')" class=" bg-white/20 rounded-xl font-black text-gray-700 hover:text-rose-600 active:text-rose-700 flex px-4 hover:px-3 transition delay-75 w-32 my-5 py-3 justify-between border-spacing-1 border-gray-200/30 border-b-2">
                            <BookIcon />  <p class="">Blogs</p>
                        </Link>

                        <Link :href="route('project')" class=" bg-white/20 rounded-xl font-black text-gray-700 hover:text-rose-600 active:text-rose-700 flex px-4 hover:px-3 transition delay-75 w-32 my-5 py-3 justify-between border-spacing-1 border-gray-200/30 border-b-2">
                            <ProjectIcon />  <button class="">Projects</button>
                        </Link>

                        <!-- <Link :href="route('service')" class=" bg-white/20 rounded-xl font-black text-gray-700 hover:text-rose-600 active:text-rose-700 flex px-4 hover:px-3 transition delay-75 w-32 my-5 py-3 justify-between border-spacing-1 border-gray-200/30 border-b-2">
                            <ServiceIcon />  <button class="">Services</button>
                        </Link> -->

                        <!-- <div class=" bg-white/20 rounded-xl font-black text-gray-700 hover:text-rose-600 active:text-rose-700 flex px-4 hover:px-3 transition delay-75 w-32 my-5 py-3 justify-between border-spacing-1 border-gray-200/30 border-b-2">
                            <AboutIcon />  <button class="">About</button>
                        </div> -->

                        <Link :href="route('contact')" class=" bg-white/20 rounded-xl font-black text-gray-700 hover:text-rose-600 active:text-rose-700 flex px-4 hover:px-3 transition delay-75 w-32 my-5 py-3 justify-between border-spacing-1 border-gray-200/30 border-b-2">
                            <CommentIcon />  <button class="">Contact</button>
                        </Link>
                    </div> 
                </div>
            </div>
            
            
            
            <div class=" flex-1 overflow-y-auto h-screen">
                <main class=" bg-white/50 mt-20 mb-6 main-border z-20 border-none mr-3 h-auto shadow-lg">
                    <slot/>
                </main>
            </div>
    </div>
    
  
</template>
<script>

import MenuIcon from 'vue-material-design-icons/Menu.vue'
import HomeIcon from 'vue-material-design-icons/HomeOutline.vue'
import BookIcon from 'vue-material-design-icons//BookOpenOutline.vue'
import ProjectIcon from 'vue-material-design-icons/CodeNotEqualVariant.vue'
import AboutIcon from 'vue-material-design-icons/AccountOutline.vue'
import CommentIcon from 'vue-material-design-icons/CommentTextMultipleOutline.vue'
import ServiceIcon from 'vue-material-design-icons/Webhook.vue'
import CancelIcon from 'vue-material-design-icons/WindowClose.vue'
import { Link } from '@inertiajs/inertia-vue3';
import {ref} from 'vue'
export default {
    components:{
        MenuIcon,
        HomeIcon , BookIcon , ProjectIcon, AboutIcon, CommentIcon , CancelIcon, ServiceIcon, Link
    },

    setup() {
      const showSidebar = ref(false);
      
      return {showSidebar,}
    }
}
</script>

<style>
.title{
    font-size: 90px;
    
}
    .main-border{
        border-top-left-radius: 180px;
        border-top-right-radius: 20px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    @media only screen and (max-width: 600px) {
        .main-border{
        border-top-left-radius: 120px;
        border-top-right-radius: 20px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }
    }
</style>