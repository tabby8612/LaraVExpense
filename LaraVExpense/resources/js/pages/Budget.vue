<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { Plus } from 'lucide-vue-next';
import AddBudgetDialog from '@/components/budget/AddBudgetDialog.vue';
import { budgetColumns } from '@/components/budget/BudgetColumns';
import Button from '@/components/ui/button/Button.vue';
import DataTable from '@/components/ui/dataTable/DataTable.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { budgets } from '../../data/CustomData';
</script>

<template>
    <Head title="Track Budget" />
    <MainLayout page="trackBudget">
        <section class="p-4">
            <div class="mt-5 rounded-lg border border-gray-100 p-4 shadow">
                <div class="flex items-center justify-between">
                    <h1
                        class="flex items-center justify-center text-lg font-bold"
                    >
                        Budget List
                    </h1>
                    <div class="flex items-center gap-3">
                        <AddBudgetDialog>
                            <Button
                                class="flex cursor-pointer gap-2 bg-blue-500 text-white"
                            >
                                <Plus />
                                Add New Budget
                            </Button>
                        </AddBudgetDialog>
                    </div>
                </div>
                <DataTable
                    :columns="budgetColumns"
                    :data="budgets"
                    expandedType="budget"
                />
            </div>
        </section>
    </MainLayout>
</template>
