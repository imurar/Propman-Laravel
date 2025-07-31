<script setup>
import { onMounted, ref } from "vue";

const props = defineProps({
    propertyId: Number,
    agents: Array,
});

const agentList = ref([...props.agents]); // 担当済みリスト
const allAgents = ref([]); // 全担当者リスト
const selectedAgentId = ref(null); // セレクトボックスで選んだID

onMounted(async () => {
    try {
        const res = await fetch("/api/agents");
        if (!res.ok) throw new Error("担当者の取得に失敗しました");
        allAgents.value = await res.json();
    } catch (e) {
        console.error(e);
    }
});

// 担当者を物件に割り当て
const assign = async () => {
    if (!selectedAgentId.value) return;

    try {
        const res = await fetch(`/api/properties/${props.propertyId}/assign`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
            },
            body: JSON.stringify({ agent_id: selectedAgentId.value }),
        });

        if (!res.ok) throw new Error("割り当てに失敗しました");

        const assignedAgent = allAgents.value.find(
            (a) => a.id === selectedAgentId.value
        );

        if (
            assignedAgent &&
            !agentList.value.some((a) => a.id === assignedAgent.id)
        ) {
            agentList.value.push(assignedAgent);
        }

        selectedAgentId.value = null; // リセット
    } catch (e) {
        console.error(e);
    }
};

// 担当者の割り当て解除
const unassign = async (agentId) => {
    try {
        const res = await fetch(
            `/api/properties/${props.propertyId}/unassign`,
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                },
                body: JSON.stringify({ agent_id: agentId }),
            }
        );

        if (!res.ok) throw new Error("解除に失敗しました");

        agentList.value = agentList.value.filter((a) => a.id !== agentId);
    } catch (e) {
        console.error(e);
    }
};
</script>

<template>
    <div>
        <h4 class="font-bold mb-2">担当者一覧</h4>
        <ul class="mb-4">
            <li
                v-for="agent in agentList"
                :key="agent.id"
                class="flex items-center justify-between mb-1"
            >
                <span>{{ agent.name }} ({{ agent.email }})</span>
                <button
                    @click="unassign(agent.id)"
                    class="text-red-500 text-sm"
                >
                    解除
                </button>
            </li>
        </ul>

        <h5 class="font-semibold mb-1">担当者を追加</h5>
        <div class="flex items-center gap-2">
            <select v-model="selectedAgentId" class="border rounded px-2 py-1">
                <option disabled value="">-- 担当者を選択 --</option>
                <option
                    v-for="agent in allAgents"
                    :key="agent.id"
                    :value="agent.id"
                >
                    {{ agent.name }}
                </option>
            </select>
            <button
                @click="assign"
                class="bg-blue-500 text-white px-3 py-1 rounded"
            >
                割り当て
            </button>
        </div>
    </div>
</template>
