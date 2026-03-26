import type { ColumnDef } from '@tanstack/vue-table';
import { NotebookPen, Plus, Trash2 } from 'lucide-vue-next';
import { ArrowUpDown } from 'lucide-vue-next';
import { h } from 'vue';
import type { Goal } from '@/types/dashboard';
import CustomProgressBar from '../CustomProgressBar.vue';
import Button from '../ui/button/Button.vue';

export const goalColumns: ColumnDef<Goal>[] = [
    {
        accessorKey: 'name',
        header: ({ column }) => {
            return h(
                Button,
                {
                    variant: 'ghost',
                    class: 'flex justify-between items-center hover:bg-transparent',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Name', h(ArrowUpDown, { class: 'ml-2 h-4 w-4' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'pl-3 text-xs' },
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
                    class: 'flex justify-between items-center  hover:bg-transparent',
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

            return h('div', { class: 'pl-3 text-xs' }, formatted);
        },
    },
    {
        accessorKey: 'target',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'flex justify-between items-center hover:bg-transparent',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Target', h(ArrowUpDown, { class: 'ml-2 h-4 w-4' })],
            );
        },
        cell: ({ row }) => {
            const amount = Number.parseFloat(row.getValue('target'));
            const formatted = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
            }).format(amount);

            return h('div', { class: 'pl-3 text-xs' }, formatted);
        },
    },
    {
        id: 'remaining',
        header: () => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'flex justify-between items-center hover:bg-transparent',
                },
                () => ['Remaining'],
            );
        },
        enableHiding: true,
        cell: ({ row }) => {
            const rowOriginal = row.original as Goal;

            return h(CustomProgressBar, {
                openingBalance: rowOriginal.openingBalance,
                target: rowOriginal.target,
            });
        },
    },
    {
        accessorKey: 'date',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'flex justify-between items-center hover:bg-transparent',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Date', h(ArrowUpDown, { class: 'ml-2 h-4 w-4' })],
            );
        },
        cell: ({ row }) => {
            return h('div', { class: 'pl-3 text-xs' }, row.getValue('date'));
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
                        h(Plus, {
                            class: `size-4 text-blue-400 text-center cursor-pointer ${(row.original as Goal).isGoalReached && 'hidden pointer-events-none'}`,
                            onClick: () => console.log(row.original.id + 'Add'),
                        }),
                        h(
                            'p',
                            {
                                class: `${!(row.original as Goal).isGoalReached && 'hidden pointer-events-none'} text-xs font-bold text-green-700`,
                            },
                            'Goal Reached',
                        ),
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
