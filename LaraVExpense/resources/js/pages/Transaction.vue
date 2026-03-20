<script setup lang="ts">
import ExpenseForm from '@/components/transaction/ExpenseForm.vue';
import IncomeForm from '@/components/transaction/IncomeForm.vue';
import MainLayout from '@/layouts/MainLayout.vue';
</script>

<template>
    <MainLayout page="transaction">
        <section class="flex gap-5 p-5">
            <IncomeForm />
            <ExpenseForm />
        </section>
    </MainLayout>
</template>
