<template>
    <div>
        <div class="header bg-green pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Sleep Log</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="#" class="text-green"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#" class="text-green">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Sleep Log</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="#" class="btn btn-sm btn-neutral text-green">New</a>
                            <a href="#" class="btn btn-sm btn-neutral text-green">Filters</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">{{ this.currentDateTime() }}</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">
                            <div class="mr-3">
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg">
                                            <div class="form-group">
                                                <label class="form-control-label" for="hours">Hours of Sleep</label>
                                                <input v-model="entry.hours" type="range" class="form-control-range" min="0" max="12" name="hours">
                                                <div class="text-center w-100 mt-2">{{ entry.hours }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pl-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="description">Description</label>
                                        <textarea v-model="entry.description" rows="4" class="form-control" placeholder="Enter the description for your entry..." name="description" required></textarea>
                                    </div>
                                    <div v-if="this.error.length > 0" class="text-center text-danger">
                                        Error: {{ this.error.join(", ") }}
                                    </div>
                                    <div class="text-center">
                                        <input @click="submitEntry" v-if="this.editMode == 0" class="bg-green btn text-white mt-2 mb-4" type="submit" value="Submit">
                                        <input @click="updateEntry" v-else class="bg-green btn text-white mt-2 mb-4" type="submit" value="Update">
                                        <input @click="cancelEdit" v-if="this.editMode != 0" class="btn bg-red text-white mt-2 mb-4" type="submit" value="Cancel">
                                    </div>
                                </div>
                            </div>
                            <SleepLogEntries v-on:updateEntry="editEntry" v-on:updateLogs="getEntries()" :entries="logEntries" />
                        </div>
                        <!-- Card footer -->
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#!" tabindex="-1">
                                            <i class="fas fa-angle-left"></i>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link bg-green border-0" href="#">1</a>
                                    </li>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#!">
                                            <i class="fas fa-angle-right"></i>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SleepLogEntries from '../components/SleepLogEntries.vue';

export default {
    name: "SleepLog",
    components: {
        SleepLogEntries,
    },
    data: function() {
        return {
            entry: {
                hours: 6,
                description: "",
            },
            error: [],
            logEntries: [],
            editMode: 0,
        }
    },
    methods: {
        currentDateTime() {
            const months = ["January", "February", "March", "April", "May", "June", "July",
                            "August", "September", "October", "November", "December"];
            const current = new Date();
            return months[current.getMonth()]+' '+current.getDate()+', '+current.getFullYear();
        },
        submitEntry() {
            if (this.entry.hours == "" ||
                this.entry.description == "") {
                this.error.push("please fill in all the fields");
                return;
            } else {
                this.error = [];
                axios.post('api/sleeplog/store', {
                    sleeplog: this.entry,
                })
                .then(response => {
                    if (response.status == 201) {
                        this.entry.hours = 6;
                        this.entry.description = "";
                        this.getEntries();
                    }
                })
                .catch(error => {
                    this.error.push(error);
                });
            }
        },
        getEntries() {
            axios.get('api/sleeplogs')
            .then(response => {
                this.logEntries = response.data;
                console.log(response.data);
            })
            .catch(error => {
                console.log(error);
            });
        },
        editEntry(id) {
            this.error = [];
            this.editMode = id;
            this.logEntries.forEach(entry => {
                if (entry.id == id) {
                    this.entry.hours = entry.hours;
                    this.entry.description = entry.description;
                }
            });
        },
        cancelEdit() {
            this.editMode = 0;
            this.entry.hours = 6;
            this.entry.description = "";
        },
        updateEntry() {
            axios.put('api/sleeplog/' + this.editMode, {
                sleeplog: this.entry,
            })
            .then(response => {
                if (response.status == 200) {
                    this.getEntries();
                }
            })
            .catch(error => {
                console.log(error);
            });
            this.cancelEdit();
            this.editMode = 0;
        }
    },
    created() {
        this.getEntries();
    }
}
</script>
