import './bootstrap';
import { createApp, h } from 'vue'
import { createPinia } from 'pinia'
import { createInertiaApp } from '@inertiajs/vue3'

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('../vue/pages/**/*.vue', { eager: true })
        return pages[`../vue/pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(createPinia())
            .mount(el)
    },
})
