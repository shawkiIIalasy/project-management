<template>
    <Home-Layout>
        <Dashboard></Dashboard>
    </Home-Layout>
</template>

<script>
import HomeLayout from '../layouts/HomeLayout'
import Dashboard from '../containers/Dashboard'
export default {
    name: 'Home',
    components: {
        Dashboard,
        HomeLayout
    }
}
</script>
