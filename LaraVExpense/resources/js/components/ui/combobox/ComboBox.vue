<script setup lang="ts">
import { Check, ChevronDown } from 'lucide-vue-next';

import { ComboboxAnchor, ComboboxContent, ComboboxEmpty, ComboboxGroup, ComboboxInput, ComboboxItem, ComboboxItemIndicator, ComboboxLabel, ComboboxRoot, ComboboxTrigger, ComboboxViewport } from 'reka-ui'
import { computed, ref } from 'vue';

const options = [
    { id:1, text: 'Apple' },
    { id:2, text: 'Banana' },
    { id:3, text: 'Orange' },
    { id:4, text: 'Honeydew' },
    { id:5, text: 'Grapes' },
    { id:6, text: 'Watermelon' },
    { id:7, text: 'Cantaloupe' },
    { id:8, text: 'Pear' },    
]

const selectedID = ref(1);

function setSelectedID(id: number) {
    selectedID.value = id;
}

const selectedAccount = computed(() => options.filter(option => option.id === selectedID.value)[0].text);

</script>



<template>
  <ComboboxRoot
    class="relative w-full "
    required
  >
    <ComboboxAnchor class="min-w-[160px] w-full inline-flex items-center justify-between rounded-lg border px-[15px] text-xs leading-none h-[35px] gap-[5px] bg-white text-blue-700 hover:bg-stone-50 shadow-sm focus:shadow-[0_0_0_2px] focus:shadow-black data-[placeholder]:text-blue-700 outline-none">
      <ComboboxInput
        class="!bg-transparent outline-none text-black h-full selection:bg-blue-100 placeholder-stone-400 w-full text-sm"
        placeholder="Search Account"
        v-model="selectedAccount"
        
      />
      <ComboboxTrigger>
        <ChevronDown />
      </ComboboxTrigger>
    </ComboboxAnchor>

    <ComboboxContent class="absolute z-10 w-full mt-1 bg-white overflow-hidden rounded-lg shadow-sm border will-change-[opacity,transform] data-[side=top]:animate-slideDownAndFade data-[side=right]:animate-slideLeftAndFade data-[side=bottom]:animate-slideUpAndFade data-[side=left]:animate-slideRightAndFade">
      <ComboboxViewport class="p-[5px]">
        <ComboboxEmpty class="text-mauve8 text-xs font-medium text-center py-2" />

        
          <ComboboxGroup>
            

            <ComboboxItem
              v-for="option in options"
              :key="option.id"
              :value="option.id"
              @select="setSelectedID(option.id)"
              class="text-sm leading-none text-black/50 rounded-[3px] flex items-center h-[25px] pr-[35px] pl-[25px] relative select-none data-[disabled]:text-gray-200 data-[disabled]:pointer-events-none data-[highlighted]:outline-none data-[highlighted]:bg-blue-200 data-[highlighted]:text-blue-700"
            >
              <ComboboxItemIndicator
                class="absolute left-0 w-[25px] inline-flex items-center justify-center"
              >
                <Check class="size-4"/>
              </ComboboxItemIndicator>
              <span>
                {{ option.text }}
              </span>
            </ComboboxItem>
          </ComboboxGroup>
        
      </ComboboxViewport>
    </ComboboxContent>
  </ComboboxRoot>
</template>