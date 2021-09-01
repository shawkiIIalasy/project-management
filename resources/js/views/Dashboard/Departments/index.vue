<template>
    <Dashboard-Layout>
        {{data}}
    </Dashboard-Layout>
</template>

<script>
import DashboardLayout from '../../../layouts/DashboardLayout'
import useFetch from '../../../compsables/useFetch'

export default {
    name: 'Departments',
    components: {
        DashboardLayout
    },
    setup(){
        const { data, loading } = useFetch('/departments');
        return { data, loading }
    }
}
</script>
