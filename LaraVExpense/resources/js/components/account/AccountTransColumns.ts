import type { ColumnDef } from '@tanstack/vue-table';
import { ArrowUpDown } from 'lucide-vue-next';

import { h } from 'vue';

import type { Transaction } from '@/types/dashboard';
import Button from '../ui/button/Button.vue';

export const AccountTransColumns: ColumnDef<Transaction>[] = [
    {
        accessorKey: 'date',
        header: ({ column }) => {
            return h(
                Button,
                {
                    variant: 'ghost',
                    class: 'flex justify-between items-center mx-auto hover:bg-transparent',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Date', h(ArrowUpDown, { class: 'ml-2 h-4 w-4' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                `${row.getValue('date')}`,
            );
        },
    },
    {
        accessorKey: 'name',
        header: ({ column }) => {
            return h(
                Button,
                {
                    variant: 'ghost',
                    class: 'flex justify-between items-center mx-auto hover:bg-transparent',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Name', h(ArrowUpDown, { class: 'ml-2 h-4 w-4' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                `${row.getValue('name')}`,
            );
        },
    },
    {
        accessorKey: 'category',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'flex justify-between items-center mx-auto hover:bg-transparent',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Category', h(ArrowUpDown, { class: 'ml-2 h-4 w-4' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                row.getValue('category'),
            );
        },
    },
    {
        accessorKey: 'subCategory',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'flex justify-between items-center mx-auto hover:bg-transparent',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => [
                    'Description',
                    h(ArrowUpDown, { class: 'ml-2 h-4 w-4' }),
                ],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                row.getValue('subCategory'),
            );
        },
    },
    {
        accessorKey: 'reference',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'flex justify-between items-center mx-auto hover:bg-transparent',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Reference', h(ArrowUpDown, { class: 'ml-2 h-4 w-4' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                row.getValue('reference'),
            );
        },
    },
    {
        accessorKey: 'note',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'flex justify-between items-center mx-auto hover:bg-transparent',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => [
                    'Description',
                    h(ArrowUpDown, { class: 'ml-2 h-4 w-4' }),
                ],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                row.getValue('note'),
            );
        },
    },
    {
        accessorKey: 'amount',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'flex justify-between items-center mx-auto hover:bg-transparent',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Income', h(ArrowUpDown, { class: 'ml-2 h-4 w-4' })],
            );
        },
        cell: ({ row }) => {
            const isIncome = row.original.type === 'income';
            console.log(row.original.type);
            console.log(isIncome);

            return isIncome
                ? h(
                      'div',
                      { class: 'text-center text-green-400 font-bold' },
                      row.getValue('amount'),
                  )
                : '';
        },
    },
    {
        accessorKey: 'amount',
        header: () => h('div', { class: 'text-center' }, 'Expenses'),
        cell: ({ row }) => {
            const isExpense = row.original.type === 'expense';

            return isExpense
                ? h(
                      'div',
                      { class: 'text-center text-red-400' },
                      row.getValue('amount'),
                  )
                : '';
        },
    },
];
