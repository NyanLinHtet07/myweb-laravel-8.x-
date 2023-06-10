<template>
    <MasterLayout>
    <div class="">
       
        <div class=" grid  grid-cols-1 text-center mt-7">
            <div class="">
                <img src="/assets/me.png" alt="" srcset="" class=" drop-shadow-2xl w-64 animate-b duration-700 mx-auto block z-50">
            </div>
            
            <div class=" px-3 py-2 rounded-3xl w-fit mx-auto block">
                <h1 class=" text-2xl font-bold text-gray-900/90 mb-5 ">
                    I'm a Fullstack developer, <br> Who can use Laravel, React, Vue, React Native and Ionic. 
                </h1>

                <a :href="route('about')"  class="px-3 py-2 my-5 font-title font-bold  rounded-full bg-white/60 backdrop-blur-md  text-gray-900/90 shadow-lg hover:shadow-xl hover:bg-white/70 hover:text-rose-600 transition duration-300">Resume </a>
                
            </div>

            <div class=" flex justify-center mt-8">
             <a href="tel:+959250015864"  class=" p-3 mx-2 bg-white/50 backdrop-blur-sm drop-shadow-lg text-teal-600/90 rounded-full  hover:shadow-md hover:shadow-teal-300 transition duration-150"> <PhoneIcon/> </a>
             <a href="https://github.com/NyanLinHtet07" class=" p-3 mx-2 bg-white/50 backdrop-blur-sm drop-shadow-lg text-gray-600/90 rounded-full hover:shadow-md hover:shadow-gray-500 transition duration-150">
              <GitIcon/>
            </a>
             <a href="mailto:nyanlinhtet206@gmail.com"  class=" p-3 mx-2 bg-white/50 backdrop-blur-sm drop-shadow-lg text-rose-600/90 rounded-full  hover:shadow-md hover:shadow-red-300 transition duration-150"><MailIcon/> </a>  
              <a href="https://www.facebook.com/nyanlinhtet20/"  class=" p-3 mx-2 bg-white/50 backdrop-blur-sm drop-shadow-lg text-blue-600 rounded-full  hover:shadow-md hover:shadow-blue-500 transition duration-150"> <FacebookIcon/></a>
             <a href="https://www.linkedin.com/in/n-l-htet/" class=" p-3 mx-2 bg-white/50 backdrop-blur-sm drop-shadow-lg text-sky-600 rounded-full  hover:shadow-md hover:shadow-sky-500 transition duration-150"> <LinkedInIcon/> </a>
            </div>
            
        </div>

        <!-- <div class=" w-full h-screen mt-24 grid items-center text-center">
             <h1 class=" text-2xl font-bold text-gray-900/70 ">
                   Ah, If you Want to kown more about me, download My Resume
                </h1>

                <h3 class=" text-4xl font-sans font-bold text-gray-800">OR</h3>
            <img src="/assets/testqr.png" alt="" srcset="" class=" w-64 mx-auto drop-shadow-lg px-2 py-2 z-30 rounded-lg shadow-lg bg-white/30">
        </div> -->

        <div class=" w-full grid mt-20">
            <h3  class=" text-4xl font-bold text-gray-900/90 ml-3 mt-6 mb-3 text-center isolate "> Project</h3>

            <div class=" grid grid-cols-1 gap-2 md:grid-cols-l lg:grid-cols-2">
                <swiper
                    :effect="'cards'"
                    :grabCursor="true"
                    :modules="modules"
                    class="mySwiper mt-14"
                >
                     <!-- <img :src="`/upload/project/`+JSON.parse(project.image)[2]" alt="" srcset="" class=" mx-2 mt-20 block  px-3 py-4  w-auto  rounded-lg bg-white"/> -->
                     <swiper-slide v-for="(i,index) in JSON.parse(project.image)" :key="index"> 
                        <img  :src="'/upload/project/'+i" alt="" srcset="" class=" w-fit"/> 
                    </swiper-slide>
                 </swiper>
               

                <div class=" md:px-7 md:py-3 mx-6 md:my-3 h-fit  bg-white/10 hover:bg-rose-100/30 px-2 transition delay-200 rounded-lg backdrop-blur-lg backdrop-filter">
                    <div class="py-2 pl-3 text-thin text-center flex justify-end mt-3">
          
                    <div v-for="(t_id, index) in JSON.parse(project.tag_id)" :key="index">
                        <div v-for=" tag in tags" :key="tag.id">
                            <div v-if=" tag.id == t_id">
                                 <img :src="'/upload/tag/'+tag.icon" alt="" srcset="" class="  px-3 py-2 mt-5 w-12"/>
                            </div>
                        </div>
                    </div>
                    </div>
                   
                    <h2 class=" my-4 font-bold text-2xl"> {{project.title}} </h2>
                    <ul class=" mt-6 list-item px-6">
                        <li class=" my-2 text-sm font-medium list-disc" v-for="(l , index) in JSON.parse(project.list)" :key="index"> {{ l.name }} </li>
                    </ul>
                    <p class=" mt-6 w-3/4 mx-auto text-justify  whitespace-normal md:block hidden mb-5">
                       {{ project.description.substring(0,300) +" ..."}} 
                    </p>

                    
                    <div v-if="project.url == 'null'">
                        
                    </div>
                    <div v-else class=" flex">
                       <p class=" font-semibold mx-3"> Url -</p> <a :href="project.url" class=" text-gray-800 underline hover:text-rose-600">{{project.url}}</a>
                    </div>
                </div>
            </div>
            <div class=" text-right mr-5 mt-4">
                    <Link :href="route('project')"  class="px-3 py-2 my-5 font-title font-bold  rounded-full bg-white/60 backdrop-blur-md  text-gray-900/90 shadow-lg hover:shadow-xl hover:bg-white/70 hover:text-rose-600 transition duration-300">
                         More Projects
                    </Link>
            </div>
        </div>
        <div class=" w-full  grid mt-10">
             <h3  class=" text-4xl font-bold text-gray-900/90 ml-3  text-center isolate mt-10 ">Blog</h3>
             <div class=" mx-3 px-3 py-4 my-8 rounded-xl bg-white/10  md:bg-white/60 z-10 h-fit">
                <h1 class=" text-xl my-7 ml-4 font-semibold">  {{blog.title}} </h1>
                <div class=" flex justify-start">
                       <div v-for="(t_id,index) in JSON.parse(blog.tag_id)" :key="index">
                   <div v-for="tag in tags" :key="tag.id">
                        <div v-if=" t_id == tag.id">
                            <small class=" px-3 py-2 rounded-full bg-white/70 shadow-md mx-2">{{tag.name}}</small>
                        </div>
                   </div>
                </div>
                </div>
             
               
                <p v-if="! read" class=" mt-6 mx-1 mb-4 text-justify  whitespace-normal">
                      {{blog.text.substring(0,400)+'...'}} <small @click="readMore()" class=" text-sm font-bold text-gray-900 mx-3 cursor-pointer px-2 py-1 rounded-full bg-slate-200"> read more</small>
                </p>

                 <p v-else class=" mt-6 mx-1 mb-4 text-justify  whitespace-normal">
                      {{blog.text}} <small @click="readLess()" class=" text-sm font-bold text-gray-900 mx-3 cursor-pointer  px-2 py-1 rounded-full bg-slate-200"> close</small>
                </p>
                 
             </div>
                <div class=" text-right mr-5">
                    <Link :href="route('blogM')"  class="px-3 py-2 my-5 font-title font-bold  rounded-full bg-white/60 backdrop-blur-md  text-gray-900/90 shadow-lg hover:shadow-xl hover:bg-white/70 hover:text-rose-600 transition duration-300">
                         More Story
                    </Link>
            </div>
        </div>

        <div class="  w-full grid mt-20">
             <h2 class=" text-4xl font-bold text-gray-900/90 ml-3  text-center isolate mt-10 "> What Can I Serve for You </h2>
            <div class=" grid grid-cols-1 md:grid-cols-3 gap-4 mx-6 mb-20 mt-10">
                <div class=" px-3 py-2 rounded-lg bg-white/40 hover:shadow-xl fill-teal-700 text-gray-800 hover:text-rose-900 hover:fill-red-600 transition duration-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class=" w-44 md:w-36 lg:w-44 mx-auto my-3 block drop-shadow-lg" viewBox="0 0 122.88 91.26"  xml:space="preserve">
                        <path d="M14.85 45.46h6.65l2.39 12.65 3.5-12.65h6.6l3.53 12.67 2.41-12.67h6.62l-5 22.68h-6.87L30.7 53.86l-3.95 14.28h-6.86l-5.04-22.68zM8.32 0h106.24c4.58 0 8.32 3.74 8.32 8.32v74.62c0 4.57-3.74 8.32-8.32 8.32H8.32C3.74 91.26 0 87.51 0 82.94V8.32C0 3.74 3.74 0 8.32 0zm109.65 23.29H5.29v60.46c0 .64.25 1.2.67 1.63.42.42.99.67 1.63.67h108.04c.64 0 1.2-.25 1.63-.67.43-.43.67-.99.67-1.63V23.29h.04zM106.64 9.35a4.11 4.11 0 1 1 0 8.22 4.11 4.11 0 0 1 0-8.22zm-27.84 0a4.11 4.11 0 1 1 0 8.22 4.11 4.11 0 0 1 0-8.22zm13.92 0a4.11 4.11 0 1 1 0 8.22 4.11 4.11 0 0 1 0-8.22zM78.3 45.46h6.65l2.39 12.65 3.5-12.65h6.6l3.53 12.67 2.41-12.67H110l-5 22.68h-6.87l-3.98-14.28-3.95 14.28h-6.86L78.3 45.46zm-31.72 0h6.65l2.39 12.65 3.5-12.65h6.6l3.53 12.67 2.41-12.67h6.62l-5 22.68h-6.87l-3.98-14.28-3.95 14.28h-6.86l-5.04-22.68z" style="fill-rule:evenodd;clip-rule:evenodd"/>
                    </svg>           
                    <h3 class=" text-lg font-bold text-center"> Custom Web Services </h3>
               </div>

               <div class="px-3 py-2 rounded-lg bg-white/40 hover:shadow-xl fill-neutral-700  text-gray-800 hover:text-rose-900 hover:fill-red-600 transition duration-500">
                    <svg class=" w-48 lg:w-48 md:w-36 mx-auto my-5 block drop-shadow-lg" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 70.51">
                        <path d="M2.54 65.44h12.59a2.19 2.19 0 0 1-1.63-2.1V2.17A2.18 2.18 0 0 1 15.67 0h91a2.18 2.18 0 0 1 2.17 2.17v61.16a2.17 2.17 0 0 1-1.63 2.1h13.16a2.54 2.54 0 0 1 2.51 2.57 2.54 2.54 0 0 1-2.54 2.54H2.54A2.54 2.54 0 0 1 0 68a2.54 2.54 0 0 1 2.54-2.53Zm84.7-50.2h9.89a.77.77 0 0 1 .77.77v2.26a.76.76 0 0 1-.77.77h-9.89a.77.77 0 0 1-.77-.77V16a.78.78 0 0 1 .77-.77Zm-16.7 0H80a.77.77 0 0 1 .77.77v2.26A.76.76 0 0 1 80 19h-9.46a.77.77 0 0 1-.77-.77V16a.78.78 0 0 1 .77-.77Zm-19 0h10.82a.78.78 0 0 1 .77.77v2.26a.77.77 0 0 1-.77.77H51.51a.76.76 0 0 1-.77-.77V16a.77.77 0 0 1 .77-.77ZM83 56.58a1.72 1.72 0 0 1 0-3.44h8.71a1.72 1.72 0 0 1 0 3.44Zm-25.87 0a1.72 1.72 0 0 1 0-3.44h8.7a1.72 1.72 0 0 1 0 3.44Zm-25.88 0a1.72 1.72 0 0 1 0-3.44h8.71a1.72 1.72 0 0 1 0 3.44ZM76.74 27H97.9v21.24H76.74V27Zm10.54 14.63a.88.88 0 1 1-1.75 0 .87.87 0 0 1 1.75 0ZM81.91 33a.36.36 0 0 1 .36-.35h.53a1.66 1.66 0 0 1 .87.23 1.32 1.32 0 0 1 .59.83l.09.36h8a.36.36 0 0 1 .36.36.43.43 0 0 1 0 .11l-.93 3.76a.36.36 0 0 1-.35.27h-5.87c.13.48.26.74.43.85a2.35 2.35 0 0 0 1.19.14h4.15a.36.36 0 0 1 0 .72h-4.14a2.84 2.84 0 0 1-1.6-.26 2.34 2.34 0 0 1-.78-1.49L83.58 34a.64.64 0 0 0-.27-.41 1 1 0 0 0-.51-.12h-.26c-.26 0-.62 0-.62-.37Zm9.23 8.6a.88.88 0 0 1-1.76 0 .88.88 0 0 1 1.76 0ZM50.86 27H72v21.24H50.86V27Zm10.55 14.63a.88.88 0 0 1-1.76 0 .87.87 0 0 1 1.76 0ZM56 33a.35.35 0 0 1 .35-.35h.54a1.6 1.6 0 0 1 .86.23 1.32 1.32 0 0 1 .59.83l.09.36h8a.36.36 0 0 1 .35.36.43.43 0 0 1 0 .11l-.93 3.76a.35.35 0 0 1-.35.27h-5.81c.13.48.25.74.43.85a2.33 2.33 0 0 0 1.19.14h4.14a.36.36 0 1 1 0 .72h-4.13a2.82 2.82 0 0 1-1.6-.26 2.3 2.3 0 0 1-.79-1.49L57.7 34a.6.6 0 0 0-.27-.41 1 1 0 0 0-.5-.12h-.26c-.26 0-.62 0-.62-.37Zm9.22 8.6a.88.88 0 1 1-1.76 0 .87.87 0 0 1 1.76 0ZM25 27h21.14v21.24H25V27Zm10.53 14.63a.88.88 0 0 1-1.76 0 .87.87 0 0 1 1.76 0ZM30.16 33a.36.36 0 0 1 .36-.35h.53a1.57 1.57 0 0 1 .87.23 1.34 1.34 0 0 1 .58.83l.09.36h8a.36.36 0 0 1 .36.36.43.43 0 0 1 0 .11L40 38.36a.34.34 0 0 1-.34.27h-5.85a1.48 1.48 0 0 0 .43.85 2.35 2.35 0 0 0 1.19.14h4.14a.36.36 0 0 1 0 .72h-4.13a2.82 2.82 0 0 1-1.6-.26 2.3 2.3 0 0 1-.79-1.49L31.83 34a.65.65 0 0 0-.28-.41 1 1 0 0 0-.5-.12h-.25c-.26 0-.63 0-.63-.37Zm9.22 8.6a.88.88 0 1 1-1.75 0 .87.87 0 0 1 1.75 0ZM27.79 5.21a1.73 1.73 0 1 1-1.72 1.73 1.73 1.73 0 0 1 1.72-1.73Zm5.84 0a1.73 1.73 0 1 1-1.72 1.73 1.73 1.73 0 0 1 1.72-1.73ZM22 5.21a1.73 1.73 0 1 1-1.72 1.73A1.73 1.73 0 0 1 22 5.21Zm-4.74 6h88.14v51.51H17.21V11.16Zm40.61 55.18H65a1.22 1.22 0 0 1 1.22 1.22A1.22 1.22 0 0 1 65 68.83h-7.13a1.22 1.22 0 0 1-1.22-1.22 1.22 1.22 0 0 1 1.22-1.22Z" style="fill-rule:evenodd"/>
                    </svg>
                    <h3 class=" text-lg font-bold text-center"> Ecormmerce Plan </h3>
               </div>
               
                <div class="px-3 py-2 rounded-lg bg-white/40 hover:shadow-xl  fill-fuchsia-800 text-gray-800 hover:text-rose-900 hover:fill-red-600 transition duration-500">
                    <svg class=" w-28 mx-auto my-4 block drop-shadow-lg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 119.8 122.9"  xml:space="preserve">
                        <path d="M20.6 0h79.7c1.9 0 3.4 1.5 3.4 3.4s-1.5 3.4-3.4 3.4H20.6c-1.9 0-3.4-1.5-3.4-3.4S18.7 0 20.6 0zm98 43.2v4.1c0 .4.1.8.1 1.2 0 6.9-6.4 12.5-14.4 12.5-7.9 0-14.4-5.6-14.4-12.5v-.9h-.6v.9c0 6.9-6.4 12.5-14.4 12.5-7.9 0-14.4-5.6-14.4-12.5v-.9h-.6v.9c0 6.9-6.4 12.5-14.4 12.5-7.9 0-14.4-5.6-14.4-12.5v-.9h-.4v.9c0 6.9-6.4 12.5-14.4 12.5-7.9 0-14.4-5.6-14.4-12.5 0-.3 0-.7.1-1v-4.3h116.6zM16.8 10.4h87.6l11.2 23.8H5.3l11.5-23.8zM3.4 108h12.1V69.7h1.1c5.5 0 10.5-1.8 14.5-4.6l.1.1h.1v.1l.2.1.2.1.2.1V101h3.7c2.9 6.6 12.2 11.5 23.3 11.5s20.4-4.9 23.3-11.5h3.1V66.9c.9-.4 1.7-1 2.5-1.5l.2-.1h.1l.1-.1.2-.1c4 2.9 9.1 4.7 14.6 4.7V108h12.1c1.9 0 3.4 3.3 3.4 7.4 0 4.1-1.5 7.4-3.4 7.4H3.4c-1.9 0-3.4-3.3-3.4-7.4 0-4 1.5-7.4 3.4-7.4z" style="fill-rule:evenodd;clip-rule:evenodd;"/>
                        <path d="M74.5 88.6c.5.8.7 1.6.7 2.4 0 10.5-30.6 10.5-30.6 0 0-.8.2-1.6.7-2.4 4.5 7.5 24.8 7.5 29.2 0zM65.4 72l-.2 2-7.5-.7c.6.8 1 1.7 1.3 2.7l-1.8-.2c-.1-.5-.4-1.1-.8-1.8s-.9-1.1-1.6-1.4l.1-1.6 10.5 1zm-5.5-3.1c6.9 0 12.6 2.2 12.6 4.9s-5.6 4.9-12.6 4.9-12.6-2.2-12.6-4.9 5.7-4.9 12.6-4.9zm0-1.6c8.4 0 15.3 3.6 15.3 8 0 10.5-30.6 10.5-30.6 0 0-4.4 6.9-8 15.3-8zm14.7 13.3c.4.7.6 1.5.6 2.3 0 10.5-30.6 10.5-30.6 0 0-.8.2-1.6.6-2.3 4.4 7.6 25 7.6 29.4 0zm-.1 16.1c.5.8.7 1.6.7 2.4 0 10.5-30.6 10.5-30.6 0 0-.8.3-1.7.7-2.4 4.5 7.4 24.7 7.4 29.2 0z" style="fill-rule:evenodd;clip-rule:evenodd;"/>
                    </svg>
                    <h3 class=" text-lg font-bold text-center"> POS Plan </h3>
               </div>

            </div>
            <div class=" my-6">
            
           
               <div class=" grid grid-cols-1 md:grid-cols-2 gap-2">
                <img src="/assets/metting.png" class=" drop-shadow-lg mx-auto block" alt="" srcset="" />
                <div class=" text-left">
                     <h4 class="text-slate-900/90 font-semibold font-title text-2xl mt-2 mb-10 text-center"> If You  Want to Discuss with Me, Come On Guy</h4>
                     
                     <div class=" flex justify-between w-4/5 mb-10 mx-2">
                       <div class=" flex">
                            <PhoneIcon class=" text-teal-600/90 drop-shadow-md mx-2"/> 
                            <span class=" font-semibold font-title text-xs md:text-sm"> Call Me </span>
                       </div>
                        <a href="tel:+959250015864" class=" ml-8 font-semibold text-xs md:text-sm">09250015864</a>
                     </div>

                     <div class=" flex justify-between w-4/5 mb-10 mx-2">
                       <div class=" flex">
                            <MailIcon class=" text-rose-600/70 drop-shadow-md mx-2"/> 
                            <span class="font-title font-semibold text-xs md:text-sm"> Mail Me </span>
                       </div>
                        <a href="mailto:nyanlinhtet206@gmail.com" class=" ml-8 font-semibold text-xs md:text-sm">nyanlinhtet206@gmail.com</a>
                     </div>
                     
                     <!-- <div class=" text-center mx-4  font-title font-bold">
                        <h2 class="text-gray-900/90 text-2xl"> OR </h2>
                     </div> -->

                    <div class=" flex justify-center mb-10 mx-2 mt-5">
                       
                           
                            <Link :href="route('contact')" class=" w-full text-center text-xs md:text-sm px-3 py-2 font-title font-bold  rounded-full bg-white/60 backdrop-blur-md  text-gray-900/90 shadow-lg hover:shadow-xl hover:bg-white/70 hover:text-rose-600 transition duration-300"> Message Me </Link>
                      
                     </div>
                    
                   
                
                </div>
               </div>
                
               
            </div>
        </div>

          
        
    </div>
    </MasterLayout>
</template>

<script>
import FacebookIcon from 'vue-material-design-icons/Facebook.vue'
import LinkedInIcon from 'vue-material-design-icons/Linkedin.vue'
import PhoneIcon from 'vue-material-design-icons/Phone.vue'
import MailIcon from 'vue-material-design-icons/Email.vue'
import GitIcon from 'vue-material-design-icons/Github.vue'
import WebIcon from 'vue-material-design-icons/CodeLessThanOrEqual.vue'

import {Link} from '@inertiajs/inertia-vue3'

// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from "swiper/vue";

// Import Swiper styles
import "swiper/css";

import "swiper/css/effect-cards";

// import required modules
import { EffectCards } from "swiper";

import MasterLayout from '@/Layouts/MasterLayout.vue';
export default {
    props: ['project' , 'tags', 'blog'],

    data() {
        return {
            read: false,
        }
    },

    methods: {
        readMore(){
            this.read = true;
        },

        readLess(){
            this.read = false;
        }
    },
   
      setup() {
    return {
      modules: [EffectCards],
    };
     },
    components:{
        FacebookIcon, LinkedInIcon , PhoneIcon, MailIcon , MasterLayout , WebIcon, GitIcon, Link,
        Swiper,SwiperSlide,
    }
}
</script>

<style scoped>

 .swiper {
  width: 400px;
  min-width: auto;
  height: 380px;
  min-height: auto;
}

@media only screen and (max-width: 600px) {
    .swiper {
  width: 250px;
  min-width: auto;
  height: 180px;
  min-height: auto;
}
}

.swiper-slide {
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 18px;
  font-size: 22px;
  font-weight: bold;
  color: #fff;
}

/* .textB{
    border-top-left-radius: 20px;
    border-top-right-radius: 480%;

    border-end-end-radius: 420px;
    border-end-start-radius: 40px;
    animation: textBox 10s infinite;
} */

/* @keyframes textBox{
   0% {     
             border-top-left-radius: 220px;
            border-top-right-radius: 260px;

            border-end-end-radius: 220px;
            border-end-start-radius: 420px;
      }

    25% {     
             border-top-left-radius: 340px;
            border-top-right-radius: 440px;

            border-end-end-radius: 420px;
            border-end-start-radius: 130px;
      }

    50% {     
             border-top-left-radius: 560px;
            border-top-right-radius: 320px;

            border-end-end-radius: 260px;
            border-end-start-radius: 230px;
      }

    75% {     
             border-top-left-radius: 280px;
            border-top-right-radius: 330px;

            border-end-end-radius: 180px;
            border-end-start-radius: 320px;
      }

        1000% {     
             border-top-left-radius: 210px;
            border-top-right-radius: 260px;

            border-end-end-radius: 204px;
            border-end-start-radius: 240px;
      }
    
    } */


</style>
