<script setup lang="ts">
import { Form } from '@inertiajs/vue3';
import {
    ColorAreaArea,
    ColorAreaRoot,
    ColorAreaThumb,
    ColorFieldInput,
    ColorFieldRoot,
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogOverlay,
    DialogPortal,
    DialogRoot,
    DialogTitle,
    DialogTrigger,
} from 'reka-ui';

import { ref } from 'vue';
import Label from '@/components/ui/label/Label.vue';
import LabelInput from '@/components/ui/labelInput/LabelInput.vue';

const color = ref('#56d799');

const isColorAreaVisible = ref(false);

function handleColorChart() {
    isColorAreaVisible.value = !isColorAreaVisible.value;
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
                class="fixed top-[50%] left-[50%] z-100 max-h-[95vh] w-[90vw] max-w-162.5 translate-x-[-50%] translate-y-[-50%] rounded-[6px] bg-white p-6.25 shadow-[hsl(206_22%_7%_/_35%)_0px_10px_38px_-10px,_hsl(206_22%_7%_/_20%)_0px_10px_20px_-15px] focus:outline-none data-[state=open]:animate-contentShow"
            >
                <DialogTitle class="m-0 text-[17px] font-semibold">
                    Add Tag
                </DialogTitle>
                <DialogDescription />
                <Form action="/" method="POST">
                    <LabelInput
                        id="name"
                        label="Name"
                        type="text"
                        placeholder="Name"
                        required
                    />

                    <div class="mt-1 flex justify-between gap-5">
                        <ColorFieldRoot
                            v-model="color"
                            class="relative inline-flex flex-col gap-1"
                        >
                            <label class="text-sm font-medium text-foreground">
                                Color
                            </label>
                            <div class="flex items-center gap-2">
                                <div
                                    class="h-8 w-8 shrink-0 rounded border border-muted"
                                    :style="{ background: color }"
                                    @click="handleColorChart"
                                />
                                <ColorFieldInput
                                    class="w-32 rounded-md border border-foreground/10 bg-muted px-3 py-2 text-sm text-foreground focus:border-green-500 focus:ring-2 focus:ring-green-500 focus:outline-none disabled:cursor-not-allowed disabled:opacity-50"
                                    @click="handleColorChart"
                                />
                            </div>
                        </ColorFieldRoot>
                        <ColorAreaRoot v-slot="{ style }" v-model="color">
                            <ColorAreaArea
                                class="absolute bottom-0 left-15 h-50 w-50 overflow-hidden rounded-lg shadow-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
                                :style="style"
                                v-if="isColorAreaVisible"
                            >
                                <ColorAreaThumb
                                    class="block h-4 w-4 cursor-pointer rounded-full border-2 border-gray-400 bg-white shadow"
                                />
                            </ColorAreaArea>
                        </ColorAreaRoot>
                    </div>
                    <div class="mt-2 flex flex-col justify-between gap-1">
                        <Label for="note" class="my-3 text-gray-500">
                            Description
                        </Label>
                        <textarea
                            id="note"
                            name="note"
                            class="rounded-lg border border-gray-300 px-2 py-3 text-sm shadow"
                            rows="2"
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
