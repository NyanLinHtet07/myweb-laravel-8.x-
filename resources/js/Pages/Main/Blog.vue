<template>
    <MasterLayout>
    <div class=" px-3 py-4">
        <h1 class=" font-title text-3xl font-bold p-6 text-right mt-8 text-gray-900/90"> Blogs </h1>
         <div class=" mx-5 px-3 py-4 my-8 rounded-3xl bg-white/60 z-10 h-fit" v-for=" blog in datas" :key="blog.id">
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
             
               
                <p class=" mt-6 mx-1 mb-4 text-justify  whitespace-normal" v-if="blog.isOpen === false">
                      {{blog.text.substring(0,400)+'...'}}
                      <small @click="readMore(blog.id)" class=" text-sm float-left font-bold text-gray-900 mx-3 cursor-pointer  px-2 py-1 rounded-full bg-slate-200"> 
                            More
                      </small>
                </p>

                <p class=" mt-6 mx-1 mb-4 text-justify" v-else>
                      {{blog.text}} 
                      <small @click="readLess(blog.id)" class=" text-sm text-center font-bold text-gray-900 mx-3 cursor-pointer  px-2 py-1 rounded-full bg-slate-200"> 
                            less
                      </small>
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
import Pagination from '@/Components/Pagination_C.vue';

export default {
    props:['blogs', 'tags'],
    components:{
        MasterLayout, Pagination
    },
    data() {
        return {
           datas:[]
        }
    },

    methods: {
        addRows(){
            this.datas = this.blogs.data
            this.datas  = this.datas.map(obj => {
                return {...obj,  isOpen:false};
            })
        },

        readMore(id){
            this.datas.map(data => {
                if(data.id == id){
                    data.isOpen = true
                }
            })
        },

        readLess(id){
            this.datas.map(data => {
                if(data.id == id){
                    data.isOpen = false
                }
            })
        }
    },

    created() {
        //this.addData();
        this.addRows();
    },

   
}
</script>