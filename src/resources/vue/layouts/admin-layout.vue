<template>
  <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 15rem; height: 100%; background-color: #262d42">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-light text-decoration-none">
      <Icon icon="admin" size="24" color="white" />
      <span class="fs-4 p-1">| Biblio Admin</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/admin" :class="{ 'active': $page.url === ('/admin'), 'link-light': $page.url !== ('/admin') }" class="nav-link d-flex" aria-current="page">
          <Icon icon="full-house" size="16" color="white" />&nbsp;Home
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-light d-flex">
          <Icon icon="full-archive" size="16" color="white" /> &nbsp;Items
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-light d-flex">
          <Icon icon="list" size="16" color="white" /> &nbsp;Reserveringen
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-light d-flex">
          <Icon icon="full-people" size="16" color="white" /> &nbsp;Klanten
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-light d-flex">
          <Icon icon="full-euro" size="16" color="white" /> &nbsp;Facturen
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <Icon icon="full-person" size="24" color="white" />
        <strong class="p-1">{{ userData.name }}</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>
  <div class="slot">
    <slot />
  </div>
</template>

<script>
  import "https://code.jquery.com/jquery-3.7.1.js"
  import "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"

  import Icon from "@components/icon.vue";

  export default {
    name: "AdminLayout",
    components: {
      Icon,
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

  .slot {
    display: flex;
    width: 100%;
    background-color: #f2f2f2
  }
</style>