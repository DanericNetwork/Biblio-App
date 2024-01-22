import './bootstrap';
import { createApp, h } from 'vue'
import { createPinia } from 'pinia'
import { createInertiaApp, Link } from '@inertiajs/vue3'
import ToastPlugin from "vue-toastification";
import "vue-toastification/dist/index.css";
import '@scss/global.scss';
import VueApexCharts from "vue3-apexcharts";

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('../vue/pages/**/*.vue', { eager: true })
    return pages[`../vue/pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(createPinia())
      .use(ToastPlugin)
      .use(VueApexCharts)
      .component('InertiaLink', Link)
      .mount(el)
  },
})
