import type { ColumnDef } from '@tanstack/vue-table';
import { ArrowUpDown } from 'lucide-vue-next';

import { h } from 'vue';

import type { TransMonthly } from '@/types/dashboard';
import Button from '../ui/button/Button.vue';

export const TransMonthlyColumns: ColumnDef<TransMonthly>[] = [
    {
        accessorKey: 'category',
        header: ({ column }) => {
            return h(
                Button,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => [
                    'Category',
                    h(ArrowUpDown, { class: 'ml-2 h-3 w-3 text-xs' }),
                ],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                `${row.getValue('category')}`,
            );
        },
    },
    {
        accessorKey: 'jan',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Jan', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                row.getValue('jan'),
            );
        },
    },
    {
        accessorKey: 'feb',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Feb', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                row.getValue('feb'),
            );
        },
    },
    {
        accessorKey: 'mar',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Mar', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                row.getValue('mar'),
            );
        },
    },
    {
        accessorKey: 'apr',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Apr', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                row.getValue('apr'),
            );
        },
    },
    {
        accessorKey: 'may',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['May', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                row.getValue('may'),
            );
        },
    },
    {
        accessorKey: 'jun',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Jun', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                row.getValue('jun'),
            );
        },
    },
    {
        accessorKey: 'jul',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Jul', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                row.getValue('jul'),
            );
        },
    },
    {
        accessorKey: 'aug',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Aug', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                row.getValue('aug'),
            );
        },
    },
    {
        accessorKey: 'sep',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Sep', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                row.getValue('sep'),
            );
        },
    },
    {
        accessorKey: 'oct',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Oct', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                row.getValue('oct'),
            );
        },
    },
    {
        accessorKey: 'nov',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Nov', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                row.getValue('nov'),
            );
        },
    },
    {
        accessorKey: 'dec',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Dec', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs' },
                row.getValue('dec'),
            );
        },
    },
    {
        accessorKey: 'total',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Total', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs text-green-500 font-bold' },
                row.getValue('total'),
            );
        },
    },
];
