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

        
        <table class="table-auto border-collapse:separate rounded-xl my-3 border-0 border-accent w-5/6 bg-white bg-opacity-40 backdrop-blur-md mx-auto drop-shadow-sm shadow-2xl shadow-sky-200">
            <thead class=" border-y border-gray-300/30">
                <tr>
                <th class=" py-2 font-thin">No</th>
                <th class="py-2 font-thin">Img</th>
                <th class=" py-2 font-thin">Title</th>
               
                <th class=" py-2 font-thin">
                    Tags
                </th>
                 <th class="py-2 font-thin"> List</th>
                 <th class="py-2 font-thin"> Text</th>
                <th class="py-2 font-thin">Edit</th>
                <th class=" py-2 font-thin">Delete</th>
                </tr>
            </thead>
            <tbody class=" bg-white bg-opacity-60 backdrop-blur-md ">
                <tr v-for="(p,index) in projects" :key="index" class=" border-y border-gray-200/50 text-sm">
                <td class=" py-2 pl-3 text-center">{{index + 1}}</td>
                <td class=" py-2 pl-3 text-center">
                    <img :src="'/assets/empty.png'" v-if ="p.image == null" alt="" class="object-scale-down h-12 w-12 p-1 rounded mx-auto">
                    <div v-else class=" flex justify-between">
                         <img  :src="'/upload/project/'+p.image[0]" alt="" srcset="" class="object-scale-down h-12 w-12 p-1 rounded-md mx-auto"/>
                         <!-- <img v-for="(i,index) in p.image" :key="index" :src="'/upload/project/'+i" alt="" srcset="" class="object-scale-down h-6 w-6 p-1 rounded-md mx-auto"/> -->
                    </div>
                   

                </td>
                <td class=" py-2 pl-3 text-center">{{p.title}}</td>
                <!-- <td class=" py-2 pl-3 text-center text-sm">{{blog.text}}</td> -->
                <td class="py-2 pl-3 text-thin text-center flex justify-center mt-3">
                    <div v-for="(t_id, index) in JSON.parse(p.tag_id)" :key="index"> 
                       <div v-for="tag in tags" :key="tag.id">
                            <div v-if=" tag.id == t_id" class=" text-xs mx-2">
                               <img :src="'/upload/tag/'+tag.icon"  class=" object-scale-down h-6 w-6"> 
                            </div>
                       </div> 
                    </div>
                </td>

                 <td class="py-2 pl-3 text-thin text-sm text-center justify-center mt-3">
                    <div v-for="(l, index) in JSON.parse(p.list)" :key="index" class=""> 
                       {{l.name}}
                    </div>
                </td>

                <td class="py-2 pl-3 text-thin text-center flex justify-center mt-3">{{ p.description.substring(0 , 70)+ '...'}} </td>

                 <td class=" py-2 text-center">
                     <button  @click="editProject(p)" class="p-2 text-xs rounded-full bg-emerald-700/90  drop-shadow-lg shadow-md shadow-emerald-200 decoration-slate-200 text-white 
                                  hover:drop-shadow-sm hover:opacity-80 hover:shadow-inner
                                  transition ease-in-out duration-300"> 
                                  <EditIcon class=" w-4"/> 
                    </button> 
                    </td>
                  <td class=" py-2 text-center"> 
                      <button @click="deleteProject(p.id)" class="p-2 rounded-full bg-red-700/90 drop-shadow-lg shadow-md shadow-red-200 decoration-slate-200 text-sm text-white 
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
                          <form @submit.prevent="updateProject(project)">
                          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="">
                                  <div class="mb-4">
                                      <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                                      <input type="text" v-model="project.title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Title">
                                   
                                  </div>
                                  <div class="mb-4">
                                      <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                                      <textarea  class="w-full h-16 rounded-md border-2 border-gray-400" v-model="project.description" placeholder="text"></textarea>
                                   
                                  </div>

                                   <div class="mb-4">
                                      <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Url</label>
                                     <input type="text" v-model="project.url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1">
                                   
                                  </div>

                                   <div class="mb-4">
                                      <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Project Date</label>
                                      <input type="date" v-model="project.date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Title">
                                   
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
                                      <input type="text" v-model="project.title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Title">
                                   
                                  </div>
                                  <div>
                                    <select name="" id="" v-model="project.tag_id" class=" px-3 py-2 rounded-lg h-24 w-48 border-none bg-white" multiple>
                                    <!-- <option selected > Select Tag </option> -->
                                    <option v-for="tag in tags" :key="tag.id" :value="tag.id" class=" py-1 px-2 my-1 rounded-lg bg-slate-50"> {{tag.name}}</option>
                                </select>
                                  </div>

                                   <div class="mb-4">
                                      <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">File</label>
                                      <input type="file" ref="files" @change = "selectfiles()" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1">
                                   
                                  </div>

                                  <div class="mb-4">
                                      <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Url</label>
                                      <input type="text" v-model="project.url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Url">
                                   
                                  </div>

                                  <div class=" mb-4">
                                         <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Project Date</label>
                                      <input type="date" v-model="project.project_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1">
                                  </div>

                                  <div>
                                   <h3 class=" py-2 text-gray-700"> Lists </h3>
                                    <form @submit.prevent="addList" class=" flex justify-around py-2">
                                        
                                        <div>
                                            <input type="text" name="" v-model="l.name" class=" rounded-lg drop-shadow-sm" placeholder="Add New Lists">
                                        </div>
                                        <div>
                                            <button class=" px-2 py-1 rounded-lg bg-sky-300 text-slate-700" type="submit"> Add</button>
                                        </div>
                                    </form>

                                    <div>
                                        <table class=" w-full mx-2 text-center">
                                            <thead class=" bg-sky-50">
                                                <tr>
                                                <th> No </th>
                                                <th> List </th>
                                                <th> Delete </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(l,index) in project.list" :key="index">
                                                    <td>{{index + 1}}</td>
                                                    <td> {{l.name}} </td>
                                                    <td> <button @click="deleteList" class=" px-2 py-1 rounded-lg bg-red-700 text-white"> Delete</button> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                      
                                    </div>
                                  </div>

                                  <div class=" my-4">
                                        <textarea  class=" w-full h-16 rounded-md border-2 border-gray-400" v-model=" project.descripton" placeholder="text"></textarea>
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
                projects:[],

            project : {
                title:null,
                images:[],
                url:null,
                descripton:null,
                tag_id:null,
                list:[],
                project_date: null,
            },

            l:{
                name:null
            }

            }
        }, 

        methods: {

            reset(){
                this.project = {
                    title:null,
                    images:[],
                    url:null,
                    descripton:null,
                    tag_id:null,
                    list:[],
                    project_date: null,
                }
            },

            addList(){
                const data = {
                    name: this.l.name
                }

                this.project.list.push(data);
                this.l=[];
            },

            deleteList(index){
                this.project.list.splice(index);
            },

            async getData(){
                await axios.get('/api/project')
                            .then( res => {
                                this.tags = res.data.tags;
                                this.projects = res.data.projects;
                            })
            },

            selectfiles(){
               for (let i = 0; i < this.$refs.files.files.length; i++) {
                   this.project.images.push(this.$refs.files.files[i]);
               }
           },

            async submit(){
                let t_id = JSON.stringify(this.project.tag_id);
                let lists = JSON.stringify(this.project.list);
                var data = new FormData() ;
                data.append('title', this.project.title);

                for ( let i = 0 ; i < this.project.images.length; i++) {
                   let file = this.project.images[i];
                
               data.append('image[' + i + ']', file);
               }
                data.append('url', this.project.url);
                data.append('description', this.project.descripton)
                data.append('tag_id', t_id);
                data.append('list' , lists);
                data.append('project_date', this.project.project_date)

                await axios.post('/api/project',data, {
                    header: {
                        'content-type': 'multipart/form-data',
                    },
                }).then( res =>{
                    this.closeUpload();
                    this.reset();
                    window.alert('Successfully Uploaded');
                    this.getData();
                    console.log(res);
                });
               
            },

            editProject(p){
                this.project = Object.assign({}, p)
                this.openModal();

            },

            async updateProject(project){
                await axios.put(`/api/project/`+project.id , project);
                this.reset();
                this.getData();
                this.closeModal();
            },

            async deleteProject(id){
                if(! confirm("Are You Sure to Delete")) return;
                await axios.delete(`/api/project/${id}`);
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