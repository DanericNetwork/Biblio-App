<template>
  <div class="terminal-content">
    <span class="terminal-title">Scan uw pas om te lenen, <br> of een artikel om terug te brengen</span>
    <TerminalScan text="" buttonText="Zoeken" icon="scan-icon" direction="row" placeholder="101010101" />
  </div>
</template>
<script>
  import TerminalScan from "../components/terminal-scan.vue";

  export default {
    name: "Index",
    components: {
      TerminalScan,
    },
  };
</script>
<style lang="scss">
  .terminal-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 50px;
    width: 100%;
    height: 100%;

    .terminal-title {
      font-size: 52px;
      font-weight: 700;
      text-align: center;
      color: #F7F4F3;
    }
  }
</style>