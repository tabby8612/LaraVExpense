<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import CustomCalendar from '@/components/CustomCalendar.vue';
import Summary from '@/components/dashboard/Summary.vue';
import MainLayout from '@/layouts/MainLayout.vue';
</script>

<template>
    <MainLayout page="calendar">
        <Head title="Calendar" />
        <section class="p-4">
            <div
                class="mx-auto grid w-11/12 grid-cols-1 gap-4 space-x-10 px-4 md:grid-cols-3"
            >
                <Summary variant="income" amount="190000" text="Overall" />
                <Summary variant="expense" amount="19000" text="This Month" />
                <Summary variant="balance" amount="1900" text="This Week" />
            </div>
            <CustomCalendar />
        </section>
    </MainLayout>
</template>
