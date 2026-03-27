<template>
    <Link :href="link" class="flex flex-col gap-3 text-gray-500">
        <p class="flex items-center gap-3">
            <ChevronRight class="size-4" /> {{ text }}
        </p>
        <hr />
    </Link>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ChevronRight } from 'lucide-vue-next';

defineProps<{
    text: string;
    link: string;
}>();
</script>
