<script setup lang="ts">
import { Plus } from 'lucide-vue-next';
import Summary from '@/components/dashboard/Summary.vue';
import AddTransDialog from '@/components/transaction/AddTransDialog.vue';
import { columns } from '@/components/transaction/Columns';
import Button from '@/components/ui/button/Button.vue';
import DataTable from '@/components/ui/dataTable/DataTable.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { payments } from '../../data/CustomData';
</script>

<template>
    <MainLayout page="upcomingExpense">
        <section class="p-4">
            <div class="grid grid-cols-2 gap-4 md:grid-cols-3">
                <Summary
                    variant="expense"
                    amount="190000"
                    text="Due this month"
                />
                <Summary
                    variant="expense"
                    amount="19000"
                    text="Due this week"
                />
                <Summary variant="expense" amount="1900" text="Due today" />
            </div>
            <div class="mt-5 rounded-lg border border-gray-100 p-4 shadow">
                <div class="flex justify-between">
                    <h1
                        class="flex items-center justify-center text-lg font-bold text-gray-500"
                    >
                        Upcoming Expense
                    </h1>
                    <div class="flex items-center gap-3">
                        <AddTransDialog>
                            <Button
                                class="flex cursor-pointer gap-2 bg-blue-500 text-white"
                            >
                                <Plus />
                                Add New Expense
                            </Button>
                        </AddTransDialog>
                    </div>
                </div>
                <DataTable :columns="columns" :data="payments" />
            </div>
        </section>
    </MainLayout>
</template>
