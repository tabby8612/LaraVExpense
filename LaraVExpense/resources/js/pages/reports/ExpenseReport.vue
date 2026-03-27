<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { Repeat, Search } from 'lucide-vue-next';
import BarChart from '@/components/charts/BarChart.vue';
import LineChart from '@/components/charts/LineChart.vue';
import { TransReportColumns } from '@/components/reports/TransReportColumns';
import IncomeCategory from '@/components/transaction/IncomeCategory.vue';
import IncomeSubCategory from '@/components/transaction/IncomeSubCategory.vue';
import Button from '@/components/ui/button/Button.vue';
import DataTable from '@/components/ui/dataTable/DataTable.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import {
    incomeBarChartData,
    incomeChartData,
    payments,
} from '../../../data/CustomData';

const form = useForm({
    name: null,
    categoryID: null,
    subCategoryID: null,
    fromDate: null,
    toDate: null,
});
</script>

<template>
    <MainLayout page="reports">
        <section class="p-4">
            <div class="my-3 rounded-lg border border-gray-100 p-4 shadow">
                <div class="flex justify-between">
                    <h1
                        class="flex items-center justify-center text-lg font-bold"
                    >
                        Expense Reports
                    </h1>
                </div>
                <form>
                    <section class="mt-3 grid grid-cols-3 gap-5">
                        <div class="flex flex-col gap-1.5">
                            <label for="name" class="text-xs text-gray-400"
                                >Name</label
                            >
                            <input
                                type="text"
                                name="name"
                                v-model="form.name"
                                placeholder="Name"
                                class="rounded border border-gray-300 px-2 py-1.5 text-sm focus-visible:outline-blue-300"
                            />
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label for="category" class="text-xs text-gray-400"
                                >Category</label
                            >
                            <IncomeCategory v-model="form.categoryID" />
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label
                                for="subcategory"
                                class="text-xs text-gray-400"
                                >Sub Category</label
                            >
                            <IncomeSubCategory v-model="form.subCategoryID" />
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label for="from_date" class="text-xs text-gray-400"
                                >From Date</label
                            >
                            <input
                                type="date"
                                name="from_date"
                                v-model="form.fromDate"
                                class="rounded border border-gray-300 px-2 py-1.5 text-sm focus-visible:outline-blue-300"
                            />
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label for="to_date" class="text-xs text-gray-400"
                                >To Date</label
                            >
                            <input
                                type="date"
                                name="to_date"
                                v-model="form.toDate"
                                class="rounded border border-gray-300 px-2 py-1.5 text-sm focus-visible:outline-blue-300"
                            />
                        </div>
                    </section>

                    <div class="mt-10 flex gap-5">
                        <Button
                            class="w-38 cursor-pointer bg-gray-200 text-gray-600 hover:bg-gray-200 hover:text-gray-600"
                            type="button"
                            @click="() => form.reset()"
                        >
                            <Repeat />
                            <p>Reset</p>
                        </Button>
                        <Button
                            class="w-38 cursor-pointer bg-blue-700 text-white hover:bg-blue-700 hover:text-white"
                        >
                            <Search />
                            <p>Search</p>
                        </Button>
                    </div>
                </form>
            </div>
        </section>
        <section class="p-4">
            <div class="rounded-lg border border-gray-100 p-4 shadow">
                <div class="flex justify-between">
                    <h1
                        class="flex items-center justify-center text-lg font-bold"
                    >
                        Expense Reports
                    </h1>
                </div>
                <DataTable :columns="TransReportColumns" :data="payments" />
            </div>
        </section>
        <section class="my-3 flex gap-5 p-4">
            <div
                class="h-96 w-1/2 rounded-lg border border-gray-100 p-4 shadow"
            >
                <LineChart
                    :chart-data="incomeChartData"
                    :chart-header="{
                        chartTitle: '12 Monthly Expense Chart',
                        chartType: 'expense',
                        text: 'in This Year',
                        totalAmount: '$10,200',
                    }"
                />
            </div>
            <div
                class="h-96 w-1/2 rounded-lg border border-gray-100 p-4 shadow"
            >
                <BarChart
                    :chart-data="incomeBarChartData"
                    :chart-header="{ chartTitle: 'Income Chart Data (2026)' }"
                />
            </div>
        </section>
    </MainLayout>
</template>
