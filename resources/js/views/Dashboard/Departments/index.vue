<template>
    <Dashboard-Layout>
        <router-link :to="{name: 'DepartmentCreate'}" class="btn btn-primary fa fa-plus-square mb-5">Create
        </router-link>

        <div class="alert alert-danger" role="alert" v-if="error !== null">
            {{ error.message }}
        </div>
        <div v-else-if="data !== null">
            <h3>Departments</h3>
            <div class="row">
                <div class="card rounded col-xl-3 col-lg-3 col-md-2 col-sm-1 m-3 p-3" v-for="department in data.data">
                    <div class="card-header bg-white text-end">
                        <router-link :to="'/departments/'+department.id+'/edit'">
                            <span class="fa fa-edit"></span>
                        </router-link>
                        <a href="#" @click="deleteRecord(department.id)">
                            <span class="fa fa-trash" ></span>
                        </a>
                    </div>
                    <div class="card-body">
                        <router-link :to="'/departments/' + department.id">
                            <h5 class="card-title">{{ department.name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ department.access_code }}</h6>
                            <p class="card-text">{{ department.description.slice(0, 20) }}</p>
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
import useDelete from "../../../compsables/useDelete";

export default {
    name: 'Departments',
    components: {
        DashboardLayout,
        VPagination
    },
    setup() {
        const {data, loading, error} = useFetch('/departments');
        return {data, loading, error}
    },
    methods: {
        deleteRecord(id) {
            const deleteRequest  = useDelete('/departments/' + id);
            deleteRequest.deleteItem().then(
                response => {
                    this.data.data.splice(this.data.data.findIndex(function(i){
                        return i.id === id;
                    }), 1);
                },
                error => {
                    this.error = error.response.data

                }
            )
        }
    }
}
</script>
