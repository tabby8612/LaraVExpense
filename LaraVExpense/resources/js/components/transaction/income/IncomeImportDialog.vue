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
import Input from '@/components/ui/input/Input.vue';
</script>

<template>
    <DialogRoot>
        <DialogTrigger> <slot></slot> </DialogTrigger>
        <DialogPortal>
            <DialogOverlay
                class="fixed inset-0 z-30 bg-black/50 data-[state=open]:animate-overlayShow"
            />
            <DialogContent
                class="fixed top-[50%] left-[50%] z-[100] max-h-[85vh] w-[90vw] max-w-[650px] translate-x-[-50%] translate-y-[-50%] rounded-[6px] bg-white p-[25px] shadow-[hsl(206_22%_7%_/_35%)_0px_10px_38px_-10px,_hsl(206_22%_7%_/_20%)_0px_10px_20px_-15px] focus:outline-none data-[state=open]:animate-contentShow"
            >
                <DialogTitle class="m-0 text-[17px] font-semibold">
                    Import CSV
                </DialogTitle>
                <DialogDescription
                    class="text-mauve11 mt-[10px] mb-5 text-sm leading-normal"
                >
                    Follow these steps to upload incomes
                </DialogDescription>
                <h1
                    class="my-3 border-b border-gray-200 text-xl font-extrabold"
                >
                    Step 1. Download Income Template File
                </h1>
                <p>
                    Start by downloading Income CSV(Comma Separated Values)
                    template file. This has the correct column headings
                    Application needs to import your Income data
                </p>
                <a href="">Download CSV Template</a>
                <h1
                    class="my-3 border-b border-gray-200 text-xl font-extrabold"
                >
                    Step 2. Copy Your Income Into The Template
                </h1>
                <p>
                    Using excel or another spreadsheet editor, copy and paste
                    into template
                </p>
                <p class="text-lg text-red-500">
                    Do not change the column headings provided in the template.
                    <br />Dates must in the format 2026-01-15
                </p>
                <h1
                    class="my-3 border-b border-gray-200 text-xl font-extrabold"
                >
                    Step 3. Import The Updated Template File. Make Sure File
                    .CSV
                </h1>
                <Form action="/" method="POST">
                    <Input
                        type="file"
                        class="border border-gray-400 file:font-bold file:text-blue-500"
                    />
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
