<script setup lang="ts">
import { ProgressIndicator, ProgressRoot } from 'reka-ui';
import { ref } from 'vue';

const { openingBalance, target } = defineProps<{
    openingBalance: number;
    target: number;
}>();

const progressValue = ref(Number((openingBalance / target) * 100));
</script>

<template>
    <ProgressRoot
        v-model="progressValue"
        class="relative h-2 w-[300px] overflow-hidden rounded-full border border-muted bg-blue-100 dark:bg-stone-950"
    >
        <ProgressIndicator
            class="indicator ease-[cubic-bezier(0.65, 0, 0.35, 1)] relative block h-full w-full overflow-hidden rounded-full bg-green-600 transition-transform duration-[660ms] after:absolute after:inset-0 after:animate-progress after:bg-[linear-gradient(-45deg,_rgba(255,255,255,0.2)_25%,_transparent_25%,_transparent_50%,_rgba(255,255,255,0.2)_50%,_rgba(255,255,255,0.2)_75%,_transparent_75%,_transparent)] after:bg-[length:30px_30px] after:content-['']"
            :style="`transform: translateX(-${100 - progressValue}%)`"
        />
    </ProgressRoot>
</template>
