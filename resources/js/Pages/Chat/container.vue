<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import MessageContainer from './messageContainer.vue';
import InputMessage from './InputMessage.vue';
import ChatRoomSelection from './chatRoomSelection.vue';

import axios from 'axios';

import { def } from '@vue/shared';




</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <ChatRoomSelection
                v-if="currentRoom.id"
                :rooms="chatRooms"
                :currentRoom="currentRoom"
                v-on:roomChanged="setRoom($event)"
                />
            </h2>


        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                            <div class="mt-8 text-2xl">
                                <MessageContainer :messages="messages" />
                                <InputMessage :room="currentRoom" v-on:messagesent="getMessages()" />
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </AppLayout>
</template>

<script>
export default {
    data: function () {
        return {
            chatRooms: [],
            currentRoom: [],
            messages: []
        }
    },
    methods: {
        getRooms() {
            axios.get('/chat/rooms')
                .then(response => {
                    this.chatRooms = response.data;
                    this.setRoom(response.data[0]);
                })
                .catch(error => {
                    console.log(error);
                })
        },
        setRoom(room) {
            this.currentRoom = room;
            this.getMessages();
        },
        getMessages() {
            axios.get('/chat/room/' + this.currentRoom.id + '/messages')
                .then(response => {
                    this.messages = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },

    },
    created() {
        this.getRooms();
    }


}


</script>
