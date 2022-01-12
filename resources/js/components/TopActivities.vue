<template>
    <tbody>
        <tr v-if="Object.keys(activities).length == 0">
            <td scope="row" colspan="3" rowspan="5" class="text-center">
                Top activities will display here
            </td>
        </tr>
        <tr v-else v-for="(activity, index) in activities" :key="index">
            <th scope="row">
                {{ activity[0] }}
            </th>
            <td>
                {{ activity[1] }}
            </td>
            <td>
                <i class="fas fa-arrow-up text-success mr-3"></i> {{ activity[1] * 100 }}%
            </td>
        </tr>
    </tbody>
</template>

<script>
export default {
    name: "TopActivities",
    props: ["activities"],
}
</script>
