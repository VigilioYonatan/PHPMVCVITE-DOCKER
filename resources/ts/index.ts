import "vite/modulepreload-polyfill";

import { createApp, defineAsyncComponent } from "vue";

for (const el of document.getElementsByClassName("vue-app")) {
    const app = createApp({
        components: {
            CarouselHome: defineAsyncComponent(
                () => import("./components/CarouselHome.vue")
            ),
        },
    });
    app.mount(el);
}
