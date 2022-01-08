<template>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="#">
                    <img src="img/brand/green.png" class="navbar-brand-img" alt="Bujo">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav px-4">
                        <li class="nav-item">
                            <a class="nav-link" href='#'>
                                <i class="ni ni-chart-pie-35 text-green"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'DailyLog' }">
                            <a class="nav-link" href='#'>
                                <i class="ni ni-book-bookmark text-orange"></i>
                                <span class="nav-link-text">Daily Log</span>
                            </a>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='#'>
                                <i class="ni ni-satisfied text-yellow"></i>
                                <span class="nav-link-text">Activity Tracker</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='#'>
                                <i class="ni ni-chart-bar-32 text-teal"></i>
                                <span class="nav-link-text">Hydration Tracker</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='#'>
                                <i class="ni ni-favourite-28 text-red"></i>
                                <span class="nav-link-text">Sleep Log</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <ul class="navbar-nav px-4">
                        <li class="nav-item">
                            <a class="nav-link" href='#'>
                                <i class="ni ni-single-02 text-blue"></i>
                                <span class="nav-link-text">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href='#'>
                                <i class="ni ni-settings text-teal"></i>
                                <span class="nav-link-text">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    

</template>

<script>
export default {
    name: "SideNav"
}
</script>
