import "leaflet/dist/leaflet.css";
import { createApp } from "vue";
import "./bootstrap";
import AgentAssign from "./components/AgentAssign.vue";
import PropertyMap from "./components/PropertyMap.vue";

const app = createApp({});
app.component("property-map", PropertyMap);
app.component("agent-assign", AgentAssign);

app.mount("#vue-property-map");
app.mount("#vue-agent-assign");
