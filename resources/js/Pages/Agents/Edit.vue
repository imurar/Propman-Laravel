<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    agent: Object,
});

const form = useForm({
    name: props.agent.name,
    email: props.agent.email,
});

const submit = () => {
    form.put(route("agent.update", props.agent.id));
};
</script>

<template>
    <div>
        <h1>担当者編集</h1>
        <form @submit.prevent="submit">
            <div>
                <label>名前</label>
                <input
                    v-model="form.name"
                    type="text"
                    class="form-control"
                    required
                />
                <div v-if="form.errors.name" style="color: red">
                    {{ form.errors.name }}
                </div>
            </div>

            <div>
                <label>Email</label>
                <input
                    v-model="form.email"
                    type="email"
                    class="form-control"
                    required
                />
                <div v-if="form.errors.email" style="color: red">
                    {{ form.errors.email }}
                </div>
            </div>

            <button
                type="submit"
                class="btn btn-primary"
                :disabled="form.processing"
            >
                更新
            </button>
            <Link href="/agents">一覧へ戻る</Link>
        </form>
    </div>
</template>
