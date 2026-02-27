<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { useForm, Head } from '@inertiajs/vue3';

const props = defineProps<{
    task: {
        id: number;
        title: string;
        description: string;
    };
}>();

const form = useForm({
    title: props.task.title || '',
    description: props.task.description || '',
});

const handleSubmit = () => {
    form.put(`/task/${props.task.id}`);
};
</script>

<template>
    <Head title="Edit Task" />

    <AppLayout>
        <div class="mx-auto max-w-2xl p-4">
            <h1 class="mb-4 text-3xl font-bold">Edit Task</h1>
            <form @submit.prevent="handleSubmit" class="space-y-6">
                <div>
                    <Input
                        v-model="form.title"
                        type="text"
                        placeholder="Task title"
                        class="w-full border border-gray-300 px-4 py-2 text-sm dark:border-gray-600"
                    />
                    <InputError :message="form.errors.title" />
                </div>
                <div>
                    <textarea
                        v-model="form.description"
                        placeholder="Task description"
                        class="w-full rounded-md border border-gray-300 px-4 py-2 text-sm dark:border-gray-600 dark:bg-gray-800"
                    ></textarea>
                    <InputError :message="form.errors.description" />
                </div>
                <Button
                    type="submit"
                    class="w-full"
                    :disabled="form.processing"
                >
                    Update Task
                </Button>
            </form>
        </div>
    </AppLayout>
</template>
