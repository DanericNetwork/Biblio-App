<template>
  <div>
    <input :id="id" :name="name" :type="type" :placeholder="placeholder" class="inputfield" :class="class" v-model="value">
  </div>
</template>

<script>
export default {
  name: 'Input',
  props: {
    id: {
      type: String,
      default: 'id',
    },
    name: {
      type: String,
      default: 'name',
    },
		type: {
      type: String,
      default: 'text',
    },
    placeholder: {
      type: String,
      default: 'Placeholder',
    },
    class: {
      type: String,
      default: 'text-medium',
    },
	},
  data() {
    return {
      value: '',
    };
  },
};
</script>

<style lang="scss">
.inputfield {
  background-color: #D9D9D9;
  border: none;
  border-radius: 5px;
  padding: 8px 16px;
  font-size: 24px;
  font-weight: 300;
  text-align: center;
  color: #000;
  width: fit-content;

  &:focus {
    outline: 2px solid #000;
    background-color: #c8c8c8;
  }

  &::placeholder {
    color: #000;
    opacity: 0.5;
  }

  &.text-small {
    font-size: 16px;
  }

  &.text-medium {
    font-size: 24px;
  }

  &.text-large {
    font-size: 32px;
  }
}
</style>
