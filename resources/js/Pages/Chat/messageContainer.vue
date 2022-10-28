<script setup>
    import messageItem from './messageItem.vue';

</script>

<template>
    <div class="h-96 w-full">
        <div class="h-4 p-2 flex-col-reverse overflow-scroll" style="height: 100%;padding: 2rem;flex: revert;display: flex;overflow: hidden;">
            <div v-for="(message, index ) in messages" :key="index">
                <messageItem :message="message" />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['messages']
}
</script>