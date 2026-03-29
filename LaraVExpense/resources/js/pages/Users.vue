<script setup lang="ts">
import { Plus } from 'lucide-vue-next';
import Summary from '@/components/dashboard/Summary.vue';
import Button from '@/components/ui/button/Button.vue';
import DataTable from '@/components/ui/dataTable/DataTable.vue';
import AddUserDialog from '@/components/users/AddUserDialog.vue';
import { UsersColumns } from '@/components/users/UsersColumn';
import MainLayout from '@/layouts/MainLayout.vue';
import { users } from '../../data/CustomData';
</script>

<template>
    <MainLayout page="income">
        <section class="p-4">
            <div class="grid grid-cols-2 gap-4 md:grid-cols-3">
                <Summary variant="users" amount="6" text="Total Users" />
                <Summary
                    variant="active users"
                    amount="6"
                    text="Active Users"
                />
                <Summary
                    variant="inactive users"
                    amount="0"
                    text="Inactive Users"
                />
            </div>
            <div class="mt-5 rounded-lg border border-gray-100 p-4 shadow">
                <div class="flex justify-between">
                    <h1
                        class="flex items-center justify-center text-2xl font-bold"
                    >
                        Users List
                    </h1>
                    <div class="flex items-center gap-3">
                        <AddUserDialog>
                            <Button
                                class="flex cursor-pointer gap-2 bg-blue-500 text-white hover:bg-blue-700"
                            >
                                <Plus />
                                Add New User
                            </Button>
                        </AddUserDialog>
                    </div>
                </div>
                <DataTable :columns="UsersColumns" :data="users" />
            </div>
        </section>
    </MainLayout>
</template>
