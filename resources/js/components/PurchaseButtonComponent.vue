<template>
    <div>
        <p v-if="showPurchases">Nopirkts <span id="purchases_count">{{ purchasesCount }}</span> reizes</p>
        <button @click="purchase" class="btn btn-success" :disabled="isButtonDisabled">Pirkt</button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        bookId: Number,
        purchasesCount: Number,
        showPurchases: Boolean,
    },
    data() {
        return {
            isButtonDisabled: false,
        };
    },
    methods: {
        purchase() {
            this.isButtonDisabled = true;

            // Include the CSRF token in the headers
            axios.post(`/api/books/${this.bookId}/purchase`, {}, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                },
            }).then(response => {
                if (response.data) {
                    this.isButtonDisabled = false;
                    this.purchasesCount++;
                }
            });
        }
    }
}
</script>
