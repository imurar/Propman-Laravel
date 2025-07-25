<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import PropertyMap from "../../Components/PropertyMap.vue";
defineProps({ property: Object });
</script>

<template>
    <div>
        <h2>{{ property.name }}</h2>
        <p>住所: {{ property.address }}</p>
        <p>緯度: {{ property.latitude }}, 経度: {{ property.longitude }}</p>
        <PropertyMap
            v-if="property.latitude && property.longitude"
            :lat="property.latitude"
            :lng="property.longitude"
        />

        <h3>担当者</h3>
        <ul>
            <li v-for="agent in property.agents" :key="agent.id">
                {{ agent.name }}
            </li>
        </ul>
        <Link href="/properties">一覧へ戻る</Link>
    </div>
</template>
