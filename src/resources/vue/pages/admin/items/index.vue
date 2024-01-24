<template>
  <AdminLayout >
    <div class="content">
      <div class="header">
        <h1>Items</h1>
      </div>
      <div class="table">
        <table class="table table-hover">
          <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Titel</th>
            <th scope="col">Beschrijving</th>
            <th scope="col">Auteur</th>
            <th scope="col">Categorie</th>
            <th scope="col">Leeftijd</th>
            <th scope="col">ISBN</th>
          </tr>
          </thead>
          <tbody>
          <tr v-for="item in items.data">
            <th scope="row">{{item.id}}</th>
            <td>{{item.name}}</td>
            <td>{{item.description}}</td>
            <td>{{item.author}}</td>
            <td>{{item.category}}</td>
            <td>{{item.age_rating}}</td>
            <td>{{item.ISBN ?? 'Onbekend'}}</td>
          </tr>
          </tbody>
        </table>
      </div>
      <Pagination :links="items.links" />
    </div>
  </AdminLayout>
</template>
<script>
import AdminLayout from "@layouts/admin-layout.vue";
import Pagination from "@components/admin/pagination.vue";
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
export default {
  name: "admin-items-index",
  components: {
    AdminLayout,
    Pagination
  },
  setup() {
    const page = usePage();
    const items = computed(() => page.props.items);
    return {items};
  }
}
</script>

<style scoped lang="scss">

.content {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  padding: 50px;
  overflow: scroll;
}

.header {
  display: flex;
  justify-content: flex-start;
  width: 100%;
  padding-left: 30px;
  margin-bottom: 10px;
}

.table {
  padding: 0 30px 0 30px;
}

table {
  border-collapse: collapse;
  border-radius: 1em;
  overflow: hidden;
}

tbody:has(tr) {
  cursor: pointer;
}

td, th {
  max-width: 210px;
  text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
}
</style>
