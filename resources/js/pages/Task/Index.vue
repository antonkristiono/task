<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { Button } from '@/components/ui/button';

interface Task {
    id: number;
    title: string;
    description: string;
    status: string;
}

defineProps<{
    tasks: Task[];
}>();
</script>

<template>
    <Head title="Tasks" />

    <AppLayout>
        <div class="flex flex-col gap-4 p-4">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold">Task List</h2>
                <Button>
                    <Link
                        :href="`/task/create`"
                        class="text-white hover:underline dark:text-black"
                    >
                        Create Task
                    </Link>
                </Button>
            </div>

            <template v-if="tasks.length">
                <ul class="flex flex-col gap-3">
                    <li
                        v-for="task in tasks"
                        :key="task.id"
                        class="rounded-lg border bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800"
                    >
                        <div class="flex items-start justify-between gap-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold">
                                    {{ task.title }}
                                </h3>
                                <p
                                    v-if="task.description"
                                    class="mt-1 text-sm text-gray-500 dark:text-gray-400"
                                >
                                    {{ task.description }}
                                </p>
                                <span
                                    class="mt-2 inline-block rounded-full px-2 py-0.5 text-xs font-medium"
                                    :class="{
                                        'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300':
                                            task.status === 'pending',
                                        'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300':
                                            task.status === 'completed',
                                        'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300':
                                            task.status === 'in_progress',
                                    }"
                                >
                                    {{ task.status }}
                                </span>
                            </div>
                            <div class="flex items-center gap-3">
                                <Link
                                    :href="`/task/${task.id}/edit`"
                                    class="text-sm text-blue-500 hover:underline"
                                >
                                    Edit
                                </Link>
                                <Link
                                    :href="`/task/${task.id}`"
                                    method="delete"
                                    as="button"
                                    class="text-sm text-red-500 hover:underline"
                                >
                                    Delete
                                </Link>
                            </div>
                        </div>
                    </li>
                </ul>
            </template>
            <template v-else>
                <div class="p-4 text-center text-gray-500">
                    No tasks found. Create one!
                </div>
            </template>
        </div>
    </AppLayout>
</template>
