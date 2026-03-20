<script setup lang="ts">
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js';
import { reactive } from 'vue';
import { Pie } from 'vue-chartjs';

const data = reactive({
    labels: ['VueJs', 'EmberJs', 'ReactJs', 'AngularJs'],
    datasets: [
        {
            backgroundColor: ['#41B883', '#E46651', '#00D8FF', '#DD1B16'],
            data: [40, 20, 80, 10],
        },
    ],
});

const options = reactive({
    responsive: true,
    maintainAspectRatio: false,
});

ChartJS.register(ArcElement, Tooltip, Legend);
</script>

<template>
    <Pie :data="data" :options="options" />
</template>
