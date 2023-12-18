<template>
  <div>
    <div class="search-bar">
      <svg class="scan-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15 3H21V8H19V5H15V3ZM9 3V5H5V8H3V3H9ZM15 21V19H19V16H21V21H15ZM9 21H3V16H5V19H9V21ZM3 11H21V13H3V11Z"></path></svg>
      <input type="text" class="gray-input" v-model="value" placeholder="Enter text">
    </div>
  </div>
</template>

<script>
export default {
  name: 'GrayInput',
  data() {
    return {
      value: ''
    };
  }
};
</script>

<style scoped>
.gray-input {
  background-color: lightgray;
  border: 1px;
  border-radius: 5px;
  width: 200px;
  padding: 10px;
}

.search-bar {
  display: flex;
  align-items: center;
}

.search-bar i {
  margin-right: 5px;
}

.scan-icon {
  width: 38px;
  height: 38px;
  margin-right: 15px;
}
</style>
