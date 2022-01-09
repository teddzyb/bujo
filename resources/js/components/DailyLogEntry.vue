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
            {{ entry.created_at }}
        </td>
        <td>
            <span class="badge badge-dot mr-4">
                <i class="bg-green"></i>
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
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="#">View</a>
                    <a class="dropdown-item" href="#">Edit</a>
                    <a class="dropdown-item" href="#">Delete</a>
                </div>
            </div>
        </td>
    </tr>
</template>

<script>
export default {
    name: "DailyLogEntry",
    props: ["entry"]
}
</script>
