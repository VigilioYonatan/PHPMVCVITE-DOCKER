import { createApp } from "vue";
import HelloWorld from "./components/HelloWorld.vue";

for (const el of document.getElementsByClassName("vue-app")) {
    const app = createApp({ components: { HelloWorld } });
    app.mount(el);
}
