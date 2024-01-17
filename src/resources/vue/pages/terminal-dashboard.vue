<template>
  <div class="main-container">
    <div class="boxes">
      <Box></Box>
      <Box></Box>
    </div>

    <div class="tabs-container">
      <Tabs class="tabs"></Tabs>
    </div>
  </div>
</template>

<script>
import Tabs from "../components/Tabs.vue";
import ItemCard from "../components/ItemCard.vue";
import Box from "../components/Box.vue";

export default {
  components: {
    Tabs,
    ItemCard,
    Box,
  },
};
</script>

<style lang="scss">
.main-container {
  width: 100%;
  height: 100%;
  background: #1d243a;
  display: flex;
  justify-content: space-between;
}

.tabs-container {
  width: 50%;
  display: flex;
  align-items: flex-end;
}

.tabs {
  display: flex;
  list-style: none;
  padding: 0;
  margin: 0;
}

.boxes {
  width: 50%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
</style>
