<script setup lang="ts">
import BarChart from '@/components/charts/BarChart.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { BarChartData } from '../../../data/CustomData';
</script>

<template>
    <MainLayout page="reports">
        <section class="my-3 flex gap-5 p-4">
            <div
                class="h-96 w-1/2 rounded-lg border border-gray-100 p-4 shadow"
            >
                <BarChart
                    :chart-data="BarChartData"
                    :chart-header="{ chartTitle: 'Category Report (Income)' }"
                />
            </div>
            <div
                class="h-96 w-1/2 rounded-lg border border-gray-100 p-4 shadow"
            >
                <BarChart
                    :chart-data="BarChartData"
                    :chart-header="{ chartTitle: 'Category Report (Expense)' }"
                />
            </div>
        </section>
    </MainLayout>
</template>
