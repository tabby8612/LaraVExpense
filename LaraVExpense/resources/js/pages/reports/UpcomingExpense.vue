<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { Repeat, Search } from 'lucide-vue-next';
import { AccountTransColumns } from '@/components/account/AccountTransColumns';
import BarChart from '@/components/charts/BarChart.vue';
import Button from '@/components/ui/button/Button.vue';
import DataTable from '@/components/ui/dataTable/DataTable.vue';
import CustomSelect from '@/components/ui/select/CustomSelect.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import {
    accounts,
    accountTransactions,
    incomeBarChartData,
    incomeChartData,
    payments,
} from '../../../data/CustomData';
import IncomeCategory from '@/components/transaction/IncomeCategory.vue';
import IncomeSubCategory from '@/components/transaction/IncomeSubCategory.vue';
import { columns } from '@/components/transaction/Columns';
import LineChart from '@/components/charts/LineChart.vue';

const form = useForm({
    name: null,
    accountID: null,
    subCategoryID: null,
    fromDate: null,
    toDate: null,
});
</script>

<template>
    <MainLayout page="reports">
        <section class="p-4">
            <div class="my-3 rounded-lg border border-gray-200 p-4 shadow">
                <div class="flex justify-between">
                    <h1
                        class="flex items-center justify-center text-lg font-bold"
                    >
                        Upcoming Expense Report
                    </h1>
                </div>
                <form>
                    <section class="grid grid-cols-2 gap-5">
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
                            <IncomeCategory />
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label for="category" class="text-xs text-gray-400"
                                >Sub Category</label
                            >
                            <IncomeSubCategory />
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
                        Upcoming Expense Reports
                    </h1>
                </div>
                <DataTable :columns="columns" :data="payments" />
            </div>
        </section>
        <section class="my-3 flex gap-5 p-4">
            <div
                class="h-96 w-1/2 rounded-lg border border-gray-100 p-4 shadow"
            >
                <LineChart
                    :chart-data="incomeChartData"
                    :chart-header="{
                        chartTitle: '12 Monthly Income Chart',
                        chartType: 'income',
                        text: 'in This Year',
                        totalAmount: '$15,200',
                    }"
                />
            </div>
            <div
                class="h-96 w-1/2 rounded-lg border border-gray-100 p-4 shadow"
            >
                <BarChart
                    :chart-data="incomeBarChartData"
                    :chart-header="{
                        chartTitle: 'Upcoming Expense By Category',
                    }"
                />
            </div>
        </section>
    </MainLayout>
</template>
