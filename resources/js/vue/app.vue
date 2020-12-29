<template>
  <div class="todoListContainer">
    <div class="heading">
      <h2 id="title">ToDo List</h2>
      <item-form/>
    </div>
  </div>
</template>

<script>
import itemForm from "./itemForm"

export default {
  components: {itemForm},
}
</script>

<style scoped>

</style>