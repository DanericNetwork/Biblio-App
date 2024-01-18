<template>
  <AdminSidebar :userData="userData">
    <slot />
  </AdminSidebar>
</template>

<script>
  import "https://code.jquery.com/jquery-3.7.1.js"
  import "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"

  import AdminSidebar from "@/components/admin/Siderbar.vue";

  export default {
    name: "AdminLayout",
    components: {
      AdminSidebar
    },
    props: {
      userData: {
        type: Object,
        required: true,
        default: () => ({
          name: "John Doe",
        }),
      },
    },
  };
</script>

<style lang="scss" scoped>
  @import url("https://bootswatch.com/5/lumen/bootstrap.css");

  .active {
    background-color: #003bb2 !important;
  }

  * {
    color: black;
  }
</style>
