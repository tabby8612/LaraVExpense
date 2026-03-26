import type { ColumnDef } from '@tanstack/vue-table';
import { CheckSquare, NotebookPen, Trash2 } from 'lucide-vue-next';
import { ArrowUpDown } from 'lucide-vue-next';

import { h } from 'vue';

import type { Account } from '@/types/dashboard';
import Button from '../ui/button/Button.vue';

export const columns: ColumnDef<Account>[] = [
    {
        accessorKey: 'id',
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
                `${row.getValue('id')}`,
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
        accessorKey: 'openingBalance',
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
                    'Opening Balance',
                    h(ArrowUpDown, { class: 'ml-2 h-4 w-4' }),
                ],
            );
        },
        cell: ({ row }) => {
            const amount = Number.parseFloat(row.getValue('openingBalance'));
            const formatted = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
            }).format(amount);

            return h('div', { class: 'text-center text-xs' }, formatted);
        },
    },
    {
        accessorKey: 'description',
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
                row.getValue('description'),
            );
        },
    },
    {
        accessorKey: 'action',
        header: () => h('div', { class: 'text-center' }, 'Actions'),
        cell: ({ row }) => {
            return [
                h(
                    'div',
                    {
                        class: 'text-lg flex items-center justify-center gap-2',
                    },
                    [
                        h(CheckSquare, {
                            class: 'size-4 text-green-400 text-center cursor-pointer',
                            onClick: () =>
                                console.log(row.original.id + ' detail'),
                        }),
                        h(NotebookPen, {
                            class: 'size-4 text-blue-400 text-center cursor-pointer',
                            onClick: () =>
                                console.log(row.original.id + ' edit'),
                        }),
                        h(Trash2, {
                            class: 'size-4 text-red-400 text-center cursor-pointer',
                            onClick: () =>
                                console.log(row.original.id + ' delete'),
                        }),
                    ],
                ),
            ];
        },
    },
];
