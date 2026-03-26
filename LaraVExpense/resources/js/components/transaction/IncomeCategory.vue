<script setup lang="ts">
import { Check, ChevronDown } from 'lucide-vue-next';

import {
    ComboboxAnchor,
    ComboboxContent,
    ComboboxEmpty,
    ComboboxGroup,
    ComboboxInput,
    ComboboxItem,
    ComboboxItemIndicator,
    ComboboxRoot,
    ComboboxTrigger,
    ComboboxViewport,
} from 'reka-ui';
import { computed, ref } from 'vue';

const categories = [
    { id: 1, text: 'CompanyA' },
    { id: 2, text: 'CompanyB' },
    { id: 3, text: 'CompanyC' },
    { id: 4, text: 'CompanyD' },
    { id: 5, text: 'CompanyE' },
    { id: 6, text: 'CompanyF' },
    { id: 7, text: 'CompanyG' },
    { id: 8, text: 'CompanyH' },
];

const selectedCategoryID = ref(1);

function setSelectedID(id: number) {
    selectedCategoryID.value = id;
}

const selectedCategory = computed(
    () =>
        categories.filter(
            (category) => category.id === selectedCategoryID.value,
        )[0].text,
);
</script>

<template>
    <ComboboxRoot class="relative w-full" required name="category">
        <ComboboxAnchor
            class="inline-flex h-[35px] w-full min-w-[160px] items-center justify-between gap-[5px] rounded-lg border bg-white px-[15px] text-xs leading-none text-blue-700 shadow-sm outline-none hover:bg-stone-50 focus:shadow-[0_0_0_2px] focus:shadow-black data-[placeholder]:text-blue-700"
        >
            <ComboboxInput
                class="h-full w-full !bg-transparent text-sm text-black placeholder-stone-400 outline-none selection:bg-blue-100"
                placeholder="Search Account"
                v-model="selectedCategory"
            />
            <ComboboxTrigger>
                <ChevronDown class="h-3.5 w-3.5 text-black" />
            </ComboboxTrigger>
        </ComboboxAnchor>

        <ComboboxContent
            class="absolute z-10 mt-1 w-full overflow-hidden rounded-lg border bg-white shadow-sm will-change-[opacity,transform] data-[side=bottom]:animate-slideUpAndFade data-[side=left]:animate-slideRightAndFade data-[side=right]:animate-slideLeftAndFade data-[side=top]:animate-slideDownAndFade"
        >
            <ComboboxViewport class="p-[5px]">
                <ComboboxEmpty
                    class="text-mauve8 py-2 text-center text-xs font-medium"
                />

                <ComboboxGroup>
                    <ComboboxItem
                        v-for="category in categories"
                        :key="category.id"
                        :value="category.id"
                        @select="setSelectedID(category.id)"
                        class="relative flex h-[25px] items-center rounded-[3px] pr-[35px] pl-[25px] text-sm leading-none text-black/50 select-none data-[disabled]:pointer-events-none data-[disabled]:text-gray-200 data-[highlighted]:bg-blue-200 data-[highlighted]:text-blue-700 data-[highlighted]:outline-none"
                    >
                        <ComboboxItemIndicator
                            class="absolute left-0 inline-flex w-[25px] items-center justify-center"
                        >
                            <Check class="size-4" />
                        </ComboboxItemIndicator>
                        <span>
                            {{ category.text }}
                        </span>
                    </ComboboxItem>
                </ComboboxGroup>
            </ComboboxViewport>
        </ComboboxContent>
    </ComboboxRoot>
</template>
