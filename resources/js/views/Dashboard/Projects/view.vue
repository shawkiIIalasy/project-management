<template>
    <Dashboard-Layout>
        <router-link :to="{name: 'Projects'}" class="btn btn-primary fa fa-arrow-alt-circle-left mb-5">Projects</router-link>
        <div class="alert alert-danger" role="alert" v-if="error !== null">
            {{ error.message }}
        </div>
        <div v-else-if="data !== null">
            <h3>Project: {{data.project.name}}</h3>
            <p>Description: {{data.project.description}}</p>
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
    name: 'ProjectView',
    components: {
        DashboardLayout
    },
    setup(){
        const route = useRoute()
        const { data, loading, error } = useFetch('/projects/' + route.params.id)
        return { data, loading, error }
    }
}
</script>
