import type { ColumnDef } from '@tanstack/vue-table';
import { NotebookPen, Trash2 } from 'lucide-vue-next';
import { ArrowUpDown } from 'lucide-vue-next';

import { h } from 'vue';

import type { Category } from '@/types/dashboard';
import Button from '../ui/button/Button.vue';

export const categoryReportColumns: ColumnDef<Category>[] = [
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
                { class: 'text-center font-bold' },
                `${row.getValue('name')}`,
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
        accessorKey: 'color',
        header: () => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'flex justify-between items-center mx-auto hover:bg-transparent',
                },
                () => ['Color'],
            );
        },
        cell: ({ row }) => {
            const color = row.getValue('color') as string;

            return h(
                'div',
                {
                    class: `size-5 rounded flex justify-center items-center mx-auto`,
                    style: { backgroundColor: color },
                },
                h(
                    'span',
                    {
                        class: 'size-5 rounded border border-gray-300',
                        style: { backgroundColor: color },
                    },
                    `${''}`,
                ),
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
