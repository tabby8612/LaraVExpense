<template>
    <section>
        <h1 class="my-3 text-center text-xl font-bold text-blue-500">
            {{ label }}
        </h1>
        <circle-progress
            :is-gradient="true"
            :gradient="{
                angle: 90,
                startColor: 'oklch(62.7% 0.194 149.214)',
                stopColor: 'oklch(52.7% 0.154 150.069)',
            }"
            :show-percent="true"
            :percent="percent"
        />
    </section>
</template>

<script setup>
import 'vue3-circle-progress/dist/circle-progress.css';

import CircleProgress from 'vue3-circle-progress';

const props = defineProps({
    percent: Number,
    label: String,
});
</script>

<style>
.vue3-circular-progressbar .current-counter[data-v-49af6a0a] {
    color: oklch(62.3% 0.214 259.815) !important;
    font-size: 2.5rem;
    font-weight: 500;
}
</style>
