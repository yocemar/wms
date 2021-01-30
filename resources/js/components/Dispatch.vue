<template>

        <div>
        
        <hr>
        <!-- Button trigger modal -->

                  <button @click="openModal();" type="button" class="btn btn-primary"> Create </button>

            <!-- Modal -->
            <div class="modal" :class="{show:modal}">
            <div class="modal-dialog">
                <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" >{{titleModal}}</h5>
                    <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button  @click="closeModal();" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>


        <table class="table table-striped table-hover  table-responsive table-condensed">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Date</th>
                <th scope="col">Invoice</th>
                <th scope="col">Item</th>
                <th scope="col">Built</th>
                <th scope="col">Scanned</th>
                <th scope="col">Description</th>
                <th scope="col">Scaned Out</th>
               <!-- <th scope="col">Created</th>
                <th scope="col">Updated</th> -->
                <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
               
                <tr v-for="dis in dispatch" :key="dis.id">
                    <th scope="row">{{dis.id}}</th>
                    <td>{{formatDate(dis.created_at)}}</td>
                    <td>{{dis.invoice}}</td>
                    <td>{{dis.item}}</td>
                    <td>{{dis.built}}</td>
                    <td>{{dis.user_id}}</td>
                    <td>{{dis.description}}</td>
                    <td>{{dis.out}}</td>
                    <!--<td>{{dis.created_at}}</td>
                    <td>{{(dis.updated_at)}}</td>-->
                    <td>
                        
                        <a class="btn btn-success" href="#">Edit</a>                       
                        <button  @click="delet(dis.id)"  class="btn btn-danger" >Delete</button>
                    </td> 

                </tr>
            
            </tbody>
        </table>

    </div>
</template>

<script>
import moment from "moment"
  
export default {

    data() {
        return {
            modal:0,
            titleModal:'',
            dispatch:[],
        }
    },
    methods: {

     formatDate(date) {
      return moment(date).format("DD/MM/YYYY")
    },

       async list(){
            const res=await axios.get('dispatch');
            this.dispatch=res.data;

        },
        async delet(id){
            const res=await axios.delete('dispatch/'+id);
            this.list();
        },

        openModal(){
            this.modal=1;
        },
        closeModal(){
            this.modal=0;
        },
    
    },

    created(){

        this.list();
    },
    
}
</script>

<style >
.show{
    display:list-time;
    opacity:1;
    background:rgb(150, 148, 148) ;
}

</style>