<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { Repeat, Search } from 'lucide-vue-next';
import BarChart from '@/components/charts/BarChart.vue';
import CustomPieChart from '@/components/charts/CustomPieChart.vue';
import { TagsColumnsReport } from '@/components/reports/TagsColumnsReport';
import Button from '@/components/ui/button/Button.vue';
import DataTable from '@/components/ui/dataTable/DataTable.vue';
import CustomSelect from '@/components/ui/select/CustomSelect.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import {
    tagBarChartData,
    taggedTransactions,
    tags,
    transactionTypes,
} from '../../../data/CustomData';

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
            <div class="rounded-lg border border-gray-200 p-4 shadow">
                <div class="mb-5 flex justify-between">
                    <h1
                        class="flex items-center justify-center text-lg font-bold"
                    >
                        Tag Report
                    </h1>
                </div>
                <form>
                    <section class="grid grid-cols-3 gap-5">
                        <div class="flex flex-col gap-1.5">
                            <label for="name" class="text-xs text-gray-400"
                                >Transaction Type</label
                            >
                            <CustomSelect
                                label="Transaction Type"
                                name="transaction_type"
                                :options="transactionTypes"
                            />
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label for="category" class="text-xs text-gray-400"
                                >Tags</label
                            >
                            <CustomSelect
                                label="Tags"
                                name="tags"
                                :options="tags"
                                is-multiple
                            />
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <label for="name" class="text-xs text-gray-400"
                                >Name</label
                            >
                            <input
                                type="text"
                                name="name"
                                v-model="form.name"
                                class="rounded border border-gray-300 px-2 py-1.5 text-sm focus-visible:outline-blue-300"
                            />
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
                        Tags Reports
                    </h1>
                </div>
                <DataTable
                    :columns="TagsColumnsReport"
                    :data="taggedTransactions"
                />
            </div>
        </section>
        <section class="my-3 flex gap-5 p-4">
            <div
                class="h-96 w-1/2 rounded-lg border border-gray-100 p-4 shadow"
            >
                <CustomPieChart
                    :labels="['Tag1', 'Tag2', 'Tag3']"
                    :background-colors="[
                        'oklch(80.8% 0.114 19.571)',
                        'oklch(87.9% 0.169 91.605)',
                        'oklch(79.2% 0.209 151.711)',
                    ]"
                    :values="[55, 65, 75]"
                    :chart-header="{
                        chartTitle: 'Tag Summary',
                    }"
                />
            </div>
            <div
                class="h-96 w-1/2 rounded-lg border border-gray-100 p-4 shadow"
            >
                <BarChart
                    :chart-data="tagBarChartData"
                    :chart-header="{
                        chartTitle: 'Tags By Month',
                    }"
                />
            </div>
        </section>
    </MainLayout>
</template>
