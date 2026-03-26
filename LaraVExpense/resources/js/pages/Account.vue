<script setup lang="ts">
import { Plus } from 'lucide-vue-next';
import { columns } from '@/components/account/Column';
import Button from '@/components/ui/button/Button.vue';
import DataTable from '@/components/ui/dataTable/DataTable.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { allAccounts } from '../../data/CustomData';
</script>

<template>
    <MainLayout page="accounts">
        <section class="p-4">
            <div class="mt-5 rounded-lg border border-gray-100 p-4 shadow">
                <div class="flex justify-between">
                    <h1
                        class="flex items-center justify-center text-2xl font-bold text-gray-500"
                    >
                        Account List
                    </h1>
                    <div class="flex items-center gap-3">
                        <Button
                            class="flex cursor-pointer gap-2 bg-blue-500 text-white"
                        >
                            <Plus />
                            Add New Account
                        </Button>
                    </div>
                </div>
                <DataTable :columns="columns" :data="allAccounts" />
            </div>
        </section>
    </MainLayout>
</template>
