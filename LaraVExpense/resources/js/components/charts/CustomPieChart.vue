<template>
    <div class="mb-4 flex items-start justify-between" v-if="chartHeader">
        <h2 class="text-lg font-bold">{{ chartHeader.chartTitle }}</h2>
    </div>

    <div class="h-75">
        <Pie :options="options" :data="data" />
    </div>
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
    chartHeader?: {
        chartTitle: string;
    };
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
