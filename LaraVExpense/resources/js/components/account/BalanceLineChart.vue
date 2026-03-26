<script setup lang="ts">
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
    Filler,
} from 'chart.js';
import { reactive } from 'vue';
import { Line } from 'vue-chartjs';

const data = reactive({
    labels: [
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'May',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec',
    ],
    datasets: [
        {
            label: 'Balance',
            fill: true,
            backgroundColor: 'rgba(65, 213, 226, 0.2)',
            data: [4000, 3900, 1000, 4000, 3900, 8000, 4000],
            borderWidth: 2,
            borderColor: '#41D5E2',
            tension: 0.4, // optional smooth curve
        },
    ],
});

const options = reactive({
    responsive: true,
    maintainAspectRatio: false,
});

ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
    Filler,
);
</script>

<template>
    <Line :data="data" :options="options">Chart Not Loaded Yet!!</Line>
</template>
