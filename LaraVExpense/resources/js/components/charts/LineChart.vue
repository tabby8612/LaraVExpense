<script setup lang="ts">
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Tooltip,
    Legend,
    Filler,
} from 'chart.js';
import { reactive } from 'vue';
import { Line } from 'vue-chartjs';
import { cn } from '@/lib/utils';

const { chartData } = defineProps<{
    chartData: {
        labels: string[];
        datasets: {
            label: string;
            fill: boolean;
            backgroundColor: string;
            data: number[];
            borderWidth: number;
            borderColor: string;
            tension: number;
        }[];
    };
    chartHeader?: {
        chartTitle: string;
        totalAmount: string;
        text: string;
        chartType: 'income' | 'expense';
    };
    chartClass?: string;
}>();

const data = reactive(chartData);

const options = reactive({
    responsive: true,
    maintainAspectRatio: false,
});

ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Tooltip,
    Legend,
    Filler,
);
</script>

<template>
    <div class="h-full w-full">
        <div class="mb-4 flex items-start justify-between" v-if="chartHeader">
            <h2 class="text-lg font-bold">{{ chartHeader.chartTitle }}</h2>

            <div class="text-right">
                <p
                    :class="`text-base font-semibold ${chartHeader.chartType === 'income' && 'text-green-600'} ${chartHeader.chartType === 'expense' && 'text-red-700'}`"
                >
                    {{ chartHeader.totalAmount }}
                </p>
                <p class="text-sm text-gray-500">{{ chartHeader.text }}</p>
            </div>
        </div>

        <div :class="cn(`h-75 ${chartClass}`)">
            <Line :data="data" :options="options">Chart Not Loaded Yet!!</Line>
        </div>
    </div>
</template>
