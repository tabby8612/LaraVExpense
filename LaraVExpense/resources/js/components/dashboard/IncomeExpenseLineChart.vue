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
            label: 'Income',
            fill: true,
            backgroundColor: 'rgba(65, 213, 226, 0.2)',
            data: [40, 39, 10, 40, 39, 80, 40],
            borderWidth: 2,
            borderColor: '#41D5E2',
            tension: 0.4, // optional smooth curve
        },
        {
            label: 'Expense',
            fill: true,
            filled: 'origin',
            backgroundColor: 'rgba(255, 86, 104, 0.2)',
            borderWidth: 2,
            borderColor: '#FF5668',
            tension: 0.4, // optional smooth curve
            data: [20, 29, 5, 20, 55, 85, 30],
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
