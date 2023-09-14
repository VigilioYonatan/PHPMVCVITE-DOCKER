import "vite/modulepreload-polyfill";
import Alpine from "alpinejs";

Alpine.start();

import { createApp, defineAsyncComponent } from "vue";

for (const el of document.getElementsByClassName("vue-app")) {
    const app = createApp({
        components: {
            HelloWorld: defineAsyncComponent(
                () => import("./components/HelloWorld.vue")
            ),
        },
    });
    app.mount(el);
}
