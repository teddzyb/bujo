<template>
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="sort" data-sort="name">Title</th>
                <th scope="col" class="sort" data-sort="budget">Date</th>
                <th scope="col" class="sort" data-sort="status">Mood</th>
                <th scope="col" class="sort" data-sort="completion">Description</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="list">
            <DailyLogEntry v-on:updateEntry="updateEntry" v-on:updateLogs="$emit('updateLogs')" v-for="(entry, index) in entries" :key="index" :entry="entry" />
        </tbody>
    </table>
</template>

<script>
import DailyLogEntry from './DailyLogEntry.vue';

export default {
    name: "DailyLogEntries",
    props: ['entries'],
    components: {
        DailyLogEntry
    },
    methods: {
        updateEntry(id) {
            this.$emit('updateEntry', id);
        }
    }
}
</script>
