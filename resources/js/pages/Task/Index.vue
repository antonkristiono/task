<template>
    <AppLayout>
        <div class="flex flex-col gap-4">
            <h2 class="mt-4 ml-4 text-2xl font-bold">Task List</h2>
            <template v-if="tasks.length">
                <ul class="flex flex-col gap-2">
                    <li
                        v-for="task in tasks"
                        :key="task.id"
                        class="rounded-lg bg-white p-4 shadow-md"
                    >
                        <div class="flex items-center justify-between">
                            <Link
                                :href="`/task/${task.id}/edit`"
                                class="text-blue-500 hover:underline"
                            >
                                Edit
                            </Link>
                            <Link
                                :href="`/task/${task.id}/delete`"
                                class="text-red-500 hover:underline"
                            >
                                Delete
                            </Link>
                        </div>
                        <p class="font-medium">{{ task.name }}</p>
                    </li>
                </ul>
            </template>
            <template v-else>
                <div class="mr-6 flex items-center justify-end">
                    <Button>
                        <Link
                            :href="`/task/create`"
                            class="text-blue-500 hover:underline"
                        >
                            Create Task
                        </Link>
                    </Button>
                </div>
            </template>
            <!-- <ul class="flex flex-col gap-2">
                <li
                    v-for="task in tasks"
                    :key="task.id"
                    class="rounded-lg bg-white p-4 shadow-md"
                >
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <Link
                                :href="`/task/${task.id}/edit`"
                                class="text-blue-500 hover:underline"
                            >
                                Edit
                            </Link>
                            <Link
                                :href="`/task/${task.id}/delete`"
                                class="text-red-500 hover:underline"
                            >
                                Delete
                            </Link>
                        </div>
                        <p class="font-medium">{{ task.name }}</p>
                    </div>
                </li>
            </ul> -->
        </div>
    </AppLayout>
</template>

<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import Button from '@/components/ui/button/Button.vue';
import { Link } from '@inertiajs/vue3';

// show list of tasks

const props = defineProps({
    tasks: {
        type: Array,
        required: true,
    },
});

console.log(props.tasks);

// export default {
//     props: {
//         tasks: {
//             type: Array,
//             required: true,
//         },
//     },
// };
</script>
