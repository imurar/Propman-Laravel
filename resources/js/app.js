import "leaflet/dist/leaflet.css";
import { createApp } from "vue";
import "./bootstrap";
import PropertyMap from "./components/PropertyMap.vue";

const app = createApp({});
app.component("property-map", PropertyMap);
app.mount("#vue-property-map");
