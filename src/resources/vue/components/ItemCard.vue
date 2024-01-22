<template>
  <div class="item-card">
    <div class="left">
      <Icon class="book-icon" icon="book" size="90" color="white" />
      <div class="info">
        <p>{{ item.title }}</p>
        <p>{{ item.description }}</p>
      </div>
    </div>
    <div v-if="item.warning" class="right">
      <Icon icon="warning" size="35" />
    </div>
  </div>
</template>

<script>
import Icon from "./icon.vue";

export default {
  name: "ItemCard",
  props: {
    item: Object,
    itemIndex: Number,
  },
  components: {
    Icon,
  },
};
</script>

<style lang="scss">
.item-card {
  width: 667px;
  height: 116px;
  background: #1d243a;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 13px;

  .left {
    display: flex;
    align-items: center;
    width: 100%;
    height: 100%;

    .info {
      margin-left: 20px;
      display: flex;
      flex-direction: column;

      p {
        color: #fff;
        font-size: 32px;
        font-family: "Outfit";
        font-weight: 700;
      }
    }
  }

  .right {
    display: flex;
    align-items: flex-start;
    height: 100%;
  }
  .book-icon {
    width: 50px;
    height: 50px;
  }
}
</style>
