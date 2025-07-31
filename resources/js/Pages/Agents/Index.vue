<script setup>
import { Link } from "@inertiajs/vue3";
const props = defineProps({
    agents: Array,
});
</script>

<template>
    <div>
        <h1>担当者一覧</h1>
        <Link href="/agents/create" class="btn btn-primary mb-2"
            >新規担当者登録</Link
        >
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>名前</th>
                    <th>Email</th>
                    <th>編集</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="ag in agents" :key="agent.id">
                    <td>{{ a.id }}</td>
                    <td>{{ a.name }}</td>
                    <td>{{ a.email }}</td>
                    <td>
                        <Link
                            :href="`/agents/${a.id}/edit`"
                            class="btn btn-warning btn-sm"
                            >編集</Link
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
