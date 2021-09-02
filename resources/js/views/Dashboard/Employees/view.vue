<template>
    <Dashboard-Layout>
        <router-link :to="{name: 'Employees'}" class="btn btn-primary fa fa-arrow-alt-circle-left mb-5">Employees</router-link>
        <div class="alert alert-danger" role="alert" v-if="error !== null">
            {{ error.message }}
        </div>
        <div v-else-if="data !== null">
            <h3>Employee: {{data.employee.first_name}} {{data.employee.last_name }}</h3>
            <h5>Email: {{data.employee.email}}</h5>
            <h5>Department: {{data.department.name}}</h5>
        </div>
    </Dashboard-Layout>
</template>

<script>
import DashboardLayout from '../../../layouts/DashboardLayout'
import useFetch from "../../../compsables/useFetch";
import {useRoute} from 'vue-router'

export default {
    name: 'DepartmentView',
    components: {
        DashboardLayout
    },
    setup(){
        const route = useRoute()
        const { data, loading, error } = useFetch('/employees/' + route.params.id)
        return { data, loading, error }
    }
}
</script>
