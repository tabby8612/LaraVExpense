<template>
    <div class="mb-4 flex items-start justify-between" v-if="chartHeader">
        <h2 class="text-lg font-bold">{{ chartHeader.chartTitle }}</h2>
    </div>

    <div class="h-75">
        <Bar :data="data" :options="options" />
    </div>
</template>

<script setup lang="ts">
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
} from 'chart.js';
import { reactive } from 'vue';
import { Bar } from 'vue-chartjs';

ChartJS.register(
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend,
);

const options = {
    responsive: true,
    maintainAspectRatio: false,
};

const { chartData } = defineProps<{
    chartData: {
        labels: string[];
        datasets: {
            label: string;
            backgroundColor: string;
            data: number[];
        }[];
    };

    chartHeader?: {
        chartTitle: string;
    };
}>();

const data = reactive(chartData);
</script>
