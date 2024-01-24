<template>
  <div class="sidebar-wrapper">
    <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 15rem; height: 100%; background-color: #262d42">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-light text-decoration-none">
        <Icon icon="admin" size="24" color="white" />
        <span class="fs-4 p-1">| Biblio Admin</span>
      </a>
      <hr style="color: white">
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="/admin" :class="{ 'active': $page.url === ('/admin'), 'link-light': $page.url !== ('/admin') }" class="nav-link d-flex" aria-current="page">
            <Icon icon="full-house" size="16" color="white" />&nbsp;Home
          </a>
        </li>
        <li>
          <a href="/admin/items" :class="{ 'active': $page.url.startsWith('/admin/items'), 'link-light': !$page.url.startsWith('/admin/items') }" class="nav-link d-flex">
            <Icon icon="full-archive" size="16" color="white" /> &nbsp;Items
          </a>
        </li>
        <li>
          <a href="/admin/reservations" :class="{ 'active': $page.url.startsWith('/admin/reservations'), 'link-light': !$page.url.startsWith('/admin/reservations') }" class="nav-link link-light d-flex">
            <Icon icon="list" size="16" color="white" /> &nbsp;Reserveringen
          </a>
        </li>
        <li>
          <a href="/admin/users" :class="{ 'active': $page.url.startsWith('/admin/users'), 'link-light': !$page.url.startsWith('/admin/users') }" class="nav-link link-light d-flex">
            <Icon icon="full-people" size="16" color="white" /> &nbsp;Klanten
          </a>
        </li>
        <li>
          <a href="/admin/invoices" :class="{ 'active': $page.url.startsWith('/admin/invoices'), 'link-light': !$page.url.startsWith('/admin/invoices') }" class="nav-link link-light d-flex">
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
    <slot />
  </div>
</template>
<script>
import Icon from "@/icon.vue"
export default {
  name: "AdminSidebar",
  props: ["userData"],
  components: {
    Icon
  },
}
</script>

<style>
.sidebar-wrapper {
  height: 100%;
  width: 100%;
  display: flex;
  flex-direction: row;
  align-items: start;
  background-color: #f2f2f2;
}
</style>
