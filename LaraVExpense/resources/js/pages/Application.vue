<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue';
import Label from '@/components/ui/label/Label.vue';
import LabelInput from '@/components/ui/labelInput/LabelInput.vue';
import CustomSelect from '@/components/ui/select/CustomSelect.vue';
import MainLayout from '@/layouts/MainLayout.vue';
import { dateTypes, languages } from '../../data/CustomData';

const form = useForm({
    company: '',
    website: '',
    city: '',
    phone: '',
    currency: '',
    address: '',
    language: '',
    dateFormat: '',
    logo: null,
});

function formHandler() {
    console.log(form.data());
}
</script>

<template>
    <MainLayout page="income">
        <section class="p-4">
            <div class="mt-5 rounded-lg border border-gray-100 p-4 shadow">
                <div class="flex justify-between">
                    <h1
                        class="flex items-center justify-center text-xl font-bold text-black/80"
                    >
                        Application Settings
                    </h1>
                </div>
                <form class="flex flex-col gap-2" @submit.prevent="formHandler">
                    <div class="flex w-full gap-5">
                        <LabelInput
                            id="company"
                            label="Company"
                            type="text"
                            placeholder="company"
                            v-model="form.company"
                            required
                        />
                        <LabelInput
                            id="website"
                            label="Website"
                            type="text"
                            placeholder="Website"
                            v-model="form.website"
                            required
                        />
                    </div>
                    <div class="flex w-full gap-5">
                        <LabelInput
                            id="city"
                            label="City"
                            type="text"
                            placeholder="City"
                            v-model="form.city"
                            required
                        />
                        <LabelInput
                            id="phone"
                            label="Phone"
                            type="text"
                            v-model="form.phone"
                            required
                        />
                    </div>
                    <div class="flex w-full gap-5">
                        <LabelInput
                            id="currency"
                            label="Currency"
                            type="text"
                            v-model="form.currency"
                            required
                        />
                        <LabelInput
                            id="address"
                            label="Address"
                            type="text"
                            v-model="form.address"
                            required
                        />
                    </div>

                    <div class="flex w-full gap-5">
                        <div class="w-full">
                            <Label
                                for="language"
                                class="my-3 gap-0.5 text-gray-500"
                                ><span class="text-red-500">*</span
                                >Language</Label
                            >
                            <CustomSelect
                                label="Language"
                                name="language"
                                v-model="form.language"
                                :options="languages"
                            />
                        </div>
                        <div class="w-full">
                            <Label
                                for="dateFormat"
                                class="my-3 gap-0.5 text-gray-500"
                                ><span class="text-red-500">*</span>Date
                                Format</Label
                            >
                            <CustomSelect
                                label="Date Format"
                                name="dateFormat"
                                :options="dateTypes"
                                v-model="form.dateFormat"
                            />
                        </div>
                    </div>

                    <Button
                        class="mt-5 w-1/2 cursor-pointer bg-blue-700 hover:bg-blue-800"
                        >Submit</Button
                    >
                </form>
            </div>
        </section>
    </MainLayout>
</template>
