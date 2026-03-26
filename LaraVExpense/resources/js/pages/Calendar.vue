<script setup lang="ts">
import CustomCalendar from '@/components/CustomCalendar.vue';
import Summary from '@/components/dashboard/Summary.vue';
import MainLayout from '@/layouts/MainLayout.vue';
</script>

<template>
    <MainLayout page="calendar">
        <section class="p-4">
            <div
                class="mx-auto grid w-11/12 grid-cols-1 gap-4 space-x-10 px-4 md:grid-cols-3"
            >
                <Summary variant="income" amount="190000" text="Overall" />
                <Summary variant="expense" amount="19000" text="This Month" />
                <Summary variant="balance" amount="1900" text="This Week" />
            </div>
            <CustomCalendar />
            <!-- <div class="mt-5 rounded-lg border border-gray-100 p-4 shadow">
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
            </div>-->
        </section>
    </MainLayout>
</template>
