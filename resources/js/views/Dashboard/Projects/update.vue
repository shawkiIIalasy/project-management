<template>
    <Dashboard-Layout>
        <router-link :to="{name: 'Projects'}" class="btn btn-primary fa fa-arrow-alt-circle-left mb-5">Projects
        </router-link>
        <div class="alert alert-danger" role="alert" v-if="error !== null">
            {{ error.message }}
        </div>
        <h3>Update Project</h3>
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
            <Multiselect
                v-model="value"
                mode="tags"
                placeholder="Select employees"
                :multiple="true"
                :close-on-select="true"
                track-by="email"
                label="email"
                :search="true"
                :options="options"
            >
            </Multiselect>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </Dashboard-Layout>
</template>

<script>
import DashboardLayout from '../../../layouts/DashboardLayout'
import usePost from '../../../compsables/usePost'
import useFetch from '../../../compsables/useFetch'
import Multiselect from '@suadelabs/vue3-multiselect'

export default {
    name: 'ProjectUpdate',
    components: {
        DashboardLayout,
        Multiselect
    },
    data() {
        return {
            name: '',
            description: '',
            error: null,
            value: [],
            options: []
        }
    },
    created() {
        const fetchUsers = useFetch('/employees/list', {skip: true})
        fetchUsers.fetchHandel().then(
            response => {
                this.options = this.prepareSelectData(response.data.data)
            },
            error => {
                this.error = error.response.data
            }
        )
        const fetchProject = useFetch('/projects/' + this.$route.params.id, {skip: true})
        fetchProject.fetchHandel().then(
            response => {
                this.name = response.data.data.project.name
                this.description = response.data.data.project.description
                this.value = this.prepareSelectData(response.data.data.users)
            },
            error => {
                this.error = error.response.data
            }
        )
    },
    methods: {
        async update() {
            const {post} = usePost('/projects/' + this.$route.params.id);
            post({
                name: this.name,
                description: this.description,
                users: this.value.map(a => a.id)
            }).then(response => {
                    this.$router.push('/projects')
                },
                error => {
                    this.error = error.response.data
                })
        },
        prepareSelectData(items){
            const list = []
            for(let item in items){
                list.push({'id': item, 'email': items[item] })
            }
            return list
        }
    }
}
</script>
