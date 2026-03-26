<script setup lang="ts">
import { Plus } from 'lucide-vue-next';
import AddGoalDialog from '@/components/goals/AddGoalDialog.vue';
import { goalColumns } from '@/components/goals/GoalColumns';
import Button from '@/components/ui/button/Button.vue';
import DataTable from '@/components/ui/dataTable/DataTable.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { goals } from '../../data/CustomData';
</script>

<template>
    <MainLayout page="setGoals">
        <section class="p-4">
            <div class="mt-5 rounded-lg border border-gray-100 p-4 shadow">
                <div class="flex justify-between">
                    <h1
                        class="flex items-center justify-center text-2xl font-bold"
                    >
                        Goal List
                    </h1>
                    <div class="flex items-center gap-3">
                        <AddGoalDialog>
                            <Button
                                class="flex cursor-pointer gap-2 bg-blue-500 text-white"
                            >
                                <Plus />
                                Add Goal
                            </Button>
                        </AddGoalDialog>
                    </div>
                </div>
                <DataTable :columns="goalColumns" :data="goals" />
            </div>
        </section>
    </MainLayout>
</template>
