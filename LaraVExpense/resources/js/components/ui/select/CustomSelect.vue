<script setup lang="ts">
import { Option } from '@/types/dashboard';
import { Check, ChevronDown, ChevronUp } from 'lucide-vue-next'
import {
  SelectContent,
  SelectGroup,
  SelectItem,
  SelectItemIndicator,
  SelectItemText,
  SelectLabel,
  SelectPortal,
  SelectRoot,
  SelectScrollDownButton,
  SelectScrollUpButton,
  SelectSeparator,
  SelectTrigger,
  SelectValue,
  SelectViewport,
} from 'reka-ui'
import { ref } from 'vue'

interface Props {
    label: string;
    options: Option[];
}

defineProps<Props>();

const selectedOption = ref()

</script>

<template>
  <SelectRoot v-model="selectedOption" class="w-full">
    <SelectTrigger
      class="inline-flex relative min-w-[160px] w-full items-center justify-between rounded-lg px-[15px] text-sm leading-none h-[35px] gap-[5px] hover:bg-blue-50 border shadow-sm focus:shadow-[0_0_0_2px] focus:shadow-black data-[placeholder]:text-black outline-none"
      aria-label="Customise options"
    >
      <SelectValue :placeholder="`Select a ${label}`" />
      <ChevronDown class="h-3.5 w-3.5" />
      
    </SelectTrigger>

    <SelectPortal>
      <SelectContent
        class="min-w-[140px]  w-full bg-white rounded-lg border shadow-sm will-change-[opacity,transform] data-[side=top]:animate-slideDownAndFade data-[side=right]:animate-slideLeftAndFade data-[side=bottom]:animate-slideUpAndFade data-[side=left]:animate-slideRightAndFade z-100"
        >
        <SelectScrollUpButton class="flex items-center justify-center h-[25px] bg-white text-violet11 cursor-default">
          <ChevronUp />
        </SelectScrollUpButton>

        <SelectViewport class="p-[5px]">
          <SelectGroup >
            <SelectItem
              v-for="option in options"
              :key="option.id"
              class="text-sm leading-none rounded-[3px] flex items-center h-[25px] pr-[35px] pl-[25px] relative select-none data-[disabled]:pointer-events-none data-[highlighted]:outline-none data-[highlighted]:bg-blue-100 data-[highlighted]:text-black"
              :value="option.id"
            >
              <SelectItemIndicator class="absolute left-0 w-[25px] inline-flex items-center justify-center">
                <Check />
              </SelectItemIndicator>
              <SelectItemText>
                {{ option.name }}
              </SelectItemText>
            </SelectItem>
          </SelectGroup>          
        </SelectViewport>

        <SelectScrollDownButton class="flex items-center justify-center h-[25px] bg-white text-violet11 cursor-default">
          <ChevronDown />
        </SelectScrollDownButton>
      </SelectContent>
    </SelectPortal>
  </SelectRoot>
</template>