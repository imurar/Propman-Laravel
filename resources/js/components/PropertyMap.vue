<template>
    <div ref="map" style="height: 400px"></div>
</template>

<script setup>
import L from "leaflet";
import { onMounted, ref } from "vue";

const props = defineProps({ lat: Number, lng: Number });
const map = ref(null);

onMounted(() => {
    const leafletMap = L.map(map.value).setView([props.lat, props.lng], 15);
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "&copy; OpenStreetMap contributors",
    }).addTo(leafletMap);
    L.marker([props.lat, props.lng]).addTo(leafletMap);
});
</script>
