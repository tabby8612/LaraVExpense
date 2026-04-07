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

import LabelInput from '@/components/ui/labelInput/LabelInput.vue';
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
                    Add Goal
                </DialogTitle>
                <DialogDescription />
                <Form action="/" method="POST">
                    <div class="mt-3 flex justify-between gap-5">
                        <LabelInput
                            id="name"
                            label="Name"
                            type="text"
                            placeholder="Name"
                            required
                        />
                        <LabelInput
                            id="opening_balance"
                            label="Opening Balance"
                            type="number"
                            placeholder="Opening Balance"
                        />
                    </div>
                    <div class="mt-3 flex justify-between gap-5">
                        <LabelInput
                            id="target"
                            label="Target"
                            type="number"
                            required
                        />
                        <LabelInput
                            id="target_date"
                            label="Target Date"
                            type="date"
                            required
                        />
                    </div>
                    <div class="mt-[25px] flex justify-end">
                        <DialogClose
                            as-child
                            class="cursor-pointer bg-blue-500 text-white"
                        >
                            <button
                                class="bg-green4 text-green11 hover:bg-green5 focus:shadow-green7 inline-flex h-[35px] items-center justify-center rounded-lg px-[15px] text-sm leading-none font-semibold focus:shadow-[0_0_0_2px] focus:outline-none"
                            >
                                Save changes
                            </button>
                        </DialogClose>
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
