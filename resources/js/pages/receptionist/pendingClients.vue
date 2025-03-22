<script setup>
import { defineProps } from "vue";

const props = defineProps({
    clients: Array
});

const approveClient = async (id) => {
    await axios.post(`/receptionist/approve-client/${id}`);
    location.reload();
};
</script>

<template>
    <div>
        <h2>Pending Clients</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <tr v-for="client in clients" :key="client.id">
                <td>{{ client.name }}</td>
                <td>{{ client.email }}</td>
                <td><button @click="approveClient(client.id)">Approve</button></td>
            </tr>
        </table>
    </div>
</template>
