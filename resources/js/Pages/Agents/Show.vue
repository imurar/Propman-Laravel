<script setup>
const props = defineProps({
    agent: Object,
});
</script>

<template>
    <div>
        <h1>担当者詳細</h1>
        <p><strong>ID:</strong> {{ agent.id }}</p>
        <p><strong>名前:</strong> {{ agent.name }}</p>
        <p><strong>Email:</strong> {{ agent.email }}</p>
    </div>
    <Link href="/agents">一覧へ戻る</Link>
</template>
