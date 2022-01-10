<template>
    <tr>
        <th scope="row">
            <div class="media align-items-center">
                <div class="media-body">
                    <span class="name mb-0 text-sm">{{ this.convertDate(entry.created_at) }}</span>
                </div>
            </div>
        </th>
        <td>
            {{ entry.time }}
        </td>
        <td>
            {{ entry.activity }}
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
    name: "ActivityLogEntry",
    props: ["entry"],
    methods: {
        convertDate(date) {
            let yourDate = new Date(date);
            return yourDate.toLocaleDateString().split('T')[0];
        },
        deleteEntry() {
            axios.delete('api/activitylog/' + this.entry.id)
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
