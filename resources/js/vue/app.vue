<template>
    <div>
        <SideNav />
        <Content />
    </div>
</template>

<script>
import SideNav from "../components/SideNav.vue";
import Content from "../components/Content.vue";

export default {
    name: "App",
    components: {
        SideNav,
        Content,
    }
}
</script>
