<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import Button from '@/components/ui/button/Button.vue';
import LabelInput from '@/components/ui/labelInput/LabelInput.vue';
import MainLayout from '@/layouts/MainLayout.vue';

const form = useForm({
    name: '',
    phone: '',
    email: '',
    password: '',
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
                        Profile Settings
                    </h1>
                </div>
                <form
                    class="flex w-1/2 flex-col gap-2"
                    @submit.prevent="formHandler"
                >
                    <LabelInput
                        id="name"
                        label="Name"
                        type="text"
                        placeholder="Name"
                        v-model="form.name"
                        required
                    />
                    <LabelInput
                        id="phone"
                        label="Phone"
                        type="text"
                        placeholder="Phone"
                        v-model="form.phone"
                        required
                    />
                    <LabelInput
                        id="email"
                        label="Email"
                        type="email"
                        placeholder="Email"
                        v-model="form.email"
                        required
                    />
                    <LabelInput
                        id="password"
                        label="Password"
                        type="password"
                        v-model="form.password"
                        required
                    />
                    <Button
                        class="mt-5 cursor-pointer bg-blue-700 hover:bg-blue-800"
                        >Submit</Button
                    >
                </form>
            </div>
        </section>
    </MainLayout>
</template>
