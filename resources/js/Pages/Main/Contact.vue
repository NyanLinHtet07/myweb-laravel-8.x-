<template>
    <MasterLayout>
   <div class=" px-3 py-4 md:mt-20 lg:mt-2 mt-2">
        <h1 class=" font-title text-3xl text-gray-900/90 font-bold p-6 text-right mt-7"> Contact Me </h1>

        <div class=" grid grid-cols-1 md:grid-cols-2 gap-2 p-3">
             <img src="/assets/metting.png" class=" drop-shadow-lg mx-auto block" alt="" srcset="" />

             <div>
                <form @submit.prevent="submit()">
                    <input type="text" v-model="form.name" class=" mx-auto block shadow-md w-3/4 px-3 py-1 rounded-full ring-1 ring-rose-600 border-none my-4" placeholder="Name" required/>

                     <input type="number" v-model="form.phone" class=" mx-auto block shadow-md  w-3/4 px-3 py-1 rounded-full ring-1 ring-rose-600 border-none my-4" placeholder="Phone" required/>
                
                     <input type="email" v-model="form.email" class=" mx-auto block shadow-md  w-3/4 px-3 py-1 rounded-full ring-1 ring-rose-600 border-none my-4" placeholder="Email" required />

                      <textarea  v-model="form.description"  class=" mx-auto block shadow-md w-3/4 h-16 rounded-2xl ring-1 ring-rose-600 my-4 border-none"  placeholder="Message Me" required></textarea>
                     
                     <div class=" mt-8 text-right mr-16">
                        <button class="px-3 py-2 my-5 font-title font-bold  rounded-full bg-white/60 backdrop-blur-md  text-gray-900/90 shadow-lg hover:shadow-xl hover:bg-white/70 hover:text-rose-600 transition duration-300">Message Me</button>
                     </div>
                     
                </form>
             </div>
        </div>
       
    </div>
    </MasterLayout>
</template>

<script>
import MasterLayout from '@/Layouts/MasterLayout.vue';
import axios from 'axios';
export default {
    data() {
        return {
            err:'',
            form:{
             name:'',
             phone:'',
             email:'',
             description:'',
            }
        }
    },
    components:{
        MasterLayout
    },

    methods: {
        reset(){
            this.form = {
             name:'',
             phone:'',
             email:'',
             description:'',
            }
        },
        async submit(){
            await axios.post('/api/contact', this.form)
                .then( res => {
                    this.err = res.data;
                    window.alert("Thanks for Your Message");
                    this.reset();
                }
                )
        }
    },
    
}
</script>