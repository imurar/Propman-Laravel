<template>
    <div id="map" style="height: 400px"></div>
</template>

<script setup>
import L from "leaflet";
import { onMounted } from "vue";

const props = defineProps({
    lat: {
        type: Number,
        required: true,
    },
    lng: {
        type: Number,
        required: true,
    },
});

onMounted(() => {
    const map = L.map("map").setView([props.lat, props.lng], 15);
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "&copy; OpenStreetMap contributors",
    }).addTo(map);
    L.marker([props.lat, props.lng]).addTo(map);
});
</script>
