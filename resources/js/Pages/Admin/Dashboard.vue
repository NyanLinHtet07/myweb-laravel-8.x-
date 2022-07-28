<template>
    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-bold text-xl text-gray-800 leading-tight pt-2">
                Dashboard
            </h2>
        </template>
        <div class=" grid md:grid-cols-3 grid-cols-1 gap-3 ">
            <div class=" px-3 py-2 rounded-lg bg-white/60 backdrop-blur-md my-3">
                <div class=" flex justify-center my-6 text-teal-400">
                    <ProjectIcon/>
                </div>
                <h3 class=" text-3xl font-title font-semibold text-center my-4"> Projects </h3>
            </div>

            <div class=" px-3 py-2 rounded-lg bg-white/60 backdrop-blur-md my-3">
                <div class=" flex justify-center my-6 text-zinc-400">
                    <BookIcon/>
                </div>
                <h3 class=" text-3xl font-title font-semibold text-center my-4"> Blogs </h3>
            </div>

            <div class=" px-3 py-2 rounded-lg bg-white/60 backdrop-blur-md my-3">
                <div class=" flex justify-center my-6 text-sky-400">
                    <CommentIcon/>
                </div>
                <h3 class=" text-3xl font-title font-semibold text-center my-4"> Comments </h3>
            </div>
        </div>
        <div class=" grid grid-cols-1 md:grid-cols-2 gap-3 mx-2 h-72">
            <div class=" rounded px-2 py-3 bg-white/60 backdrop-blur-md">
                <BarChart class=" h-64"/>
            </div>
             <div class=" rounded px-2 py-3 bg-white/60 backdrop-blur-md">
                <PieChart/>
            </div>
        </div>
       
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/AdminDash.vue';
    import PieChart from '@/Charts/PieChart.vue';
    import BarChart from '@/Charts/BarChart.vue';
    import { Head } from '@inertiajs/inertia-vue3';
    import BookIcon from 'vue-material-design-icons//BookOpenOutline.vue'
    import ProjectIcon from 'vue-material-design-icons/CodeNotEqualVariant.vue'
    import CommentIcon from 'vue-material-design-icons/CommentTextMultipleOutline.vue'


    export default { 
        components:{
            BreezeAuthenticatedLayout, Head, BarChart, PieChart, BookIcon, ProjectIcon, CommentIcon 
        }
    }
</script>