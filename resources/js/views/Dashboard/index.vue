<template>
    <Dashboard-Layout>
        <Dashboard></Dashboard>
    </Dashboard-Layout>
</template>

<script>
import DashboardLayout from '../../layouts/DashboardLayout'
import Dashboard from '../../containers/Dashboard'

export default {
    name: 'DashboardView',
    components: {
        DashboardLayout,
        Dashboard
    }
}
</script>
