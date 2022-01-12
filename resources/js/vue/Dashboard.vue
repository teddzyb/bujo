<template>
<div>
    <!-- Header -->
    <div class="header bg-green pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a class="text-green" href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a class="text-green" href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral text-green">New</a>
                        <a href="#" class="btn btn-sm btn-neutral text-green">Filters</a>
                    </div>
                </div>
            </div>
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Daily</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ dailyLogs.length }} entries</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-book-bookmark"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{ dailyLogs.length * 100 }}%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Productivity</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ activityLogs.length }} tasks</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-yellow text-white rounded-circle shadow">
                                        <i class="ni ni-satisfied"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{ activityLogs.length * 100 }}%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Average Water</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ avgWater }} glasses</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-cyan text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{avgWater * 100}}%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Average Sleep</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ avgSleep }} hours</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-favourite-28"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{ avgSleep * 100}}%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Mood Tracker</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-green">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Mood</th>
                                    <th scope="col">Count</th>
                                    <th scope="col">Average</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        Great
                                    </th>
                                    <td>
                                        {{ great }}
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-up text-success mr-3"></i> {{ great * 100}}%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Good
                                    </th>
                                    <td>
                                        {{ good }}
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-up text-success mr-3"></i> {{good * 100}}%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Okay
                                    </th>
                                    <td>
                                        {{ okay }}
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-up text-success mr-3"></i> {{okay * 100}}%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Bad
                                    </th>
                                    <td>
                                        {{ bad }}
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-up text-success mr-3"></i> {{bad * 100}}%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Terrible
                                    </th>
                                    <td>
                                        {{ terrible }}
                                    </td>
                                    <td>
                                        <i class="fas fa-arrow-up text-success mr-3"></i> {{terrible * 100}}%
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Top Activities</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-green">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Activity</th>
                                    <th scope="col">Count</th>
                                    <th scope="col">Average</th>
                                </tr>
                            </thead>
                            <TopActivities :activities="activities" />
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import TopActivities from '../components/TopActivities.vue';

export default {
    name: "Dashboard",
    components: {
        TopActivities,
    },
    data: function() {
        return {
            dailyLogs: [],
            activityLogs: [],
            hydrationLogs: [],
            sleepLogs: [],
        }
    },
    methods: {
        getEntries() {
            // Daily Logs
            axios.get('api/dailylogs')
            .then(response => {
                this.dailyLogs = response.data;
                console.log(this.dailyLogs);
            })
            .catch(error => {
                console.log(error);
            });
            // Activity Logs
            axios.get('api/activitylogs')
            .then(response => {
                this.activityLogs = response.data;
            })
            .catch(error => {
                console.log(error);
            });
            // Hydration Logs
            axios.get('api/hydrationlogs')
            .then(response => {
                this.hydrationLogs = response.data;
            })
            .catch(error => {
                console.log(error);
            });
            // Sleep Logs
            axios.get('api/sleeplogs')
            .then(response => {
                this.sleepLogs = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        },
    },
    computed: {
        activities: function () {
            let topActivities = {};
            this.activityLogs.forEach(activity => {
                if (activity.activity in topActivities) {
                    topActivities[activity.activity][1]++;
                } else {
                    topActivities[activity.activity] = [activity.activity, 1];
                }
            });
            return topActivities;
        },
        avgWater: function () {
            let avgWater = 0;
            this.hydrationLogs.forEach(log => {
                avgWater += log.glasses;
            });
            return avgWater;
        },
        avgSleep: function () {
            let avgSleep = 0;
            this.sleepLogs.forEach(log => {
                avgSleep += log.hours;
            });
            return avgSleep;
        },
        great: function () {
            let ret = 0;
            this.dailyLogs.forEach(log => {
                ret += log.mood == "great" ? 1 : 0;
            });
            return ret;
        },
        good: function () {
            let ret = 0;
            this.dailyLogs.forEach(log => {
                ret += log.mood == "good" ? 1 : 0;
            });
            return ret;
        },
        okay: function () {
            let ret = 0;
            this.dailyLogs.forEach(log => {
                ret += log.mood == "okay" ? 1 : 0;
            });
            return ret;
        },
        bad: function () {
            let ret = 0;
            this.dailyLogs.forEach(log => {
                ret += log.mood == "bad" ? 1 : 0;
            });
            return ret;
        },
        terrible: function () {
            let ret = 0;
            this.dailyLogs.forEach(log => {
                ret += log.mood == "terrible" ? 1 : 0;
            });
            return ret;
        }
    },
    created() {
        this.getEntries();
    },
}
</script>
