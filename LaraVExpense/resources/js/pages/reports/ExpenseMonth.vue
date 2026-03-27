<script setup lang="ts">
import { TransMonthlyColumns } from '@/components/reports/TransMonthlyColumns';
import DataTable from '@/components/ui/dataTable/DataTable.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { ExpenseMonthlyData } from '../../../data/CustomData';
</script>

<template>
    <MainLayout page="reports">
        <section class="p-4">
            <div class="rounded-lg border border-gray-100 p-4 shadow">
                <div class="flex justify-between">
                    <h1
                        class="flex items-center justify-center text-lg font-bold"
                    >
                        Expense Monthly Reports (2016)
                    </h1>
                </div>
                <DataTable
                    :columns="TransMonthlyColumns"
                    :data="ExpenseMonthlyData"
                />
            </div>
        </section>
    </MainLayout>
</template>
