<script setup lang="ts">
import { TransMonthlyColumns } from '@/components/reports/TransMonthlyColumns';
import DataTable from '@/components/ui/dataTable/DataTable.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { IncomeMonthlyData } from '../../../data/CustomData';
</script>

<template>
    <MainLayout page="reports">
        <section class="p-4">
            <div class="rounded-lg border border-gray-100 p-4 shadow">
                <div class="flex justify-between">
                    <h1
                        class="flex items-center justify-center text-lg font-bold"
                    >
                        Income Monthly Reports (2016)
                    </h1>
                </div>
                <DataTable
                    :columns="TransMonthlyColumns"
                    :data="IncomeMonthlyData"
                />
            </div>
        </section>
    </MainLayout>
</template>
