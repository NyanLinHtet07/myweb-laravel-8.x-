<template>
    <div v-if= "links.length > 3">
            <div class="flex flex-wrap -mb-1">
                   <template v-for="(link, p) in links" :key="p">
                       <div v-if="link.url === null" class="mr-1 mb-1 px-3 py-2 text-sm shadow-md bg-white/80 text-gray-800 border rounded-full"
                        v-html = "link.label" />
                           
                        <Link v-else class="mr-1 mb-1 px-3 py-2 text-sm  border rounded-full bg-white/80 focus:border-indigo-400 focus:text-indigo-500" 
                         :class="{'bg-blue-800 text-white font-bold' : link.active}" :href="link.url" v-html="link.label" />
                   </template> 
            </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    components : {
        Link,
    },

    props: {
        links: Array
    },
}
</script>