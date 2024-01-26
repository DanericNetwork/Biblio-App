<template>
  <div :style="{width: wrapperWidth, height: wrapperHeight }" class="a-modal-background"></div>
  <div :style="{width: wrapperWidth, height: wrapperHeight }" class="a-modal-wrapper">
    <div :style="{width: modalWidth, height: modalHeight}" class="a-modal">
      <div class="a-modal-topbar">
        <Icon class="close" size="30" icon="close" color="white" />
      </div>
      <slot></slot>
    </div>
  </div>
</template>

<script>
import Icon from "@components/icon.vue";

export default {
  name: "adminModal",
  components: {Icon},
  props: {
    wrapperWidth: {
      type: String,
      default: "100%"
    },
    wrapperHeight: {
      type: String,
      default: "100%"
    },
    modalWidth: {
      type: String,
      default: "300px"
    },
    modalHeight: {
      type: String,
      default: "300px"
    }
  }
}
</script>

<style scoped lang="scss">

.a-modal-background {
  position: absolute;
  top: 0;
  right: 0;
  z-index: 999;
  background-color: black;
  opacity: 0.5;
  pointer-events: none;
}

.a-modal-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  position: fixed;
  top: 0;
  right: 0;
  z-index: 1000;
}

.a-modal {
  display: flex;
  position: fixed;
  background-color: #158cba;
  border-radius: 15px;
  color: white;
}

.a-modal-topbar {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  width: 100%;
  height: 30px;
  padding: 0 10px 0 10px;
  background-color: #117095;
  border-radius: 15px 15px 0 0;
}

.close {
  cursor: pointer;
}

</style>
