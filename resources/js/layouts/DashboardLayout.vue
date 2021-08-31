<template>
    <Dashboard-Header></Dashboard-Header>
    <main>
        <div class="container">
            <slot></slot>
        </div>
    </main>
</template>

<script>
import DashboardHeader from '../containers/DashboardHeader'

export default {
    name: 'DashboardLayout',
    components: {
        DashboardHeader
    }
}
</script>
