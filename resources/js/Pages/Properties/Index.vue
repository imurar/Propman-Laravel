<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({ properties: Array });
</script>

<template>
    <div>
        <h1>物件一覧</h1>
        <Link href="/properties/create" class="btn btn-primary mb-2"
            >新規物件登録</Link
        >
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>物件名</th>
                    <th>住所</th>
                    <th>地図</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="p in properties" :key="p.id">
                    <td>{{ p.id }}</td>
                    <td>{{ p.name }}</td>
                    <td>{{ p.address }}</td>
                    <td>
                        <Link :href="route('properties.show', p.id)">詳細</Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
