<script setup lang="ts">
import { AccountTransColumns } from '@/components/account/AccountTransColumns';
import BalanceLineChart from '@/components/account/BalanceLineChart.vue';
import DataTable from '@/components/ui/dataTable/DataTable.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { accountTransactions } from '../../data/CustomData';
</script>

<template>
    <MainLayout page="accounts">
        <section class="p-4">
            <div
                class="flex w-full gap-4 rounded border border-gray-200 p-4 shadow"
            >
                <div class="w-4/12">
                    <h1 class="text-lg font-bold">UBL</h1>
                    <h2 class="text-lg font-bold">200566621</h2>
                    <h1 class="mt-5 text-xl font-black text-green-500">
                        50,00,000
                    </h1>
                    <p class="text-xs">Account Balance</p>
                </div>
                <div class="w-8/12">
                    <BalanceLineChart />
                </div>
            </div>
            <div class="mt-5 rounded-lg border border-gray-100 p-4 shadow">
                <div class="flex justify-between">
                    <h1
                        class="flex items-center justify-center text-2xl font-bold"
                    >
                        Account Transaction Report
                    </h1>
                </div>
                <DataTable
                    :columns="AccountTransColumns"
                    :data="accountTransactions"
                />
            </div>
        </section>
    </MainLayout>
</template>
