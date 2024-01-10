<template>
	<h1>Hello World!</h1>
  <model>
    <p class="modal-content">This is some content in the modal.</p>
  </model>
</template>
<script>
import model from '../components/model.vue';

export default {
  name: "Index",
  components: {
    model
  },
};
</script>