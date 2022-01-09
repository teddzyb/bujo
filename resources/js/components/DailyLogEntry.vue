<template>
    <tr>
        <th scope="row">
            <div class="media align-items-center">
                <div class="media-body">
                    <span class="name mb-0 text-sm">{{ entry.title }}</span>
                </div>
            </div>
        </th>
        <td>
            {{ this.convertDate(entry.created_at) }}
        </td>
        <td>
            <span class="badge badge-dot mr-4">
                <i v-if="entry.mood == 'great'" class="bg-green"></i>
                <i v-else-if="entry.mood == 'good'" class="bg-info"></i>
                <i v-else-if="entry.mood == 'okay'" class="bg-orange"></i>
                <i v-else-if="entry.mood == 'bad'" class="bg-red"></i>
                <span class="status">{{ entry.mood }}</span>
            </span>
        </td>
        <td>
            <div class="d-flex align-items-center">
                {{ entry.description }}
            </div>
        </td>
        <td class="text-right">
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#!" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a @click="$emit('updateEntry', entry.id)" class="dropdown-item" href="#!" role="button">Edit</a>
                    <a @click="deleteEntry()" class="dropdown-item" href="#!" role="button">Delete</a>
                </div>
            </div>
        </td>
    </tr>
</template>

<script>
export default {
    name: "DailyLogEntry",
    props: ["entry"],
    methods: {
        convertDate(date) {
            let yourDate = new Date(date);
            return yourDate.toLocaleDateString().split('T')[0];
        },
        deleteEntry() {
            axios.delete('api/dailylog/' + this.entry.id)
            .then(response => {
                if (response.status == 200) {
                    this.$emit('updateLogs');
                }
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
}
</script>
