<script setup>
import { onMounted, ref } from "vue";

const props = defineProps({
    propertyId: Number,
    agents: Array,
});

const agentList = ref(props.agents);
const allAgents = ref([]);
const selectedAgentId = ref(null);

onMounted(async () => {
    // 全担当者取得
    const res = await fetch("/api/agents");
    allAgents.value = await res.json();
});

const assign = async () => {
    await fetch(`/api/properties/${props.propertyId}/assign`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ agent_id: selectedAgentId.value }),
    });
    // UI更新（本番は再取得推奨）
    agentList.value.push(
        allAgents.value.find((a) => a.id === selectedAgentId.value)
    );
};

const unassign = async (agentId) => {
    await fetch(`/api/properties/${props.propertyId}/unassign`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ agent_id: agentId }),
    });
    agentList.value = agentList.value.filter((a) => a.id !== agentId);
};
</script>

<template>
    <div>
        <h4>担当者一覧</h4>
        <ul>
            <li v-for="agent in agentList" :key="agent.id">
                {{ agent.name }} ({{ agent.email }})
                <button @click="unassign(agent.id)">解除</button>
            </li>
        </ul>

        <h5>担当者割り当て</h5>
        <select v-model="selectedAgentId">
            <option
                v-for="agent in allAgents"
                :key="agent.id"
                :value="agent.id"
            >
                {{ agent.name }}
            </option>
        </select>
        <button @click="assign">割り当て</button>
    </div>
</template>
