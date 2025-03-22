<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

const reservations = ref([]);

const fetchReservations = async () => {
    const response = await axios.get("/receptionist/client-reservations");
    reservations.value = response.data;
};

onMounted(fetchReservations);
</script>

<template>
    <div>
        <h2>Client Reservations</h2>
        <table>
            <tr>
                <th>Client Name</th>
                <th>Room Number</th>
                <th>Accompany Number</th>
                <th>Paid Price</th>
            </tr>
            <tr v-for="reservation in reservations" :key="reservation.id">
                <td>{{ reservation.client.name }}</td>
                <td>{{ reservation.room.number }}</td>
                <td>{{ reservation.accompany_number }}</td>
                <td>${{ reservation.paid_price / 100 }}</td>
            </tr>
        </table>
    </div>
</template>
