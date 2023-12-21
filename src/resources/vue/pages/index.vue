<template>
  <button @click="showModel = !showModel">Toggle Model</button>
  <model v-if="showModel" v-click-outside="outsideClick"></model>
</template>

<script>
import model from '../components/model.vue';
import vClickOutside from 'v-click-outside';

export default {
  directives: {
    'v-click-outside': vClickOutside
  },
  components: {
    model
  },
  data() {
    return {
      showModel: false
    };
  },
  methods: {
    outsideClick() {
      this.showModel = false;
    }
  }
};
</script>

<style>
/* Add your styles here if needed */
</style>
