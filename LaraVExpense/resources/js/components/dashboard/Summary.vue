<script setup lang="ts">
import {
    ChevronsDown,
    ChevronsUp,
    User2,
    UserCheck2,
    UserX2,
    Wallet,
} from 'lucide-vue-next';

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
            :class="`flex items-center rounded px-5 ${variant === 'income' && 'bg-income'} ${variant === 'expense' && 'bg-expense'} ${variant !== 'income' && variant !== 'expense' && 'bg-green-500'}`"
        >
            <ChevronsUp
                class="size-10 text-white"
                v-if="variant === 'income'"
            />
            <ChevronsDown
                class="size-10 text-white"
                v-if="variant === 'expense'"
            />
            <Wallet class="size-10 text-white" v-if="variant === 'balance'" />
            <User2 class="size-10 text-white" v-if="variant === 'users'" />
            <UserCheck2
                class="size-10 text-white"
                v-if="variant === 'active users'"
            />
            <UserX2
                class="size-10 text-white"
                v-if="variant === 'inactive users'"
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
