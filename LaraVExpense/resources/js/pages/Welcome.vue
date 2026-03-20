<script setup lang="ts">
import AccountsSummary from '@/components/dashboard/AccountsSummary.vue';
import BalanceSummary from '@/components/dashboard/BalanceSummary.vue';
import IncomeExpenseLineChart from '@/components/dashboard/IncomeExpenseLineChart.vue';
import SidebarNavLinks from '@/components/dashboard/SidebarNavLinks.vue';
import Summary from '@/components/dashboard/Summary.vue';
import TransactionPieChart from '@/components/dashboard/TransactionPieChart.vue';
import TransactionTable from '@/components/dashboard/TransactionTable.vue';
import MainLayout from '@/layouts/MainLayout.vue';
</script>

<template>
    <MainLayout>
        <main class="mt-6 mb-10 flex p-2">
            <section class="w-8/12 border-r border-gray-200 px-5">
                <section id="summary" class="flex justify-between gap-5">
                    <div class="w-full px-3">
                        <p>Income</p>
                        <Summary
                            variant="income"
                            amount="$5,000"
                            month="March"
                        />
                    </div>
                    <div class="w-full px-3">
                        <p>Expense</p>
                        <Summary
                            variant="expense"
                            amount="$7,000"
                            month="April"
                        />
                    </div>
                </section>
                <section class="mt-5 min-h-70">
                    <IncomeExpenseLineChart />
                </section>
                <section class="mt-5 flex min-h-70 w-full gap-3">
                    <div class="w-6/12">
                        <TransactionPieChart />
                    </div>
                    <div class="w-6/12">
                        <TransactionPieChart />
                    </div>
                </section>
                <section class="mt-5">
                    <TransactionTable />
                </section>
            </section>
            <aside class="w-4/12 px-5">
                <BalanceSummary />
                <section class="mt-5">
                    <h1 class="text-xl text-gray-500">Account Balance 2026</h1>
                    <AccountsSummary />
                </section>

                <SidebarNavLinks />
            </aside>
        </main>
    </MainLayout>
</template>
