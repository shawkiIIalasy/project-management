<template>
    <Dashboard-Layout>
        <div class="alert alert-danger" role="alert" v-if="error !== null">
            {{ error.message }}
        </div>
        <div v-else-if="data !== null">
            <h3>Employees</h3>
            <div class="row">
                <div class="card rounded col-12 m-3 p-3" v-for="employee in data.data">
                    <div class="card-body">
                        <h5 class="card-title">{{ employee.first_name }}  {{ employee.last_name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ employee.email }}</h6>
                    </div>
                </div>
            </div>
            <v-pagination

                v-model="data.current_page"
                :pages="data.total"
                :range-size="data.per_page"
                active-color="#DCEDFF"
                @update:modelValue="updateHandler"
            />
        </div>
    </Dashboard-Layout>
</template>

<script>
import DashboardLayout from '../../../layouts/DashboardLayout'
import useFetch from '../../../compsables/useFetch'
import VPagination from "@hennge/vue3-pagination";
import "@hennge/vue3-pagination/dist/vue3-pagination.css";

export default {
    name: 'Employees',
    components: {
        DashboardLayout,
        VPagination
    },
    setup() {
        const {data, loading, error} = useFetch('/employees');
        return {data, loading, error}
    }
}
</script>
