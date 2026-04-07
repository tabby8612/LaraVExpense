<script setup lang="ts">
import { Form, useForm } from '@inertiajs/vue3';
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
import Button from '../ui/button/Button.vue';

const form = useForm({
    name: '',
    amount: '',
    accountNumber: '',
    description: '',
});

function formHandler() {
    console.log(form.data());
}
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
                    Add New Account
                </DialogTitle>
                <DialogDescription />
                <Form action="/" method="POST" class="mt-5 flex flex-col gap-3">
                    <LabelInput
                        id="name"
                        label="Name"
                        type="text"
                        placeholder="Name"
                        v-model.trim="form.name"
                        required
                    />
                    <LabelInput
                        id="opening_balance"
                        label="Opening Balance"
                        type="number"
                        placeholder="Amount"
                        v-model.number.trim="form.amount"
                        required
                    />
                    <LabelInput
                        id="account_number"
                        label="Account Number"
                        type="text"
                        placeholder="Account Number"
                        v-model.trim="form.accountNumber"
                        required
                    />

                    <div>
                        <Label for="note" class="my-1.5 text-gray-500">
                            Description
                        </Label>
                        <textarea
                            id="description"
                            name="description"
                            v-model.trim="form.description"
                            class="w-full rounded-lg border border-gray-300 px-2 py-3 text-sm shadow focus-visible:outline-blue-700"
                            rows="2"
                        />
                    </div>
                    <Button
                        class="mt-3 cursor-pointer bg-blue-700 font-bold text-white hover:bg-blue-800"
                        @click.prevent="formHandler"
                        >Submit</Button
                    >
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
