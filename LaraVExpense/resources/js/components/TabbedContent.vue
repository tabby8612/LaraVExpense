<script setup lang="ts">
import {
    TabsContent,
    TabsIndicator,
    TabsList,
    TabsRoot,
    TabsTrigger,
} from 'reka-ui';
</script>

<template>
    <TabsRoot
        class="flex w-full flex-col rounded-lg border shadow-sm sm:w-75"
        default-value="tab1"
    >
        <TabsList
            class="border-mauve6 relative flex shrink-0 border-b"
            aria-label="Manage your account"
        >
            <TabsIndicator
                class="absolute bottom-0 left-0 h-0.5 w-[--reka-tabs-indicator-size] translate-x-[--reka-tabs-indicator-position] translate-y-px rounded-full px-8 transition-[width,transform] duration-300"
            >
                <div class="bg-grass8 h-full w-full" />
            </TabsIndicator>
            <TabsTrigger
                class="text-mauve11 hover:text-grass11 data-[state=active]:text-grass11 flex h-11.25 flex-1 cursor-default items-center justify-center rounded-tl-md bg-white px-5 text-sm leading-none outline-none select-none focus-visible:relative focus-visible:shadow-[0_0_0_2px] focus-visible:shadow-black"
                value="tab1"
            >
                Account
            </TabsTrigger>
            <TabsTrigger
                class="text-mauve11 hover:text-grass11 data-[state=active]:text-grass11 flex h-11.25 flex-1 cursor-default items-center justify-center rounded-tr-md bg-white px-5 text-sm leading-none outline-none select-none focus-visible:relative focus-visible:shadow-[0_0_0_2px] focus-visible:shadow-black"
                value="tab2"
            >
                Password
            </TabsTrigger>
        </TabsList>
        <TabsContent
            class="grow rounded-b-md bg-white p-5 outline-none focus:shadow-[0_0_0_2px] focus:shadow-black"
            value="tab1"
        >
            <p class="text-mauve11 mt-0! mb-5 text-sm leading-normal!">
                Make changes to your account here. Click save when you're done.
            </p>
            <fieldset class="mb-3.75 flex w-full flex-col justify-start">
                <label
                    class="text-green12 mb-2.5 block text-xs leading-none"
                    for="name"
                >
                    Name
                </label>
                <input
                    id="name"
                    class="text-grass11 shadow-green7 focus:shadow-green8 h-8.75 shrink-0 grow rounded-md bg-stone-50 px-2.5 text-sm leading-none shadow-[0_0_0_1px] outline-none focus:shadow-[0_0_0_2px]"
                    value="Pedro Duarte"
                />
            </fieldset>
            <fieldset class="mb-3.75 flex w-full flex-col justify-start">
                <label
                    class="text-green12 mb-2.5 block text-xs leading-none"
                    for="username"
                >
                    Username
                </label>
                <input
                    id="username"
                    class="text-grass11 shadow-green7 focus:shadow-green8 h-8.75 shrink-0 grow rounded-md bg-stone-50 px-2.5 text-sm leading-none shadow-[0_0_0_1px] outline-none focus:shadow-[0_0_0_2px]"
                    value="@peduarte"
                />
            </fieldset>
            <div class="mt-5 flex justify-end">
                <button
                    class="bg-green4 text-green11 hover:bg-green5 focus:shadow-green7 inline-flex h-8.75 cursor-default items-center justify-center rounded-md px-3.75 text-sm leading-none font-medium outline-none focus:shadow-[0_0_0_2px]"
                >
                    Save changes
                </button>
            </div>
        </TabsContent>
        <TabsContent
            class="grow rounded-b-md bg-white p-5 outline-none focus:shadow-[0_0_0_2px] focus:shadow-black"
            value="tab2"
        >
            <p class="text-mauve11 mt-0! mb-5 text-sm leading-normal!">
                Change your password here. After saving, you'll be logged out.
            </p>
            <fieldset class="mb-3.75 flex w-full flex-col justify-start">
                <label
                    class="text-green12 mb-2.5 block text-xs leading-none"
                    for="currentPassword"
                >
                    Current password
                </label>
                <input
                    id="currentPassword"
                    class="text-grass11 shadow-green7 focus:shadow-green8 h-8.75 shrink-0 grow rounded-md bg-stone-50 px-2.5 text-sm leading-none shadow-[0_0_0_1px] outline-none focus:shadow-[0_0_0_2px]"
                    type="password"
                />
            </fieldset>
            <fieldset class="mb-3.75 flex w-full flex-col justify-start">
                <label
                    class="text-green12 mb-2.5 block text-xs leading-none"
                    for="newPassword"
                >
                    New password
                </label>
                <input
                    id="newPassword"
                    class="text-grass11 shadow-green7 focus:shadow-green8 h-8.75 shrink-0 grow rounded-md bg-stone-50 px-2.5 text-sm leading-none shadow-[0_0_0_1px] outline-none focus:shadow-[0_0_0_2px]"
                    type="password"
                />
            </fieldset>
            <fieldset class="mb-3.75 flex w-full flex-col justify-start">
                <label
                    class="text-green12 mb-2.5 block text-xs leading-none"
                    for="confirmPassword"
                >
                    Confirm password
                </label>
                <input
                    id="confirmPassword"
                    class="text-grass11 shadow-green7 focus:shadow-green8 h-8.75 shrink-0 grow rounded-md bg-stone-50 px-2.5 text-sm leading-none shadow-[0_0_0_1px] outline-none focus:shadow-[0_0_0_2px]"
                    type="password"
                />
            </fieldset>
            <div class="mt-5 flex justify-end">
                <button
                    class="bg-green4 text-green11 hover:bg-green5 focus:shadow-green7 inline-flex h-8.75 cursor-default items-center justify-center rounded-md px-3.75 text-sm leading-none font-medium outline-none focus:shadow-[0_0_0_2px]"
                >
                    Change password
                </button>
            </div>
        </TabsContent>
    </TabsRoot>
</template>
