<script setup lang="ts" generic="TData, TValue">
import type { ColumnDef, PaginationState, SortingState } from '@tanstack/vue-table'
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
import { Budget, Transaction } from '@/types/dashboard';
import Button from '../button/Button.vue';
import CustomPieChart from '@/components/charts/CustomPieChart.vue';
import CircularProgress from '@/components/CircularProgress.vue';

const {columns, data, expandedType='transaction'} = defineProps<{
  columns: ColumnDef<TData, TValue>[]
  data: TData[]
  expandedType?: 'transaction' | 'budget'
}>();

const sorting = ref<SortingState>([]);
const expanded = ref<ExpandedState>({});
const pagination = ref<PaginationState>({
  pageIndex: 0,
  pageSize: 10,
});


const table = useVueTable({
  get data() { return data },
  get columns() { return columns },
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
    get pagination() {return pagination.value}
  },

});


const goToPageNumber = ref(pagination.value.pageIndex + 1);
const pageSizes = [10,20,30,40,50];

function handleGoToPage(e: any) {
  const page = e.target.value ? Number(e.target.value) - 1 : 0
  goToPageNumber.value = page + 1
  table.setPageIndex(page)
}

function handlePageSizeChange(e: any) {
  pagination.value.pageSize = Number(e.target.value);  
  table.setPageSize(Number(e.target.value))
}

function calculatePercentage(spendAmount: number, plannedAmount: number) {
  const percentage = (spendAmount / plannedAmount) * 100;
  console.log(spendAmount, plannedAmount, percentage);
  
  return percentage;

}

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
            <TableRow v-if="row.getIsExpanded() && expandedType === 'transaction'" class="bg-blue-50 hover:bg-blue-50">
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
                      <tr class="text-center text-xs">
                        <td>{{ (row.original as Transaction).reference }}</td>
                        <td>{{ (row.original as Transaction).category }}</td>
                        <td>{{ (row.original as Transaction).subCategory }}</td>
                        <td>{{ (row.original as Transaction).note }}</td>
                        <td>{{ (row.original as Transaction).createdBy }}</td>
                      </tr>
                    </tbody>
                  </table>
              </TableCell>
            </TableRow>
            <TableRow v-if="row.getIsExpanded() && expandedType === 'budget'" class="bg-blue-50 hover:bg-blue-50">
              <TableCell :colspan="row.getAllCells().length" >
                  <section class="flex justify-between items-center p-5 w-10/12 mx-auto">
                    <div class="flex flex-col gap-5">
                      <div>
                        <h1 class="text-lg font-bold">Budget Remaining</h1>
                        {{ (row.original as Budget).remainingAmount }}
                      </div>
                      <div class="flex justify-between items-center gap-6">
                        <div>
                          <h1 class="text-blue-500 font-bold">Planned Amount</h1>
                          <p>{{ (row.original as Budget).plannedAmount }}</p>
                        </div>
                        <div>
                          <h1 class="text-green-500 font-bold">Spend Amount</h1>
                          <p>{{ (row.original as Budget).spendAmount }}</p>
                        </div>
                        
                        <div></div>

                      </div>
                    </div>
                    <div class="h-56">
                      <CircularProgress  label="Spend Percentage" :percent="calculatePercentage((row.original as Budget).spendAmount, (row.original as Budget).plannedAmount)" />
                      
                    </div>
                  </section>
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
  <div class="flex justify-between">
    <div>
      <select
          :value="table.getState().pagination.pageSize"
          class="border rounded p-2 border-gray-400"
          @change="handlePageSizeChange"
        >
          <option
            :key="pageSize"
            :value="pageSize"
            v-for="pageSize in pageSizes"
            :selected="pageSize === pagination.pageSize"
          >
            Show {{ pageSize }}
          </option>
        </select>
    </div>
    <div>
      <div class="flex items-center justify-end py-4">
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
        v-for="pageInd in table.getPageOptions()"
        :class="`${pageInd === pagination.pageIndex && 'bg-blue-600 text-white'}`"
        :value=pageInd
        @click="handleGoToPage"
      >
        {{pageInd + 1}}
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

    </div>
  </div>
  
</template>
