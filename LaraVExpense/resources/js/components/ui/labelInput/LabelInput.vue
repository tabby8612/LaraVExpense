<script setup lang="ts">
import { useVModel } from '@vueuse/core';
import Input from '../input/Input.vue';
import Label from '../label/Label.vue';

const props = defineProps({
    id: String,
    label: String,
    type: String,
    placeholder: String,
    required: Boolean,
    modelValue: String,
    defaultValue: String
});

const emits = defineEmits<{
  (e: "update:modelValue", payload: string | number): void
}>()

const modelValue = useVModel(props, "modelValue", emits, {
  passive: true,
  defaultValue: props.defaultValue,
})
</script>

<template>
    <div class="flex flex-col gap-0 w-full">
        <Label :for="id" class="my-3 gap-0.5 text-gray-500" :required="required">{{ label }}</Label>
        <Input :id="id" :name="id" :required="required" :type="type" :placeholder="placeholder" v-model="modelValue" class=" selection:bg-blue-400 selection:text-white focus-visible:ring focus-visible:ring-blue-200"/>
    </div>
</template>