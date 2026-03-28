import type { ColumnDef } from '@tanstack/vue-table';
import { ArrowUpDown } from 'lucide-vue-next';

import { h } from 'vue';

import type { TaggedTransaction } from '@/types/dashboard';
import Button from '../ui/button/Button.vue';

export const TagsColumnsReport: ColumnDef<TaggedTransaction>[] = [
    {
        accessorKey: 'tag',
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
                    'Tag',
                    h(ArrowUpDown, { class: 'ml-2 h-3 w-3 text-xs' }),
                ],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs font-black' },
                `${row.getValue('tag')}`,
            );
        },
    },
    {
        accessorKey: 'name',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Name', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs text-gray-500' },
                row.getValue('name'),
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
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Category', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs text-gray-500' },
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
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => [
                    'Sub Category',
                    h(ArrowUpDown, { class: 'ml-2 h-3 w-3' }),
                ],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs text-gray-500' },
                row.getValue('subCategory'),
            );
        },
    },
    {
        accessorKey: 'account',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Account', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs text-gray-500' },
                row.getValue('account'),
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
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Amount', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs text-gray-500' },
                row.getValue('amount'),
            );
        },
    },
    {
        accessorKey: 'date',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Date', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs text-gray-500' },
                row.getValue('date'),
            );
        },
    },
    {
        accessorKey: 'type',
        header: ({ column }) => {
            return h(
                Button as any,
                {
                    variant: 'ghost',
                    class: 'px-0 gap-0 has-[>svg]:p-0 flex justify-between items-center mx-auto hover:bg-transparent text-xs',
                    onClick: () =>
                        column.toggleSorting(column.getIsSorted() === 'asc'),
                },
                () => ['Type', h(ArrowUpDown, { class: 'ml-2 h-3 w-3' })],
            );
        },
        cell: ({ row }) => {
            return h(
                'div',
                { class: 'text-center text-xs text-gray-500' },
                row.getValue('type'),
            );
        },
    },
];
