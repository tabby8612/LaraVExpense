<script setup lang="ts">
import { Form } from '@inertiajs/vue3';
import {
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogOverlay,
    DialogPortal,
    DialogRoot,
    DialogTitle,
    DialogTrigger,
} from 'reka-ui';

import Label from '@/components/ui/label/Label.vue';
import LabelInput from '@/components/ui/labelInput/LabelInput.vue';
import {
    accounts,
    recurringType,
    tags,
    transactionTypes,
} from '../../../data/CustomData';
import CustomSelect from '../ui/select/CustomSelect.vue';
import IncomeCategory from './IncomeCategory.vue';
import IncomeSubCategory from './IncomeSubCategory.vue';
</script>

<template>
    <DialogRoot>
        <DialogTrigger> <slot></slot> </DialogTrigger>
        <DialogPortal>
            <DialogOverlay
                class="fixed inset-0 z-30 bg-black/50 data-[state=open]:animate-overlayShow"
            />
            <DialogContent
                class="fixed top-[50%] left-[50%] z-[100] max-h-[95vh] w-[90vw] max-w-[650px] translate-x-[-50%] translate-y-[-50%] rounded-[6px] bg-white p-[25px] shadow-[hsl(206_22%_7%_/_35%)_0px_10px_38px_-10px,_hsl(206_22%_7%_/_20%)_0px_10px_20px_-15px] focus:outline-none data-[state=open]:animate-contentShow"
            >
                <DialogTitle class="m-0 text-[17px] font-semibold">
                    Add Recurring Transaction
                </DialogTitle>
                <DialogDescription />
                <Form action="/recurring-transactions" method="post">
                    <LabelInput
                        id="name"
                        label="Name"
                        type="text"
                        placeholder="Name"
                        required
                    />

                    <div class="mt-1 flex justify-between gap-5">
                        <LabelInput
                            id="amount"
                            label="Amount"
                            type="number"
                            placeholder="Amount"
                            required
                        />
                        <div class="w-full">
                            <Label class="my-3 gap-0.5 text-gray-500"
                                ><span class="text-red-500">*</span> Transaction
                                Type</Label
                            >
                            <CustomSelect
                                name="transactionType"
                                label="Transaction Type"
                                :options="transactionTypes"
                            />
                        </div>
                    </div>
                    <div class="mt-1 flex justify-between gap-5">
                        <div class="w-full">
                            <Label class="my-3 gap-0.5 text-gray-500"
                                ><span class="text-red-500">*</span>
                                Category</Label
                            >
                            <IncomeCategory />
                        </div>
                        <div class="w-full">
                            <Label class="my-3 gap-0.5 text-gray-500"
                                ><span class="text-red-500">*</span> Sub
                                Category</Label
                            >
                            <IncomeSubCategory />
                        </div>
                    </div>
                    <div class="mt-1 flex justify-between gap-5">
                        <div class="w-full">
                            <Label class="my-3 gap-0.5 text-gray-500"
                                ><span class="text-red-500">*</span>
                                Account</Label
                            >
                            <CustomSelect
                                name="account"
                                label="Account"
                                :options="accounts"
                            />
                        </div>
                        <div class="w-full">
                            <Label class="my-3 gap-0.5 text-gray-500"
                                ><span class="text-red-500">*</span> Recurring
                                Type</Label
                            >
                            <CustomSelect
                                label="Recurring Type"
                                name="recurring_type"
                                :options="recurringType"
                            />
                        </div>
                    </div>
                    <div class="mt-1 flex justify-between gap-5">
                        <LabelInput
                            id="start_date"
                            label="Start Date"
                            type="date"
                            required
                        />
                        <LabelInput
                            id="end_date"
                            label="End Date"
                            type="date"
                        />
                    </div>
                    <div class="mt-1 flex justify-between gap-5">
                        <div class="w-1/2">
                            <LabelInput
                                id="reference"
                                label="Reference"
                                type="text"
                            />
                        </div>
                        <div class="w-1/2">
                            <Label class="my-3 gap-0.5 text-gray-500"
                                >Tags</Label
                            >

                            <CustomSelect
                                name="tags[]"
                                label="Tags"
                                :options="tags"
                                is-multiple
                            />
                        </div>
                    </div>
                    <div class="mt-2 flex flex-col justify-between gap-1">
                        <Label for="note" class="my-3 text-gray-500">
                            Description
                        </Label>
                        <textarea
                            id="description"
                            name="description"
                            class="rounded-lg border border-gray-300 px-2 py-3 text-sm shadow"
                            rows="1"
                        />
                    </div>

                    <div class="mt-[25px] flex justify-end">
                        <button
                            type="submit"
                            class="bg-green4 text-green11 hover:bg-green5 focus:shadow-green7 inline-flex h-[35px] items-center justify-center rounded-lg px-[15px] text-sm leading-none font-semibold focus:shadow-[0_0_0_2px] focus:outline-none"
                        >
                            Save changes
                        </button>
                    </div>
                </Form>

                <DialogClose
                    class="text-grass11 hover:bg-green4 focus:shadow-green7 absolute top-[10px] right-[10px] inline-flex h-[25px] w-[25px] appearance-none items-center justify-center rounded-full focus:shadow-[0_0_0_2px] focus:outline-none"
                    aria-label="Close"
                >
                    X
                </DialogClose>
            </DialogContent>
        </DialogPortal>
    </DialogRoot>
</template>
