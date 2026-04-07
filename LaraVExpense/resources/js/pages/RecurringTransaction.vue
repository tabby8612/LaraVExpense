<script setup lang="ts">
import { Plus } from 'lucide-vue-next';
import AddRecurrTransDialog from '@/components/transaction/AddRecurrTransDialog.vue';
import { RecurrTransColumns } from '@/components/transaction/income/RecurrTransColumns';
import { Button } from '@/components/ui/button';
import DataTable from '@/components/ui/dataTable/DataTable.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { RecurringTransactions } from '../../data/CustomData';
</script>

<template>
    <MainLayout page="recurringTransaction">
        <section class="p-4">
            <div class="mt-5 rounded-lg border border-gray-100 p-4 shadow">
                <div class="flex justify-between">
                    <h1
                        class="flex items-center justify-center text-lg font-bold text-gray-500"
                    >
                        Recurring Transactions
                    </h1>
                    <div class="flex items-center gap-3">
                        <AddRecurrTransDialog>
                            <Button
                                class="flex cursor-pointer gap-2 bg-blue-500 text-white hover:bg-blue-800"
                            >
                                <Plus />
                                Add Recurring Transaction
                            </Button>
                        </AddRecurrTransDialog>
                    </div>
                </div>
                <DataTable
                    :columns="RecurrTransColumns"
                    :data="RecurringTransactions"
                />
            </div>
        </section>
    </MainLayout>
</template>
