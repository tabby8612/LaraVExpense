<script setup lang="ts">
import { ChevronRight } from 'lucide-vue-next';
</script>

<template>
    <section class="mt-5 rounded bg-gray-100 px-3 pt-5 pb-10">
        <h1 class="text-xl font-light text-gray-500">Quick Menu</h1>
        <ul class="mt-3">
            <li
                class="group flex cursor-pointer justify-between border-b border-gray-600/20 py-2 text-gray-500"
            >
                <p class="text-sm group-hover:text-blue-400">Transactions</p>
                <ChevronRight class="group-hover:text-blue-400" />
            </li>
            <li
                class="group flex cursor-pointer justify-between border-b border-gray-600/20 py-2 text-gray-500"
            >
                <p class="text-sm group-hover:text-blue-400">Income Reports</p>
                <ChevronRight class="group-hover:text-blue-400" />
            </li>
            <li
                class="group flex cursor-pointer justify-between border-b border-gray-600/20 py-2 text-gray-500"
            >
                <p class="text-sm group-hover:text-blue-400">Expense Reports</p>
                <ChevronRight class="group-hover:text-blue-400" />
            </li>
            <li
                class="group flex cursor-pointer justify-between border-b border-gray-600/20 py-2 text-gray-500"
            >
                <p class="text-sm group-hover:text-blue-400">
                    Account Transaction Reports
                </p>
                <ChevronRight class="group-hover:text-blue-400" />
            </li>
        </ul>
    </section>
</template>
