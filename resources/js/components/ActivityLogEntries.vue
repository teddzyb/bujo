<template>
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="sort" data-sort="date">Date</th>
                <th scope="col" class="sort" data-sort="time">Time</th>
                <th scope="col" class="sort" data-sort="activity">Activity</th>
                <th scope="col" class="sort" data-sort="description">Description</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody class="list">
            <ActivityLogEntry v-on:updateEntry="updateEntry" v-on:updateLogs="$emit('updateLogs')" v-for="(entry, index) in entries" :key="index" :entry="entry" />
        </tbody>
    </table>
</template>

<script>
import ActivityLogEntry from './ActivityLogEntry.vue';

export default {
    name: "ActivityLogEntries",
    props: ['entries'],
    components: {
        ActivityLogEntry
    },
    methods: {
        updateEntry(id) {
            this.$emit('updateEntry', id);
        }
    }
}
</script>
