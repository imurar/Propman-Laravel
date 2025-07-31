<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    name: "",
    email: "",
});

const submit = () => {
    form.post(route("agents.store"));
};
</script>

<template>
    <div>
        <h1>新規担当社登録</h1>
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

            <button type="submit" :disabled="form.processing">登録</button>
        </form>
    </div>
</template>
