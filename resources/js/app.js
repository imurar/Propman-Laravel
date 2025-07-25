import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { createApp, h } from "vue";

createInertiaApp({
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});
