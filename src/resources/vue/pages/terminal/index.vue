<template>
  <div class="main-container">
    <div class="boxes">
      <TerminalScan
        class="Box1"
        text="Zoek een item"
        buttonText="Zoek"
        icon="search-icon"
        direction="column"
        placeholder="Harry potter"
      />
      <TerminalScan
        class="Box2"
        text="Scan een artikel om te lenen"
        buttonText="Zoek"
        icon="scan-icon"
        direction="column"
        placeholder="101010101"
      />
    </div>
    <div class="tabs-container">
      <Tabs class="tabs" />
    </div>
  </div>
</template>

<script>
import Tabs from "../../components/Tabs.vue";
import ItemCard from "../../components/ItemCard.vue";
import Box from "../../components/Box.vue";
import TerminalScan from "../../components/terminal-scan.vue";

export default {
  components: {
    Tabs,
    ItemCard,
    Box,
    TerminalScan,
  },
};
</script>

<style lang="scss">
.body {
  height: 100vh;
}

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
  align-items: flex-start;
}

.tab {
  margin-top: 0;
  padding: 10px;
  cursor: pointer;
  background-color: #D9D9D9;  
}

.boxes {
  width: 50%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 50px;
}

</style>
