<template>
  <div>
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
      <b-form-group
        id="input-group-1"
        label="Invoice No."
        label-for="input-1"
        
      >
        <b-form-input
          id="input-1"
          v-model="form.invoice"
          placeholder="Enter Invoice No"
          required
        ></b-form-input>
      </b-form-group>
       
      <label for="tags-pills">Enter Items</label>
 
    <b-form-tags
      input-id="tags-pills"
      v-model="value"
      tag-variant="primary"
      tag-pills
      size="lg"
      separator=" "
      placeholder="Enter new tags separated by space"
    ></b-form-tags>
    <!--<p class="mt-2">Value: {{ value }}</p>-->

      <b-form-group id="input-group-2" label="Description:" label-for="input-2">
        <b-form-input
          id="input-2"
          v-model="form.description"
          placeholder="Enter Description"
          required
        ></b-form-input>
      </b-form-group>

      <b-form-group id="input-group-3" label="Users:" label-for="input-3">
        <b-form-select
          id="input-3"
          v-model="form.users"
          :options="users"
          placeholder="Enter User"
          required
          :value="null"
        ></b-form-select>
      </b-form-group>

    <b-row>
       
        <b-col lg="4" class="pb-4" ><b-button variant="primary" >Create</b-button></b-col>
       
    </b-row>
    </b-form>

  </div>
</template>

<script>
  export default {
    data() {
      return {
          value: [],
        form: {
          invoice: '',
           description: '',
          users: '',
          
        },
        users: [{ text: 'Choose...', value: null }, 'tech1', 'tech2', 'tech3', 'tech4'],
        show: true
      }
    },
    methods: {
      onSubmit(event) {
        event.preventDefault()
        alert(JSON.stringify(this.form))
      },
      onReset(event) {
        event.preventDefault()
        // Reset our form values
        this.form.invoice = ''
        this.form.description = ''
        this.form.users = ''
        
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    }
  }
</script>