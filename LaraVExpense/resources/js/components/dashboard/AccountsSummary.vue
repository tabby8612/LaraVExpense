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

const data = reactive({
    labels: ['Cash', 'UBL'],
    datasets: [
        {
            label: 'Accounts',
            backgroundColor: '#41D5E2',
            data: [3000, 22000],
        },
    ],
});

const options = {
    responsive: true,
    maintainAspectRatio: false,
};

ChartJS.register(
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend,
);
</script>

<template>
    <section class="h-36">
        <Bar :data="data" :options="options" />
    </section>
</template>
