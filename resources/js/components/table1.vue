<template>
  <div>
    <b-row>
       <b-col lg="4" class="my-4">
        <b-form-group
          label="Filter"
          label-for="filter-input"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-input
              id="filter-input"
              v-model="filter"
              type="search"
              placeholder="Type to Search"
            ></b-form-input>

            <b-input-group-append>
              <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>

    </b-row>

    <b-row>
        <b-table 
        id="table1"
        :filter="filter"
        :filter-included-fields="filterOn" 
        :items="dispatch" 
        :fields="fields"
        striped hover
        responsive="sm"
        head-variant="dark"
        :per-page="perPage"
        :current-page="currentPage"
        :sort-by.sync="sortBy"
        :sort-desc.sync="sortDesc"
        >
        
        <template #cell(actions)="data">
            <b-button-group>
            <b-button variant="outline-primary" >Edit</b-button>
            <b-button @click="delet(data.item.id)" variant="outline-danger" >Delete</b-button>
            </b-button-group>
        </template>
        <template #cell(created_at)="data">
            {{ formatDate(data.created_at)}}
        </template>
        <template #cell(updated_at)="data">
            {{ formatDate(data.updated_at)}}
        </template>
        
        </b-table>
        
        <b-pagination
        v-model="currentPage"
        :total-rows="rows"
        :per-page="perPage"
        aria-controls="table1"
        ></b-pagination>
    </b-row>
  </div>
</template>

<script>
import moment from "moment"
  export default {

        props: ["dispatch"],

        data() {

            return {
                perPage: 10,
                currentPage: 1,
                filter: null,
                sortBy: 'id',
                sortDesc: true,
                items: [ ],
                filter: null,
                filterOn: [],
                length:1,
                fields: [
                { key: 'id', label: 'ID', sortable: true },
                { key: 'invoice', label: 'Invoice', sortable: true },
                { key: 'built', label: 'Tech', sortable: true },
                 { key: 'user_id', label: 'User', sortable: true },
                 { key: 'item', label: 'Item', sortable: true },
                 { key: 'description', label: 'Description' },
                 { key: 'out', label: 'Active', sortable: true },
                 { key: 'created_at', label: 'Date', sortable: true },
                 { key: 'updated_at', label: 'Update', sortable: true },
                { key: 'actions', label: 'Actions' },
        ],
                
            }
        },
        

        computed: {
            rows() {
            return this.dispatch.length
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
        },

        created(){

            this.list();
        },
  }
</script>