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
            <div class="d-flex align-items-center">
                <span class="mr-2">{{ entry.glasses }}</span>
                <div>
                    <div class="progress">
                        <div v-if="entry.glasses <= 1" class="progress-bar bg-gradient-darker" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="80" style="width: 0%;"></div>
                        <div v-else-if="entry.glasses <= 2" class="progress-bar bg-gradient-red" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="80" style="width: 10%;"></div>
                        <div v-else-if="entry.glasses <= 3" class="progress-bar bg-gradient-red" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="80" style="width: 25%;"></div>
                        <div v-else-if="entry.glasses <= 4" class="progress-bar bg-gradient-orange" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="80" style="width: 40%;"></div>
                        <div v-else-if="entry.glasses <= 5" class="progress-bar bg-gradient-orange" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="80" style="width: 55%;"></div>
                        <div v-else-if="entry.glasses <= 6" class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="80" style="width: 70%;"></div>
                        <div v-else-if="entry.glasses <= 7" class="progress-bar bg-gradient-green" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="80" style="width: 85%;"></div>
                        <div v-else-if="entry.glasses <= 8" class="progress-bar bg-gradient-green" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="80" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
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
            axios.delete('api/hydrationlog/' + this.entry.id)
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
