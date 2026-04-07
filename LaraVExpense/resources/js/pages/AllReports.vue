<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import ReportLink from '@/components/reports/ReportLink.vue';
import MainLayout from '@/layouts/MainLayout.vue';
</script>

<template>
    <Head title="All Reports" />
    <MainLayout page="reports">
        <section class="p-10">
            <div class="my-5 rounded-lg border border-gray-100 p-4 shadow">
                <div class="flex justify-between border-b">
                    <h1
                        class="my-3 flex items-center justify-center text-2xl font-bold"
                    >
                        All Reports
                    </h1>
                </div>

                <section class="mt-10 grid grid-cols-2 gap-5">
                    <div class="flex flex-col gap-7">
                        <ReportLink text="Income Reports" link="/" />
                        <ReportLink text="Expense Reports" link="/" />
                        <ReportLink text="Income vs Expense Reports" link="/" />
                        <ReportLink text="Upcoming Income" link="/" />
                        <ReportLink text="Category Reports" link="/" />
                    </div>
                    <div class="flex flex-col gap-7">
                        <ReportLink text="Income Monthly Reports" link="/" />
                        <ReportLink text="Expense Monthly Reports" link="/" />
                        <ReportLink text="Transaction Reports" link="/" />
                        <ReportLink text="Upcoming Expense" link="/" />
                        <ReportLink text="Tag Reports" link="/" />
                    </div>
                </section>
            </div>
        </section>
    </MainLayout>
</template>
