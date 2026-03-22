<script setup lang="ts">
import { Plus, Upload } from 'lucide-vue-next';
import Summary from '@/components/dashboard/Summary.vue';
import { columns } from '@/components/transaction/Columns';
import IncomeImportDialog from '@/components/transaction/income/IncomeImportDialog.vue';
import Button from '@/components/ui/button/Button.vue';
import DataTable from '@/components/ui/dataTable/DataTable.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { payments } from '../../data/CustomData';
</script>

<template>
    <MainLayout page="income">
        <section class="p-4">
            <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                <Summary variant="income" amount="190000" text="Overall" />
                <Summary variant="income" amount="19000" text="This Month" />
                <Summary variant="income" amount="1900" text="This Week" />
                <Summary variant="income" amount="190" text="Today" />
            </div>
            <div class="mt-5 rounded-lg border border-gray-100 p-4 shadow">
                <div class="flex justify-between">
                    <h1
                        class="flex items-center justify-center text-2xl font-bold"
                    >
                        Income List
                    </h1>
                    <div class="flex items-center gap-3">
                        <IncomeImportDialog>
                            <Button
                                class="flex cursor-pointer gap-2 bg-blue-500 text-white"
                            >
                                <Upload />
                                Import CSV
                            </Button>
                        </IncomeImportDialog>
                        <Button
                            class="flex cursor-pointer gap-2 bg-blue-500 text-white"
                        >
                            <Plus />
                            Add New Income
                        </Button>
                    </div>
                </div>
                <DataTable :columns="columns" :data="payments" />
            </div>
        </section>
    </MainLayout>
</template>
