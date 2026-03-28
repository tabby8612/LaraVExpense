import type { ColumnDef } from '@tanstack/vue-table';
import { NotebookPen, Trash2 } from 'lucide-vue-next';
import { ArrowUpDown } from 'lucide-vue-next';

import { h } from 'vue';

import type { SubCategory } from '@/types/dashboard';
import Button from '../ui/button/Button.vue';

export const incomeSubCategoryReportColumns: ColumnDef<SubCategory>[] = [
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
                () => [
                    'Sub Category ID',
                    h(ArrowUpDown, { class: 'ml-2 h-4 w-4' }),
                ],
            );
        },
        cell: ({ row }) => {
            return h('div', { class: 'text-center' }, `${row.getValue('id')}`);
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
                { class: 'text-center ' },
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
                { class: 'text-center ' },
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
