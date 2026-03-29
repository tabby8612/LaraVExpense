<script setup lang="ts">
import {
    TabsContent,
    TabsIndicator,
    TabsList,
    TabsRoot,
    TabsTrigger,
} from 'reka-ui';
import { categoryReportColumns } from '@/components/category/categoryReportColumns';
import { subCategoryReportColumns } from '@/components/category/subCategoryReportColumns';
import DataTable from '@/components/ui/dataTable/DataTable.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { categories, subCategories } from '../../data/CustomData';
</script>

<template>
    <MainLayout page="category">
        <section class="p-6">
            <TabsRoot
                class="flex flex-col rounded-lg border shadow-sm sm:w-75 md:w-full"
                default-value="category"
            >
                <TabsList
                    class="relative flex shrink-0 border-b border-gray-400"
                    aria-label="Category"
                >
                    <TabsIndicator
                        class="absolute bottom-0 left-0 h-0.5 w-full translate-x-1 translate-y-px rounded-full px-8 transition-all duration-300"
                    >
                        <div class="h-full w-full" />
                    </TabsIndicator>
                    <TabsTrigger
                        class="flex h-11.25 flex-1 cursor-default items-center justify-center rounded-tl-md bg-white px-5 text-sm leading-none text-gray-700 outline-none select-none hover:text-blue-500 focus-visible:relative focus-visible:shadow-[0_0_0_2px] focus-visible:shadow-black data-[state=active]:bg-blue-100 data-[state=active]:font-bold data-[state=active]:text-blue-800"
                        value="category"
                    >
                        Category
                    </TabsTrigger>
                    <TabsTrigger
                        class="flex h-11.25 flex-1 cursor-default items-center justify-center rounded-tl-md bg-white px-5 text-sm leading-none text-gray-700 outline-none select-none hover:text-blue-500 focus-visible:relative focus-visible:shadow-[0_0_0_2px] focus-visible:shadow-black data-[state=active]:bg-blue-100 data-[state=active]:font-bold data-[state=active]:text-blue-800"
                        value="subCategory"
                    >
                        Sub Category
                    </TabsTrigger>
                </TabsList>
                <TabsContent
                    class="w-full grow rounded-b-md bg-white p-5 outline-none"
                    value="category"
                >
                    <DataTable
                        :columns="categoryReportColumns"
                        :data="categories"
                    />
                </TabsContent>
                <TabsContent
                    class="w-full grow rounded-b-md bg-white p-5 outline-none"
                    value="subCategory"
                >
                    <DataTable
                        :columns="subCategoryReportColumns"
                        :data="subCategories"
                    />
                </TabsContent>
            </TabsRoot>
        </section>
    </MainLayout>
</template>
