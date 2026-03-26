<template>
    <!-- <Pie :data="data" :options="options" /> -->
    <Pie :options="options" :data="data" />
</template>

<script setup lang="ts">
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js';
import { reactive } from 'vue';
import { Pie } from 'vue-chartjs';

ChartJS.register(ArcElement, Tooltip, Legend);

const props = defineProps<{
    labels: string[];
    backgroundColors: string[];
    values: number[];
}>();

const data = reactive({
    labels: props.labels,
    datasets: [
        {
            backgroundColor: props.backgroundColors,
            data: props.values,
        },
    ],
});

const options = {
    responsive: true,
    maintainAspectRatio: false,
};
</script>
