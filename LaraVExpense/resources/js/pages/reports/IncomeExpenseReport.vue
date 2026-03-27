<script setup lang="ts">
import LineChart from '@/components/charts/LineChart.vue';
import Summary from '@/components/dashboard/Summary.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { transChartData } from '../../../data/CustomData';
</script>

<template>
    <MainLayout page="reports">
        <section class="p-4">
            <section class="mt-5 rounded-lg">
                <div class="grid grid-cols-2 gap-4 md:grid-cols-3">
                    <Summary
                        variant="income"
                        amount="190000"
                        text="Due this month"
                    />
                    <Summary
                        variant="expense"
                        amount="19000"
                        text="Due this week"
                    />
                    <Summary variant="balance" amount="1900" text="Due today" />
                </div>
            </section>
        </section>
        <section class="my-3 flex gap-5 p-4">
            <div
                class="h-full w-full rounded-lg border border-gray-100 p-4 shadow"
            >
                <LineChart
                    :chart-data="transChartData"
                    :chart-header="{
                        chartTitle: 'Income vs. Expense Chart',
                        chartType: 'expense',
                        text: '',
                        totalAmount: '',
                    }"
                    chartClass="h-100"
                />
            </div>
        </section>
    </MainLayout>
</template>
