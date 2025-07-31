<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { defineProps } from "vue";

const props = defineProps({
    Property: Object,
});

const form = useForm({
    name: props.property.name,
    address: props.property.address,
    latitude: props.property.latitude,
    longitude: props.property.longitude,
});

const submit = () => {
    form.put(route("properties.update", props.property.id));
};
</script>

<template>
    <div>
        <h1>物件編集</h1>

        <form @submit.prevent="submit">
            <div class="mb-3">
                <label>物件名</label>
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

            <div class="mb-3">
                <label>住所</label>
                <input
                    v-model="form.address"
                    type="text"
                    class="form-control"
                />

                <div v-if="form.errors.address" style="color: red">
                    {{ form.errors.address }}
                </div>
            </div>

            <div class="mb-3">
                <label>緯度</label>
                <input
                    v-model="form.latitude"
                    type="text"
                    class="form-control"
                />
                <div v-if="form.errors.latitude" style="color: red">
                    {{ form.errors.latitude }}
                </div>
            </div>

            <div class="mb-3">
                <label>経度</label>
                <input
                    v-model="form.longitude"
                    type="text"
                    class="form-control"
                />
                <div v-if="form.errors.longitude" style="color: red">
                    {{ form.errors.longitude }}
                </div>
            </div>

            <button
                type="submit"
                class="btn btn-primary"
                :disabled="form.processing"
            >
                更新
            </button>
            <Link href="/properties">一覧へ戻る</Link>
        </form>
    </div>
</template>
