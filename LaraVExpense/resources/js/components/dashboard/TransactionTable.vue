<script setup lang="ts">
import { computed, ref } from 'vue';
import { transactions } from '../../../data/CustomData';
import Button from '../ui/button/Button.vue';

type Transaction = 'incomes' | 'expenses';

const transactionType = ref<Transaction>('incomes');
const currTransactions = computed(() => transactions[transactionType.value]);

function handleTransactionType(type: Transaction) {
    transactionType.value = type;
}
</script>

<template>
    <section id="transactions-table" class="flex flex-col gap-3">
        <div class="flex justify-between">
            <h1 class="text-2xl font-bold">Transactions</h1>
            <div class="rounded-xl bg-gray-200">
                <Button
                    :class="`cursor-pointer rounded-xl text-black ${transactionType === 'incomes' ? 'bg-income text-white hover:bg-income' : 'bg-gray-200 hover:bg-gray-200'}`"
                    @click="handleTransactionType('incomes')"
                    >Income</Button
                >
                <Button
                    :class="`cursor-pointer rounded-xl text-black ${transactionType === 'expenses' ? 'bg-expense text-white hover:bg-expense' : 'bg-gray-200 hover:bg-gray-200'}`"
                    @click="handleTransactionType('expenses')"
                    >Expense</Button
                >
            </div>
        </div>
        <div class="mt-5">
            <table class="w-full">
                <thead>
                    <tr class="text-center">
                        <th>Name</th>
                        <th>Date</th>
                        <th>Account</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tr
                    class="h-10 border-b border-b-gray-200 text-center text-sm"
                    v-for="transcation of currTransactions"
                    :key="transcation.name"
                >
                    <td>{{ transcation.name }}</td>
                    <td>{{ transcation.date }}</td>
                    <td>{{ transcation.account }}</td>
                    <td>{{ transcation.amount }}</td>
                </tr>
            </table>
        </div>
    </section>
</template>
