<script setup>
import { ref } from 'vue';
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue';
import BreezeDropdown from '@/Components/Dropdown.vue';
import BreezeDropdownLink from '@/Components/DropdownLink.vue';
import BreezeNavLink from '@/Components/NavLink.vue';
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/inertia-vue3';

const showingNavigationDropdown = ref(false);
const showSidebar = ref(false);
</script>

<template>
   
        <div class=" relative h-screen flex bg-gradient-to-t from-sky-300/70 to-white">

                 <nav class=" w-64 h-screen bg-white bg-opacity-80 backdrop-blur-lg border-b border-gray-100 px-3 py-2 rounded-r-3xl  space-y-6
                                             absolute inset-0 left-0 transform -translate-x-full transition duration-400 ease-in-out block"
                                    :class="{'relative -translate-x-0 transition duration-500':showSidebar}">

                            <!-- Logo -->
                            <div class=" text-center items-center mt-4 text-2xl font-bold text-gray-700">
                                <Link :href="route('dashboard')">
                                    MyWeb
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="pt-2 mx-2 pb-3 space-y-1">
                                 {{ $page.props.auth.user.name }}
                                  <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                               
                            </div>
                       
              
                    <div class="px-2 space-y-1">
                        <BreezeResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </BreezeResponsiveNavLink>
                    </div>

                     <div class="px-2 space-y-1">
                        <BreezeResponsiveNavLink :href="route('tag.index')" :active="route().current('tag.index')">
                            Tags
                        </BreezeResponsiveNavLink>
                    </div>

                     <div class="px-2 space-y-1">
                        <BreezeResponsiveNavLink :href="route('project.index')" :active="route().current('project.index')">
                            Projects
                        </BreezeResponsiveNavLink>
                    </div>

                     <div class="px-2 space-y-1">
                        <BreezeResponsiveNavLink :href="route('blog.index')" :active="route().current('blog.index')">
                            Blogs
                        </BreezeResponsiveNavLink>
                    </div>
                     <div class="px-2 space-y-1">
                        <BreezeResponsiveNavLink :href="route('message.index')" :active="route().current('message.index')">
                            Messages
                        </BreezeResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-3 pb-1 border-t border-gray-200">
                        <div class="mt-3 space-y-1">
                            <BreezeResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </BreezeResponsiveNavLink>
                        </div>
                    
                </div>
            </nav>

         
           
           


           <div class=" px-3 flex-1 min-h-screen overflow-y-auto">
                 <!-- Page Heading -->
            <header class="bg-white bg-opacity-50 drop-shadow-xl backdrop-blur-md shadow rounded-2xl mt-3" v-if="$slots.header">
                <div class=" flex justify-between max-w-7xl mx-auto py-3 px-2 sm:px-6 lg:px-8">
                        <!-- <button  @click="showSidebar ? closeMenu() : openMenu()" class=" hover:bg-slate-200/10 hover:rounded-full hover:drop-shadow-lg hover:transition hover:delay-200 p-2">  <MenuIcon/> </button> -->
                          <button  @click=" showSidebar = !showSidebar" class=" hover:bg-slate-200/10 hover:rounded-full hover:drop-shadow-lg hover:transition hover:delay-200 p-2">  <MenuIcon/> </button>
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <!-- <div>Name: {{ myVar == 1 ? 'Hardik' : 'ItSolutionStuff.com' }}</div> -->
                <slot />
            </main>
           </div>

           
        </div>
    
</template>

<script>
import MenuIcon from 'vue-material-design-icons/Menu.vue';
import CloseIcon from 'vue-material-design-icons/CloseOutline.vue'
export default {
    data(){
        return{
              //showSidebar:false
        }
    },

    // setup(){
    //     const showSidebar = ref(false);

    //     return { showSidebar, }
    // },

    components:{
        MenuIcon, CloseIcon
    },

    methods:{
        openMenu(){
            this.showSidebar = true;
        },

        closeMenu(){
            this.showSidebar = false ;
        },
    }
    
}
</script>


