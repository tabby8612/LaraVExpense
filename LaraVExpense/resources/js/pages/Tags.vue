<script setup lang="ts">
import { Plus } from 'lucide-vue-next';
import AddTagDialog from '@/components/tags/AddTagDialog.vue';
import { TagColumns } from '@/components/tags/TagColumns';
import Button from '@/components/ui/button/Button.vue';
import DataTable from '@/components/ui/dataTable/DataTable.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { tags } from '../../data/CustomData';
</script>

<template>
    <MainLayout page="tags">
        <section class="p-4">
            <div class="mt-5 rounded-lg border border-gray-100 p-4 shadow">
                <div class="flex justify-between">
                    <h1
                        class="flex items-center justify-center text-2xl font-bold"
                    >
                        Tags Management
                    </h1>
                    <div class="flex items-center gap-3">
                        <AddTagDialog>
                            <Button
                                class="flex cursor-pointer gap-2 bg-blue-500 text-white hover:bg-blue-700"
                            >
                                <Plus />
                                Add Tag
                            </Button>
                        </AddTagDialog>
                    </div>
                </div>
                <DataTable :columns="TagColumns" :data="tags" />
            </div>
        </section>
    </MainLayout>
</template>
