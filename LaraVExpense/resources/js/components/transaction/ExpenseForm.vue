<script setup lang="ts">
import { Form } from '@inertiajs/vue3';
import IncomeCategory from '@/components/transaction/IncomeCategory.vue';
import Button from '@/components/ui/button/Button.vue';
import ComboBox from '@/components/ui/combobox/ComboBox.vue';
import { Input } from '@/components/ui/input';
import Label from '@/components/ui/label/Label.vue';
import LabelInput from '@/components/ui/labelInput/LabelInput.vue';
</script>

<template>
    <section class="w-full rounded border p-4 shadow-xs">
        <h1 class="text-2xl font-extrabold">Expense Transaction</h1>
        <Form
            action="/transactions"
            method="post"
            :transform="(data) => ({ ...data, transType: 'expense' })"
        >
            <LabelInput
                id="name"
                label="Name"
                placeholder="Name"
                required
                type="text"
            />
            <div class="mt-3 flex justify-between gap-4">
                <LabelInput
                    id="amount"
                    label="Amount"
                    placeholder="Amount"
                    type="number"
                    required
                />
                <LabelInput
                    id="reference"
                    label="Reference"
                    placeholder="Reference"
                    type="text"
                />
            </div>
            <div class="mt-3 flex justify-between gap-4">
                <LabelInput id="date" label="Date" type="date" required />
                <div class="flex w-full flex-col gap-0">
                    <Label for="account" class="my-3 gap-0.5 text-gray-500">
                        <span class="text-red-400">*</span>
                        Account
                    </Label>
                    <ComboBox name="account" />
                </div>
            </div>
            <div class="mt-3 flex justify-between gap-4">
                <div class="w-full">
                    <Label for="account" class="my-3 gap-0.5 text-gray-500">
                        <span class="text-red-400">*</span>
                        Expense Category
                    </Label>
                    <IncomeCategory />
                </div>
                <div class="w-full">
                    <Label for="account" class="my-3 gap-0.5 text-gray-500">
                        <span class="text-red-400">*</span>
                        Expense Sub Category
                    </Label>
                    <IncomeCategory />
                </div>
            </div>
            <div class="mt-3 flex flex-col justify-between gap-0">
                <Label for="account" class="my-3 text-gray-500"> Note </Label>
                <textarea
                    class="rounded-lg border border-gray-300 px-2 py-3 text-sm shadow"
                    rows="3"
                />
            </div>
            <div class="flex w-full flex-col gap-0">
                <Label for="tag" class="my-3 gap-0.5 text-gray-500">
                    <span class="text-red-400">*</span>
                    Tags
                </Label>
                <ComboBox name="tag" />
            </div>
            <div class="mt-5 flex w-full flex-col gap-0">
                <Input
                    type="file"
                    class="h-24 file:h-24 file:text-sm file:font-bold file:text-blue-500"
                />
            </div>
            <Button class="mt-9 cursor-pointer bg-blue-700 hover:bg-blue-800"
                >Submit</Button
            >
        </Form>
    </section>
</template>
