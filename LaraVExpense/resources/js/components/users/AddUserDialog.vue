<script setup lang="ts">
import { Check } from 'lucide-vue-next';
import {
    CheckboxGroupRoot,
    CheckboxIndicator,
    CheckboxRoot,
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
import { roles, userStatuses, permisions } from '../../../data/CustomData';
import Button from '../ui/button/Button.vue';
import CustomSelect from '../ui/select/CustomSelect.vue';

const access = ref([]);

function handleForm() {
    console.log(access);
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
                    Add New User
                </DialogTitle>
                <DialogDescription />
                <form action="/" @submit.prevent="handleForm">
                    <div class="mt-1 flex justify-between gap-5">
                        <LabelInput
                            id="name"
                            label="Full Name"
                            type="text"
                            placeholder="Name"
                            required
                        />
                        <LabelInput
                            id="phone"
                            label="Phone"
                            type="text"
                            placeholder="Phone"
                        />
                    </div>

                    <div class="mt-1 flex justify-between gap-5">
                        <div class="w-full">
                            <LabelInput
                                id="email"
                                label="Email"
                                type="email"
                                placeholder="Email"
                                required
                            />
                        </div>
                        <div class="w-full">
                            <Label
                                for="role"
                                class="my-3 w-full gap-0.5 text-gray-500"
                                ><span class="text-red-400">*</span> Role</Label
                            >
                            <CustomSelect
                                name="role"
                                label="Role"
                                :options="roles"
                            />
                        </div>
                    </div>
                    <div class="mt-1 flex justify-between gap-5">
                        <LabelInput
                            id="password"
                            label="Password"
                            type="password"
                            required
                        />
                        <div class="w-full">
                            <Label
                                for="status"
                                class="my-3 gap-0.5 text-gray-500"
                                >Status</Label
                            >
                            <CustomSelect
                                name="status"
                                label="Status"
                                :options="userStatuses"
                            />
                        </div>
                    </div>
                    <div class="flex justify-between gap-5">
                        <div class="mt-5 flex flex-col gap-2.5">
                            <h1 class="my-2 font-bold">Assign Permissions</h1>
                            <CheckboxGroupRoot v-model="access">
                                <div class="grid grid-cols-3 gap-5">
                                    <label
                                        class="flex flex-row items-center gap-4 [&>.checkbox]:hover:bg-neutral-100"
                                        v-for="permission in permisions"
                                        :key="permission.id"
                                    >
                                        <CheckboxRoot
                                            class="flex h-5 w-5 appearance-none items-center justify-center rounded-md border bg-white shadow-sm outline-none focus-within:shadow-[0_0_0_2px_black] hover:bg-stone-50"
                                            :value="permission.id"
                                        >
                                            <CheckboxIndicator
                                                class="flex h-full w-full items-center justify-center rounded bg-white"
                                            >
                                                <Check class="size-4" />
                                            </CheckboxIndicator>
                                        </CheckboxRoot>
                                        <span
                                            class="text-sm text-stone-700 select-none dark:text-white"
                                            >{{ permission.name }}</span
                                        >
                                    </label>
                                </div>
                            </CheckboxGroupRoot>
                        </div>
                    </div>
                    <div class="mt-[25px] flex justify-end">
                        <Button
                            class="h-35px inline-flex cursor-pointer items-center justify-center rounded-lg bg-blue-600 px-[15px] text-sm leading-none font-semibold text-white hover:bg-blue-700 focus:shadow-[0_0_0_2px] focus:shadow-blue-300 focus:outline-none"
                        >
                            Save changes
                        </Button>
                        <!-- <DialogClose
                            as-child
                            class="cursor-pointer bg-blue-500 text-white"
                        >
                            <button
                                class="bg-green4 text-green11 hover:bg-green5 focus:shadow-green7 inline-flex h-[35px] items-center justify-center rounded-lg px-[15px] text-sm leading-none font-semibold focus:shadow-[0_0_0_2px] focus:outline-none"
                            >
                                Save changes
                            </button>
                        </DialogClose> -->
                    </div>
                </form>

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
