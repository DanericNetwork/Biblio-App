<template>
  <div>
    <Box :direction="direction">
      <div class="content">
        <Icon v-if="text" :icon="icon" size="52px" />
        <span v-if="text" class="text">{{ text }}</span>
      </div>
      <div class="form">
        <div class="form-input">
          <Icon v-if="!text" :icon="icon" size="52px" />
          <Input type="text" :placeholder="placeholder" class="text-medium" />
        </div>
        <Button :content="buttonText" :buttonAction="searchInput" />
      </div>
    </Box>
  </div>
</template>
<script>
import Box from "../components/Box.vue";
import Button from "../components/Button.vue";
import Input from "../components/Input.vue";
import Icon from "../components/icon.vue";

export default {
  name: "index",
  components: {
    Box,
    Button,
    Input,
    Icon,
  },
  created() {
    // console.log(this.icon);
  },
  methods: {
    searchInput() {
      // TODO: Search for library pass or item
    },
  },
  props: {
    direction: {
      type: String,
      default: "column",
    },
    text: {
      type: String,
      default: "Lorem Ipsum Text",
    },
    placeholder: {
      type: String,
      default: "Placeholder",
    },
    icon: {
      type: String,
      default: "default",
    },
    buttonText: {
      type: String,
      default: "Button",
    },
  },
};
</script>
<style lang="scss">
.content {
  display: flex;
  align-items: center;
  flex-direction: row;
  gap: 40px;
  margin-bottom: 17px;

  &.column {
    flex-direction: column !important;
  }

  .text {
    color: #000;
    max-width: 245px;
    font-size: 28px;
    font-weight: 700;
    text-align: center;
  }

  .scan-icon {
    width: 54px;
    height: 53px;
  }
}

.form {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 7px;

  .form-input {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    gap: 10px;
  }
}

.button {
  margin-top: 15px;
}
</style>
