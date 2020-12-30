<template>
  <div class="todoListContainer">
    <div class="heading">
      <h2 id="title">ToDo List</h2>
      <add-item-form v-on:reloadList="getListItems()"/>
    </div>
    <list-view
      :items="items"
      v-on:reloadList="getListItems()"
    />
  </div>
</template>

<script>
import addItemForm from "./addItemForm"
import listView from "./listView"

export default {
  data: function() {
    return {
      items: []
    }
  },

  components: {
    addItemForm,
    listView
  },

  methods: {
    getListItems() {
      axios.get("api/items")
        .then(response => {
          this.items = response.data
        })
        .catch(error => {
          console.log(error)
        })
    },
  },

  created() {
    this.getListItems()
  },
}
</script>

<style scoped>
.todoListContainer {
  width: 350px;
  margin: auto;
}

.heading {
  background: #e6e6e6;
  padding: 10px;
}

#title {
  text-align: center;
}
</style>