<template>
    <Dashboard-Layout>
        <router-link :to="{name: 'Departments'}" class="btn btn-primary fa fa-arrow-alt-circle-left mb-5">Departments</router-link>
        <div class="alert alert-danger" role="alert" v-if="error !== null">
            {{ error.message }}
        </div>
        <h3>Update Department</h3>
        <form @submit.prevent="update">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" v-model="name"
                       :class="{'form-control':true, 'is-invalid': error !== null && error.errors !== null && error.errors.name !== null}"
                       id="name" aria-describedby="nameHelp">
                <div class="invalid-feedback"
                     v-if="error !== null && error.errors !== null && error.errors.name !== null">
                    <ul>
                        <li v-for="error in error.errors.name">
                            {{ error }}
                        </li>
                    </ul>
                </div>
                <div id="nameHelp" class="form-text">The name of the department should be unique.</div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea
                    :class="{'form-control':true, 'is-invalid': error !== null && error.errors !== null && error.errors.description !== null}"
                    v-model="description" id="description" rows="3"></textarea>
                <div class="invalid-feedback"
                     v-if="error !== null && error.errors !== null && error.errors.description !== null">
                    <ul>
                        <li v-for="error in error.errors.description">
                            {{ error }}
                        </li>
                    </ul>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </Dashboard-Layout>
</template>

<script>
import DashboardLayout from '../../../layouts/DashboardLayout'
import usePost from '../../../compsables/usePost'
import useFetch from '../../../compsables/useFetch'

export default {
    name: 'DepartmentUpdate',
    components: {
        DashboardLayout
    },
    data() {
        return {
            name: '',
            description: '',
            error: null
        }
    },
    created() {
        const {fetchHandel} = useFetch('/departments/' + this.$route.params.id, {skip: true})
        fetchHandel().then(
            response => {
                this.name = response.data.data.department.name
                this.description = response.data.data.department.description
            },
            error => {
                this.error = error.response.data
            }
        )
    },
    methods: {
        async update() {
            const {post} = usePost('/departments/' + this.$route.params.id);
            post({
                name: this.name,
                description: this.description
            }).then(response => {
                    this.$router.push('/departments')
                },
                error => {
                    this.error = error.response.data
                })
        }
    }
}
</script>
