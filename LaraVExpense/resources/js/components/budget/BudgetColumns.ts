import type { ColumnDef, Row } from '@tanstack/vue-table';
import { NotebookPen, Trash2 } from 'lucide-vue-next';
import { ArrowUpDown } from 'lucide-vue-next';

import { h } from 'vue';

import type { Budget } from '@/types/dashboard';
import Button from '../ui/button/Button.vue';

function renderExpanded(row: Row<Budget>) {
    if (!row.getCanExpand()) {
        return h(Text, '🔵');
    }

    return h(
        'button',
        {
            onClick: row.getToggleExpandedHandler(),
            class: 'font-black text-blue-400 cursor-pointer text-xl w-full text-right',
        },
        row.getIsExpanded() ? '-' : '+',
    );
}

export const budgetColumns: ColumnDef<Budget>[] = [
    {
        id: 'expand',
        header: () => null,
        cell: ({ row }) => renderExpanded(row),
    },
    {
        accessorKey: 'category',
        header: ({ column }) => {
            return h(
                Button,
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
                { class: 'text-center' },
                `${row.getValue('category')}`,
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
                    'Sub Category',
                    h(ArrowUpDown, { class: 'ml-2 h-4 w-4' }),
                ],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center ' },
                row.getValue('subCategory'),
            );
        },
    },
    {
        accessorKey: 'plannedAmount',
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
                    'Planned Amount',
                    h(ArrowUpDown, { class: 'ml-2 h-4 w-4' }),
                ],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center ' },
                row.getValue('plannedAmount'),
            );
        },
    },
    {
        accessorKey: 'month',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'flex justify-between items-center mx-auto hover:bg-transparent',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Month', h(ArrowUpDown, { class: 'ml-2 h-4 w-4' })],
            );
        },
        cell: ({ row }) => {
            return h('div', { class: 'text-center' }, `${row.original.month}`);
        },
    },
    {
        accessorKey: 'year',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'flex justify-between items-center mx-auto hover:bg-transparent',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Year', h(ArrowUpDown, { class: 'ml-2 h-4 w-4' })],
            );
        },
        cell: ({ row }) => {
            return h('div', { class: 'text-center' }, `${row.original.year}`);
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
                        h(NotebookPen, {
                            class: 'size-4 text-blue-400 text-center cursor-pointer',
                            onClick: () =>
                                console.log(row.original.id + 'edit'),
                        }),
                        h(Trash2, {
                            class: 'size-4 text-red-400 text-center cursor-pointer',
                            onClick: () =>
                                console.log(row.original.id + 'delete'),
                        }),
                    ],
                ),
            ];
        },
    },
];
