<template>
    <nav aria-label="Page navigation example">
        <ul class="inline-flex">
            <li class="mx-1 rounded-full">
            <a href="#" class="py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-xl  rounded-r-md border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">Previous</a>
            </li>
            <li class="mx-1">
            <a href="#" class="py-2 px-3 rounded-2xl leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700">1</a>
            </li>
            <li class="mx-1">
            <a href="#" class="py-2 px-3 rounded-2xl leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">2</a>
            </li>
            <li class=" mx-1">
            <a href="#" aria-current="page" class="py-2 px-3 rounded-2xl text-blue-600 bg-blue-50 border border-gray-300 hover:bg-blue-100 hover:text-blue-700">3</a>
            </li>
            <li class="mx-1">
            <a href="#" class="py-2 px-3 rounded-2xl leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">4</a>
            </li>
            <li class=" mx-1">
            <a href="#" class="py-2 px-3 rounded-2xl leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">5</a>
            </li>
            <li class="mx-1">
            <a href="#" class="py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-xl rounded-l-md border border-gray-300 hover:bg-gray-100 hover:text-gray-700">Next</a>
            </li>
        </ul>
</nav>
</template>
<script>
import {Link} from '@inertiajs/inertia-vue3'
export default {
    components:{
        Link
    },
    props:{
        links: Array
    }
}
</script>