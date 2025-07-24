<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({ properties: Array });
</script>

<template>
    <div>
        <h1>物件一覧</h1>
        <Link href="/properties/create" class="btn btn-primary"
            >新規物件登録</Link
        >
        <ul>
            <li v-for="property in properties" :key="property.id">
                <Link :href="`/properties/${property.id}`">{{
                    property.name
                }}</Link>
                <span
                    >担当者:
                    {{ property.agents.map((a) => a.name).join(", ") }}</span
                >
            </li>
        </ul>
    </div>
</template>
