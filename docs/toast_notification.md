# Create a toast notification

we're using [vue-toastification](https://github.com/Maronato/vue-toastification) to create toast notifications.

``component.vue``
```html
<template>
  <div>
    <button @click="openToast">Open Toast</button>
  </div>
</template>

<script>
import { useToast } from "vue-toastification";
export default {
  methods: {
    openToast() {
      const toast = useToast();
      toast.success("Hello World!");
    },
  },
};
</script>

```
