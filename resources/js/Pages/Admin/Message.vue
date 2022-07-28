<template>
     <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-bold text-xl text-gray-800 leading-tight pt-2">
                Messages
            </h2>
        </template>

      

        
        <table class="table-auto border-collapse:separate rounded-xl border-0 border-accent w-5/6 mt-6 my-3 bg-white bg-opacity-40 backdrop-blur-md mx-auto drop-shadow-sm shadow-2xl shadow-sky-200">
            <thead class=" border-y border-gray-300/30">
                <tr>
                <th class=" py-2 font-thin">No</th>
                <th class=" py-2 font-thin">Name</th>
                 <th class=" py-2 font-thin">Email</th>
                  <th class=" py-2 font-thin">Phone</th>
                <th class=" py-2 font-thin">Message</th>
                <th class=" py-2 font-thin">Delete</th>
                </tr>
            </thead>
            <tbody class=" bg-white bg-opacity-60 backdrop-blur-md ">
                <tr v-for="(message,index) in messages.data" :key="index" class=" border-y border-gray-200/50 text-sm">
                <td class=" py-2 pl-3 text-center">{{index + 1}}</td>
      
                <td class=" py-2 pl-3 text-center">{{message.name}}</td>
                 <td class=" py-2 pl-3 text-center">{{message.email}}</td>
                <td class=" py-2 pl-3 text-center">{{message.phone}}</td>
                 <td class=" py-2 pl-3 text-center">{{message.description}}</td>
                  <td class=" py-2 text-center"> 
                      <button @click="deleteMessage(message.id)" class="p-2 rounded-full bg-red-700/90 drop-shadow-lg shadow-md shadow-red-200 decoration-slate-200 text-sm text-white 
                                  hover:drop-shadow-sm hover:opacity-80 hover:shadow-inner
                                  transition ease-in-out duration-300"> 
                                  <DeleteIcon/>
                    </button>
                    </td>
                </tr>
              
            </tbody>
        </table>
           <div class="mt-6 flex justify-center">
                <pagination   :links="messages.links" />
            </div>
        </BreezeAuthenticatedLayout>
</template>

<script>
 import BreezeAuthenticatedLayout from '@/Layouts/AdminDash.vue';
 import Pagination from '@/Components/Pagination_C.vue'

    import DeleteIcon from 'vue-material-design-icons/Delete.vue'
    // import Paginate from '../../Components/Pagination.vue'
    

    import axios from 'axios'
export default {
    props:['messages'],

    components:{
        BreezeAuthenticatedLayout, DeleteIcon, Pagination
    },

    methods: {
       async deleteMessage(id){
             if(! confirm("Are You Sure to Delete")) return;
           await axios.delete(`/api/contact/${id}`);
           location.reload();
        },

    },
    
}
</script>