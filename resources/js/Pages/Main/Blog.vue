<template>
    <MasterLayout>
    <div class=" px-3 py-4">
        <h1 class=" font-title text-3xl font-bold p-6 text-right mt-8 text-gray-900/90"> Blogs </h1>
         <div class=" mx-5 px-3 py-4 my-8 rounded-3xl bg-white/60 z-10 h-fit" v-for=" blog in blogs.data" :key="blog.id">
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
             
               
                <!-- <p class=" mt-6 mx-1 mb-4 text-justify  whitespace-normal" v-if="! more">
                      {{blog.text.substring(0,400)+'...'}}
                      <small @click="readMore(blog.id)"> More</small>
                </p> -->

                <p class=" mt-6 mx-1 mb-4 text-justify">
                      {{blog.text}} 
                      <!-- <small @click="readMore"> More</small> -->
                </p>

                
                
                 
             </div>

            <div class="mt-6 flex justify-center">
                <pagination   :links="blogs.links" />
            </div>
             
    </div>
    </MasterLayout>
</template>

<script>
import MasterLayout from '@/Layouts/MasterLayout.vue';
import Pagination from '@/Components/Pagination_C.vue'
export default {
    props:['blogs', 'tags'],
    components:{
        MasterLayout, Pagination
    },
    data() {
        return {
            // more: false,
        }
    },

    methods: {
        addData(){
            //console.log(this.blogs.data)
            this.blogs.data.map( b => {
                //console.log(b)
              ({...b , more:false});
            })
        }
    },

    created() {
        this.addData();
    },

   
}
</script>