<template>
    <Dashboard-Layout>
        <router-link :to="{name: 'EmployeeCreate'}" class="btn btn-primary fa fa-plus-square mb-5">
            Create
        </router-link>

        <div class="alert alert-danger" role="alert" v-if="error !== null">
            {{ error.message }}
        </div>
        <div v-else-if="data !== null">
            <h3>Employees</h3>

            <div class="row">
                <input type="text" v-model="searchField" class="form-control mt-3 mb-5"
                       placeholder="Search by employee email" @keyup="search">
            </div>

            <div class="row">
                <div class="card rounded col-12 m-3 p-3" v-for="employee in data.data">
                    <div class="card-header bg-white text-end">
                        <router-link :to="'/employees/'+employee.id+'/edit'">
                            <span class="fa fa-edit"></span>
                        </router-link>
                    </div>
                    <div class="card-body">
                        <router-link :to="'/employees/' + employee.id">
                        <h5 class="card-title">{{ employee.first_name }}  {{ employee.last_name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ employee.email }}</h6>
                            <span class="fa fa-arrow-right"></span>
                        </router-link>
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
    data() {
        return {
            searchField: '',
            data: null,
            error: null
        }
    },
    created() {
        this.fetchAll()
    },
    methods: {
        search(e) {
            if (this.searchField.length >= 3) {
                const searchRequest = useFetch('/employees?search=' + this.searchField, {skip: true})
                searchRequest.fetchHandel().then(response => {
                        this.data = response.data.data
                    },
                    error => {
                        this.error = error.response.data
                    }
                )
            } else {
                this.fetchAll()
            }
        },
        fetchAll() {
            const fetchRequest = useFetch('/employees', {skip: true});
            fetchRequest.fetchHandel().then(response => {
                    this.data = response.data.data
                },
                error => {
                    this.error = error.response.data
                }
            )
        }
    }
}
</script>
