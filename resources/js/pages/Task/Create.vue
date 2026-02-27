<template>
    <AppLayout>
        <Head title="Create Task" />
        <div class="mx-auto max-w-2xl p-4">
            <h1 class="mb-4 text-3xl font-bold">Create Task</h1>
            <form @submit.prevent="store" class="space-y-6">
                <InputError v-if="errors.title" :message="errors.title" />
                <Input
                    v-model="form.title"
                    type="text"
                    placeholder="Task title"
                    class="w-full border border-gray-300 px-4 py-2 text-sm dark:border-gray-600"
                />
                <InputError
                    v-if="errors.description"
                    :message="errors.description"
                />
                <textarea
                    v-model="form.description"
                    placeholder="Task description"
                    class="w-full border border-gray-300 px-4 py-2 text-sm dark:border-gray-600"
                ></textarea>
                <Button type="submit" class="w-full">Create Task</Button>
            </form>
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import { defineProps, ref, toRefs } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { useField, useForm } from 'vee-validate';
import { computed, onMounted } from 'vue';
import type { FormErrors } from '@/types';
import { usePage } from '@inertiajs/vue3';

const props = defineProps<{
    errors: FormErrors;
}>();

const { errors } = toRefs(props);

const form = useForm({
    validationSchema: {
        title: '',
        description: '',
    },
});

const { handleSubmit, isSubmitting } = useForm({
    validationSchema: {
        title: 'required',
        description: 'required',
    },
});

const store = handleSubmit(async (values) => {
    const response = (await usePage().props.auth.post('/task', values)) as any;
    if (response.status === 201) {
        usePage().props.router.push({ name: 'task.index' });
    }
});

onMounted(() => {
    usePage().props.router.beforeEach((to, from) => {
        if (!usePage().props.auth.user) {
            return usePage().props.router.push({ name: 'login' });
        }
    });
});
</script>
