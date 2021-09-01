<template>
    <Dashboard-Layout>
        <div class="alert alert-danger" role="alert" v-if="error !== null">
            {{ error.message }}
        </div>
        <div v-else>
            <h1>Department: {{data.department.name}}</h1>
            <p>Description: {{data.department.description}}</p>
            <div>
                <ul>
                    <li v-for="user in data.users"></li>
                </ul>
            </div>
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
        const { data, loading, error } = useFetch('/departments/' + route.params.id)
        return { data, loading, error }
    }
}
</script>
