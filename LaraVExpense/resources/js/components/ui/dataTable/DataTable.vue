<script setup lang="ts" generic="TData, TValue">
import type { ColumnDef, SortingState } from '@tanstack/vue-table'
import { valueUpdater } from '@/components/ui/table/utils'

import {
  FlexRender,
  getCoreRowModel,
  useVueTable,
  getPaginationRowModel,
  getSortedRowModel,
  ExpandedState,
  getExpandedRowModel
} from '@tanstack/vue-table'

import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from '@/components/ui/table'
import { ref } from 'vue';
import { Payment } from '../../../../data/CustomData';

const props = defineProps<{
  columns: ColumnDef<TData, TValue>[]
  data: TData[]
}>();

const sorting = ref<SortingState>([]);
const expanded = ref<ExpandedState>({})


const table = useVueTable({
  get data() { return props.data },
  get columns() { return props.columns },
  getCoreRowModel: getCoreRowModel(),
  getPaginationRowModel: getPaginationRowModel(),
  getSortedRowModel: getSortedRowModel(),
  onSortingChange: updaterOrValue => valueUpdater(updaterOrValue, sorting),
  getRowCanExpand: () => true,
  getExpandedRowModel: getExpandedRowModel(),
  onExpandedChange: updaterOrValue => valueUpdater(updaterOrValue, expanded),

  
  state: {
    get sorting() { return sorting.value },
    get expanded() { return expanded.value },
  },

})

</script>

<template>
  <div class="border rounded-md my-5">
    <Table>
      <TableHeader >
        <TableRow v-for="headerGroup in table.getHeaderGroups()" :key="headerGroup.id" >
          <TableHead v-for="header in headerGroup.headers" :key="header.id">
            <FlexRender
              v-if="!header.isPlaceholder" :render="header.column.columnDef.header"
              :props="header.getContext()"
            />
          </TableHead>
        </TableRow>
      </TableHeader>
      <TableBody>
        <template v-if="table.getRowModel().rows?.length">
          <template v-for="row in table.getRowModel().rows" :key="row.id">
            <TableRow :data-state="row.getIsSelected() ? 'selected' : undefined" :class="`${row.getIsExpanded() ? 'border-l-2 border-b-0 border-blue-500' : 'border-0'}`">
                <TableCell v-for="cell in row.getVisibleCells()" :key="cell.id">
                    <FlexRender :render="cell.column.columnDef.cell" :props="cell.getContext()" />
                </TableCell>
            </TableRow>
            <TableRow v-if="row.getIsExpanded()" class="bg-blue-50 hover:bg-blue-50">
              <TableCell :colspan="row.getAllCells().length" >
                  <table class="w-full">
                    <thead>
                      <tr>
                        <th>Reference</th>
                        <th>Category</th>
                        <th>SubCategory</th>
                        <th>Note</th>
                        <th>Created By</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <td>{{ (row.original as Payment).reference }}</td>
                        <td>{{ (row.original as Payment).category }}</td>
                        <td>{{ (row.original as Payment).subCategory }}</td>
                        <td>{{ (row.original as Payment).note }}</td>
                        <td>{{ (row.original as Payment).createdBy }}</td>
                      </tr>
                    </tbody>
                  </table>
              </TableCell>
            </TableRow>
          </template>
          </template>
          <template v-else>
              <TableRow>
                  <TableCell :colSpan="columns.length" class="h-24 text-center">
                      No results.
                  </TableCell>
              </TableRow>
          </template>
      </TableBody>
    </Table>
  </div>
  <div class="flex items-center justify-end py-4 space-x-2">
      <Button
        variant="outline"
        size="sm"
        :disabled="!table.getCanPreviousPage()"
        @click="table.previousPage()"
      >
        Previous
      </Button>
      <Button
        variant="outline"
        size="sm"
        :disabled="!table.getCanNextPage()"
        @click="table.nextPage()"
      >
        Next
      </Button>
    </div>
</template>
