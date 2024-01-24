<template>
  <div class="pagination" v-if="links.length > 3">
    <div class="flex flex-wrap -mb-1">
      <template v-for="(link, key) in links" :key="key">
        <div v-if="link.url === null" class="link-wrap" v-html="link.label" />
        <InertiaLink v-else :key="key" class="inertia-link" :class="{ 'bg-white': link.active }" :href="link.url" v-html="link.label" />
      </template>
    </div>
  </div>
</template>

<script>
export default {
  name: "Pagination",
  props: {
    links: {
      type: Array,
      required: true
    }
  },
}
</script>

<style scoped lang="scss">

.link-wrap {
  display: inline-block;
  margin-right: 0.25rem;
  margin-bottom: 0.25rem;
  padding: 0.5rem 0.75rem;
  font-size: 0.875rem;
  line-height: 1.25rem;
  border-radius: 0.25rem;
  color: #9ca3af;
}

.inertia-link {
  margin-right: 0.25rem;
  margin-bottom: 0.25rem;
  padding: 0.5rem 0.75rem;
  font-size: 0.875rem;
  line-height: 1.25rem;
  border-radius: 0.25rem;
}

.inertia-link:hover {
  background-color: #fff;
  color: #1d4ed8;
}

.inertia-link:focus {
  outline: 2px solid transparent;
  outline-offset: 2px;
  box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
}

.pagination {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  margin-top: 1rem;
  margin-bottom: 1rem;
  width: 100%;
}

</style>
