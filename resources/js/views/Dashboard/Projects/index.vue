<template>
    <Dashboard-Layout>
        <router-link :to="{name: 'ProjectCreate'}" class="btn btn-primary fa fa-plus-square mb-5">
            Create
        </router-link>

        <div class="alert alert-danger" role="alert" v-if="error !== null">
            {{ error.message }}
        </div>
        <div v-else-if="data !== null">
            <h3>Projects</h3>

            <div class="row">
                <input type="text" v-model="searchField" class="form-control mt-3 mb-5"
                       placeholder="Search by project name" @keyup="search">
            </div>

            <div class="row">
                <div class="card rounded col-xl-3 col-lg-3 col-md-2 col-sm-1 m-3 p-3" v-for="project in data.data">
                    <div class="card-header bg-white text-end">
                        <router-link :to="'/projects/'+project.id+'/edit'">
                            <span class="fa fa-edit"></span>
                        </router-link>
                        <a href="#" @click="deleteRecord(project.id)">
                            <span class="fa fa-trash"></span>
                        </a>
                    </div>
                    <div class="card-body">
                        <router-link :to="'/projects/' + project.id">
                            <h5 class="card-title">{{ project.name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ project.access_code }}</h6>
                            <p class="card-text">{{ project.description.slice(0, 20) }}</p>
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
import '@hennge/vue3-pagination/dist/vue3-pagination.css'
import useDelete from "../../../compsables/useDelete";

export default {
    name: 'Projects',
    components: {
        DashboardLayout,
        VPagination
    },
    created() {
        this.fetchAll()
    },
    data() {
        return {
            searchField: '',
            data: null,
            error: null
        }
    },
    methods: {
        search(e) {
            if (this.searchField.length >= 3) {
                const searchRequest = useFetch('/projects?search=' + this.searchField, {skip: true})
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
            const fetchRequest = useFetch('/projects', {skip: true});
            fetchRequest.fetchHandel().then(response => {
                    this.data = response.data.data
                },
                error => {
                    this.error = error.response.data
                }
            )
        },
        deleteRecord(id) {
            const deleteRequest = useDelete('/projects/' + id);
            deleteRequest.deleteItem().then(
                response => {
                    this.data.data.splice(this.data.data.findIndex(function (i) {
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
