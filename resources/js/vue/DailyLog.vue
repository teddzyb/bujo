<template>
    <div>
        <div class="header bg-green pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Daily Log</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="#" class="text-green"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#" class="text-green">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Daily Log</li>
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
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="title">Entry Title</label>
                                                <input v-model="entry.title" type="text" class="form-control" placeholder="Entry Title" name="title" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="mood">Mood</label>
                                                <select v-model="entry.mood" class="form-control" name="mood">
                                                    <option selected>Select a mood</option>
                                                    <option value="great">Great</option>
                                                    <option value="good">Good</option>
                                                    <option value="okay">Okay</option>
                                                    <option value="bad">Bad</option>
                                                    <option value="terrible">Terrible</option>
                                                </select>
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
                            <DailyLogEntries v-on:updateEntry="editEntry" v-on:updateLogs="getEntries()" :entries="logEntries" />
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
import DailyLogEntries from '../components/DailyLogEntries.vue';

export default {
    name: "DailyLog",
    components: {
        DailyLogEntries,
    },
    data: function() {
        return {
            entry: {
                title: "",
                mood: "Select a mood",
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
            if (this.entry.title == "" ||
                this.entry.mood == "Select a mood" ||
                this.entry.description == "") {
                this.error.push("please fill in all the fields");
                return;
            } else {
                this.error = [];
                axios.post('api/dailylog/store', {
                    dailylog: this.entry,
                })
                .then(response => {
                    if (response.status == 201) {
                        this.entry.title = "";
                        this.entry.mood = "Select a mood";
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
            axios.get('api/dailylogs')
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
                    this.entry.title = entry.title;
                    this.entry.mood = entry.mood;
                    this.entry.description = entry.description;
                }
            });
        },
        cancelEdit() {
            this.editMode = 0;
            this.entry.title = "";
            this.entry.mood = "Select a mood";
            this.entry.description = "";
        },
        updateEntry() {
            axios.put('api/dailylog/' + this.editMode, {
                dailylog: this.entry,
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
