<script setup lang="ts">
import { ChevronsDown, ChevronsUp } from 'lucide-vue-next';

defineProps({
    variant: {
        type: String,
        required: true,
    },
    amount: {
        type: String,
        required: true,
    },
    text: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <section class="flex">
        <div
            :class="`flex items-center rounded px-3 ${variant === 'income' ? 'bg-income' : 'bg-expense'}`"
        >
            <ChevronsUp
                class="size-16 text-white"
                v-if="variant === 'income'"
            />
            <ChevronsDown
                class="size-16 text-white"
                v-if="variant === 'expense'"
            />
        </div>
        <div
            class="flex w-full flex-col gap-2 rounded-lg bg-gray-100 px-10 py-4"
        >
            <p class="text-2xl text-gray-500">{{ amount }}</p>
            <p class="text-sm text-gray-600">({{ text }})</p>
        </div>
    </section>
</template>
