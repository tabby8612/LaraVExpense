<script setup lang="ts">
import {
    Calendar,
    CalendarSync,
    ChartBarDecreasing,
    ChartPie,
    ChevronsDown,
    ChevronsUp,
    Cog,
    FlagTriangleLeft,
    IterationCw,
    LucideChartBarIncreasing,
    Package,
    Settings2,
    SignpostIcon,
    SlidersVertical,
    Tags,
    Trophy,
    User,
    Wallet,
} from 'lucide-vue-next';

defineProps({
    page: {
        type: String,
        required: true,
        default: 'dashboard',
    },
});
</script>

<template>
    <main class="flex w-full">
        <aside class="flex w-2/12 flex-col gap-7 bg-gray-100 p-3">
            <img
                src="https://moneyprodemo.captivlab.com/upload/istockphoto-1423550966-612x612.jpg"
                alt="money"
                class="size-40 self-center"
            />
            <hr class="border border-gray-400" />

            <nav>
                <ul>
                    <li
                        :class="`my-2 flex cursor-pointer items-center gap-3 rounded-lg px-5 py-2 hover:bg-blue-600 hover:text-white ${page === 'dashboard' && 'bg-blue-600 text-white'}`"
                    >
                        <SlidersVertical class="size-4" />
                        <p class="text-sm">Dashboard</p>
                    </li>
                    <li
                        :class="`my-2 flex cursor-pointer items-center gap-3 rounded-lg px-5 py-2 hover:bg-blue-600 hover:text-white ${page === 'transaction' && 'bg-blue-600 text-white'}`"
                    >
                        <SignpostIcon class="size-4" />
                        <p class="text-sm">Transaction</p>
                    </li>
                    <li
                        :class="`my-2 flex cursor-pointer items-center gap-3 rounded-lg px-5 py-2 hover:bg-blue-600 hover:text-white ${page === 'income' && 'bg-blue-600 text-white'}`"
                    >
                        <LucideChartBarIncreasing class="size-4" />
                        <p class="text-sm">Income</p>
                    </li>
                    <li
                        :class="`my-2 flex cursor-pointer items-center gap-3 rounded-lg px-5 py-2 hover:bg-blue-600 hover:text-white ${page === 'upcomingIncome' && 'bg-blue-600 text-white'}`"
                    >
                        <ChevronsUp class="size-4" />
                        <p class="text-sm">Upcoming Income</p>
                    </li>
                    <li
                        :class="`my-2 flex cursor-pointer items-center gap-3 rounded-lg px-5 py-2 hover:bg-blue-600 hover:text-white ${page === 'expense' && 'bg-blue-600 text-white'}`"
                    >
                        <ChartBarDecreasing class="size-4" />
                        <p class="text-sm">Expense</p>
                    </li>
                    <li
                        :class="`my-2 flex cursor-pointer items-center gap-3 rounded-lg px-5 py-2 hover:bg-blue-600 hover:text-white ${page === 'upcomingExpense' && 'bg-blue-600 text-white'}`"
                    >
                        <ChevronsDown class="size-4" />
                        <p class="text-sm">Upcoming Expense</p>
                    </li>
                    <li
                        :class="`my-2 flex cursor-pointer items-center gap-3 rounded-lg px-5 py-2 hover:bg-blue-600 hover:text-white ${page === 'recurringTransaction' && 'bg-blue-600 text-white'}`"
                    >
                        <CalendarSync class="size-4" />
                        <p class="text-sm">Recurring Transactions</p>
                    </li>
                    <li
                        :class="`my-2 flex cursor-pointer items-center gap-3 rounded-lg px-5 py-2 hover:bg-blue-600 hover:text-white ${page === 'accounts' && 'bg-blue-600 text-white'}`"
                    >
                        <Wallet class="size-4" />
                        <p class="text-sm">Accounts</p>
                    </li>
                    <li
                        :class="`my-2 flex cursor-pointer items-center gap-3 rounded-lg px-5 py-2 hover:bg-blue-600 hover:text-white ${page === 'trackBudget' && 'bg-blue-600 text-white'}`"
                    >
                        <Package class="size-4" />
                        <p class="text-sm">Track Budget</p>
                    </li>
                    <li
                        :class="`my-2 flex cursor-pointer items-center gap-3 rounded-lg px-5 py-2 hover:bg-blue-600 hover:text-white ${page === 'setGoals' && 'bg-blue-600 text-white'}`"
                    >
                        <Trophy class="size-4" />
                        <p class="text-sm">Set Goals</p>
                    </li>
                    <li
                        :class="`my-2 flex cursor-pointer items-center gap-3 rounded-lg px-5 py-2 hover:bg-blue-600 hover:text-white ${page === 'calendar' && 'bg-blue-600 text-white'}`"
                    >
                        <Calendar class="size-4" />
                        <p class="text-sm">Calendar</p>
                    </li>
                    <li
                        :class="`my-2 flex cursor-pointer items-center gap-3 rounded-lg px-5 py-2 hover:bg-blue-600 hover:text-white ${page === 'reports' && 'bg-blue-600 text-white'}`"
                    >
                        <ChartPie class="size-4" />
                        <p class="text-sm">Reports</p>
                    </li>
                    <li
                        :class="`my-2 flex cursor-pointer items-center gap-3 rounded-lg px-5 py-2 hover:bg-blue-600 hover:text-white ${page === 'category' && 'bg-blue-600 text-white'}`"
                    >
                        <FlagTriangleLeft class="size-4" />
                        <p class="text-sm">Category</p>
                    </li>
                    <li
                        :class="`my-2 flex cursor-pointer items-center gap-3 rounded-lg px-5 py-2 hover:bg-blue-600 hover:text-white ${page === 'tags' && 'bg-blue-600 text-white'}`"
                    >
                        <Tags class="size-4" />
                        <p class="text-sm">Tags</p>
                    </li>
                    <li
                        :class="`my-2 flex cursor-pointer items-center gap-3 rounded-lg px-5 py-2 hover:bg-blue-600 hover:text-white ${page === 'settings' && 'bg-blue-600 text-white'}`"
                    >
                        <Settings2 class="size-4" />
                        <p class="text-sm">Settings</p>
                    </li>
                </ul>
            </nav>
        </aside>
        <section id="body" class="w-10/12">
            <header
                class="flex min-h-20 items-center justify-between bg-gray-100 px-3 py-2"
            >
                <h1 class="text-2xl font-black">Lara Expense Tracker</h1>
                <div class="flex gap-5">
                    <p class="flex gap-2">
                        <User />
                        <span>Welcome User</span>
                    </p>
                    <p class="flex gap-2">
                        <Cog />
                        <span>Profile Settings</span>
                    </p>
                    <p class="flex gap-2">
                        <IterationCw />
                        <span>Logout</span>
                    </p>
                </div>
            </header>
            <slot></slot>
            <section class="mt-5 px-3 py-2">
                <footer
                    class="flex justify-end border-t border-t-gray-200 px-3 py-5"
                >
                    <h1>
                        Created with 💖 by
                        <a href="https://tabishsajwani.com/" class="font-bold"
                            >Tabish Sajwani</a
                        >
                    </h1>
                </footer>
            </section>
        </section>
    </main>
</template>
