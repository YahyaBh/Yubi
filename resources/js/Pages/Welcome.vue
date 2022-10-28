<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>

    <Head title="Welcome" />

    <div class="relative flex items-top justify-center min-h-screen bg-white light:bg-gray-900 sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.user" :href="route('dashboard')"
                class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>

                <Link v-if="canRegister" :href="route('register')"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</Link>
            </template>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <img class="h-16 w-auto text-gray-700 sm:h-20" src="/images/yubi_4-749792340.png"
                    alt="yubi_4-749792340.png" />
            </div>

            <div class="mt-8 bg-white light:bg-gray-800 overflow-hidden shadow sm:rounded-lg"
                style="box-shadow: 0 0 20px -2px grey;">
                <div>
                    <div class="p-6">
                        <a href='/login' style="padding: 20px;
                        background-color: #404443;
                        margin: 0px;
                        width: 100%;
                        display: block;
                        text-align: center;
                        color: white;
                        border-radius: 8px;">Login</a>
                        <br>
                        <a href='/register' style="padding: 20px;
                        background-color: #3eca61;
                        margin: 0px;
                        width: 100%;
                        display: block;
                        text-align: center;
                        color: white;
                        border-radius: 8px;">Register</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</template>
