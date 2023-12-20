<template>
  <div class="rating">
    <icon
      v-for="i in fullStars"
      :key="'full' + i"
      icon="full-star"
      color="white"
      size="50"
    ></icon>
    <icon v-if="hasHalfStar" icon="half-star" color="white" size="50"></icon>
    <icon
      v-for="i in emptyStars"
      :key="'empty' + i"
      icon="empty-star"
      color="white"
      size="50"
    ></icon>
  </div>
</template>

<script>
import Icon from "./icon.vue";

export default {
  components: {
    Icon,
  },
  props: {
    rating: {
      type: Number,
      required: true,
    },
  },
  computed: {
    fullStars() {
      return Math.floor(this.rating);
    },
    hasHalfStar() {
      return this.rating % 1 !== 0;
    },
    emptyStars() {
      return 5 - Math.ceil(this.rating);
    },
  },
};
</script>

<style>
.rating {
  display: flex;
  align-items: center;
}
</style>
