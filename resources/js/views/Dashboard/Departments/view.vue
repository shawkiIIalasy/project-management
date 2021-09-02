<template>
    <Dashboard-Layout>
        <router-link :to="{name: 'Departments'}" class="btn btn-primary fa fa-arrow-alt-circle-left mb-5">Departments</router-link>
        <div class="alert alert-danger" role="alert" v-if="error !== null">
            {{ error.message }}
        </div>
        <div v-else-if="data !== null">
            <h3>Department: {{data.department.name}}</h3>
            <p>Description: {{data.department.description}}</p>
            <div>
                <ul>
                    <li v-for="user in data.users">
                        {{user.email}}
                    </li>
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
