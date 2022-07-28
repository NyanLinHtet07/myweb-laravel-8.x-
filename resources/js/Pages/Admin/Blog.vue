<template>
   

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-bold text-xl text-gray-800 leading-tight pt-2">
                Blogs
            </h2>
        </template>

        <div class="py-6">
            <div class=" flex justify-end items-end mr-12">
                
                <PlusIcon @click="openUpload" class="p-2 rounded-full bg-white opacity-60 drop-shadow-lg shadow-md shadow-sky-200 decoration-slate-300 
                                  hover:drop-shadow-sm hover:opacity-70 hover:shadow-inner
                                  transition ease-in-out duration-300 "/>
            </div>
        </div>

        
        <table class="table-auto border-collapse:separate rounded-xl border-0 border-accent my-3 w-5/6 bg-white bg-opacity-40 backdrop-blur-md mx-auto drop-shadow-sm shadow-2xl shadow-sky-200">
            <thead class=" border-y border-gray-300/30">
                <tr>
                <th class=" py-2 font-thin">No</th>
                <th class="py-2 font-thin">Img</th>
                <th class=" py-2 font-thin">Title</th>
                <th class="py-2 font-thin"> Text</th>
                <th class=" py-2 font-thin">
                    Tags
                </th>
                <th class="py-2 font-thin">Edit</th>
                <th class=" py-2 font-thin">Delete</th>
                </tr>
            </thead>
            <tbody class=" bg-white bg-opacity-60 backdrop-blur-md ">
                <tr v-for="(blog,index) in blogs" :key="index" class=" border-y border-gray-200/50 text-sm">
                <td class=" py-2 pl-3 text-center">{{index + 1}}</td>
                <td class=" py-2 pl-3 text-center">
                    <img :src="'/assets/empty.png'" v-if ="blog.image == null" alt="" class="object-scale-down h-12 w-12 p-1 rounded mx-auto">
                    <img :src="'/upload/blog/'+blog.image" v-else alt="" srcset="" class="object-scale-down h-12 w-12 p-1 rounded-md mx-auto">

                </td>
                <td class=" py-2 pl-3 text-center">{{blog.title}}</td>
                <td class=" py-2 pl-3 text-left text-sm">{{blog.text.substring(0,200)+'...'}}</td>
                <td class="py-2 pl-3 text-thin text-center flex justify-center mt-3">
                    <div v-for="(t_id, index) in JSON.parse(blog.tag_id)" :key="index"> 
                       <div v-for="tag in tags" :key="tag.id">
                            <div v-if=" tag.id == t_id" class=" text-xs mx-2">
                               <!-- <img :src="'/upload/tag/'+tag.icon"  class=" object-scale-down h-6 w-6">  -->
                                {{tag.name}}
                            </div>
                       </div> 
                    </div>
                </td>
                 <td class=" py-2 text-center">
                     <button  @click="editBlog(blog)" class="p-2 text-xs rounded-full bg-emerald-700/90  drop-shadow-lg shadow-md shadow-emerald-200 decoration-slate-200 text-white 
                                  hover:drop-shadow-sm hover:opacity-80 hover:shadow-inner
                                  transition ease-in-out duration-300"> 
                                  <EditIcon class=" w-4"/> 
                    </button> 
                    </td>
                  <td class=" py-2 text-center"> 
                      <button @click="deleteBlog(blog.id)" class="p-2 rounded-full bg-red-700/90 drop-shadow-lg shadow-md shadow-red-200 decoration-slate-200 text-sm text-white 
                                  hover:drop-shadow-sm hover:opacity-80 hover:shadow-inner
                                  transition ease-in-out duration-300"> 
                                  <DeleteIcon/>
                    </button>
                    </td>
                </tr>
              
            </tbody>
        </table>

        <!-- <div class=" text-center bottom-5 left-0 right-0">
                <Pagination :data="tags" align="center" @pagination-change-page = "getData" class="mx-2 rounded "> 
                </Pagination>
        </div> -->


        <!-------------------- modal ----------------------->
        <div class=" fixed z-10 inset-0 overflow-y-auto ease-out duration-500" v-if="modalOpen">
            <div class=" flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
               <div class=" fixed inset-0 transition-opacity">
                     <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
               </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                          <form @submit.prevent="updateBlog(form)">
                          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="">
                                  <div class="mb-4">
                                      <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                                      <input type="text" v-model="form.title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Title">
                                   
                                  </div>
                                  <div class="mb-4">
                                      <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Text</label>
                                      <textarea   class=" w-full h-16 rounded-md border-2 border-gray-400" v-model=" form.text" placeholder="text"></textarea>
                                   
                                  </div>
                            </div>
                          </div>
                          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                           
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                              <button  type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-teal-800/70 text-base leading-6 font-medium text-white shadow-sm hover:bg-teal-800/50 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" >
                                Update
                              </button>
                            </span>
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                              
                              <button @click="closeModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Cancel
                              </button>
                            </span>
                          </div>
                          </form>
                          
                        </div>
            </div>
        </div>

         <div class=" fixed z-10 inset-0 overflow-y-auto ease-out duration-500" v-if="uploadOpen">
            <div class=" flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
               <div class=" fixed inset-0 transition-opacity">
                     <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
               </div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                          <form @submit.prevent = "submit">
                          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="">
                                  <div class="mb-4">
                                      <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                                      <input type="text" v-model="form.title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Title">
                                   
                                  </div>
                                  <div>
                                    <select name="" id="" v-model="form.tag_id" class=" px-3 py-2 rounded-lg h-24 w-48 border-none bg-white" multiple>
                                    <!-- <option selected > Select Tag </option> -->
                                    <option v-for="tag in tags" :key="tag.id" :value="tag.id" class=" py-1 px-2 my-1 rounded-lg bg-slate-50"> {{tag.name}}</option>
                                </select>
                                  </div>

                                   <div class="mb-4">
                                      <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">File</label>
                                      <input type="file" ref="image" @change = "onChangeFileUpload()" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1">
                                   
                                  </div>

                                  <div class=" mb-4">
                                        <textarea   class=" w-full h-16 rounded-md border-2 border-gray-400" v-model=" form.text" placeholder="text"></textarea>
                                  </div>
                            </div>
                          </div>
                          <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                           
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                              <button  type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-teal-800/70 text-base leading-6 font-medium text-white shadow-sm hover:bg-teal-800/50 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" >
                                Upload
                              </button>
                            </span>
                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                              
                              <button @click="closeUpload()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Cancel
                              </button>
                            </span>
                          </div>
                          </form>
                          
                        </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
    import BreezeAuthenticatedLayout from '@/Layouts/AdminDash.vue';
    //import { Head } from '@inertiajs/inertia-vue3';
    import PlusIcon from 'vue-material-design-icons/Plus.vue'
    import EditIcon from 'vue-material-design-icons/BookEdit.vue'
    import DeleteIcon from 'vue-material-design-icons/Delete.vue'
    // import Paginate from '../../Components/Pagination.vue'
    

    import axios from 'axios'

    export default {

        setup() {

            //return {form, submit}
        },

        data() {
            return {
                modalOpen: false,
                uploadOpen: false,

                tags:[],
                blogs:[],

            form : {
                title:null,
                image:null,
                text:null,
                tag_id:null
            }
            }
        }, 

        methods: {

            reset(){
                this.form = {
                    title:null,
                    image:null,
                    text:null,
                    tag_id:null
                }
            },

            async getData(){
                await axios.get('/api/blog')
                            .then( res => {
                                this.tags = res.data.tags;
                                this.blogs = res.data.blogs;
                            })
            },

            onChangeFileUpload(){
                this.form.image = this.$refs.image.files[0];
            },

            async submit(){
                let t_id = JSON.stringify(this.form.tag_id)
                var data = new FormData() ;
                data.append('title', this.form.title);
                data.append('image', this.form.image);
                data.append('text', this.form.text);
                data.append('tag_id', t_id)

                await axios.post('/api/blog',data, {
                    header: {
                        'content-type': 'multipart/form-data',
                        //'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                }).then( res =>{
                    this.closeUpload();
                    this.reset();
                    window.alert('Successfully Uploaded');
                    this.getData();
                    console.log(res);
                });
               
            },

            editBlog(blog){
                this.form = Object.assign({}, blog)
                this.openModal();

            },

            async updateBlog(form){
                await axios.put(`/api/blog/`+form.id , form);
                this.reset();
                this.getData();
                this.closeModal();
            },

            async deleteBlog(id){
                if(! confirm("Are You Sure to Delete")) return;
                await axios.delete(`/api/blog/${id}`);
                this.getData();
            },

            openModal(){
                this.modalOpen= true;
            },

            closeModal(){
                this.modalOpen = false;
            },
            openUpload(){
                this.reset();
                this.uploadOpen = true;
            },

            closeUpload(){
                this.uploadOpen = false;
            }
        },
        components:{
            BreezeAuthenticatedLayout, PlusIcon , EditIcon, DeleteIcon ,
            // 'Pagination': LaravelVuePagination
        },

        mounted() { 
            this.getData();
        },

    }
</script>