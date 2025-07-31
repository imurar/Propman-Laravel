<script setup>
import AgentAssign from "@components/AgentAssign.vue";
import PropertyMap from "@components/PropertyMap.vue";
import { Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    property: Object,
});
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
            <li v-for="a in property.agents" :key="a.id">
                <AgentAssign :agent="a" :property-id="property.id" />
            </li>
        </ul>
        <Link href="/properties">一覧へ戻る</Link>
    </div>
</template>
