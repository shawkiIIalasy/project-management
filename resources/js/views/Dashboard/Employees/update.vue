<template>
    <Dashboard-Layout>
        <router-link :to="{name: 'Employees'}" class="btn btn-primary fa fa-arrow-alt-circle-left mb-5">Employees
        </router-link>
        <div class="alert alert-danger" role="alert" v-if="error !== null">
            {{ error.message }}
        </div>
        <h3>Update Employee</h3>
        <form @submit.prevent="create">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" v-model="first_name"
                       :class="{'form-control':true, 'is-invalid': error !== null && error.errors !== null && error.errors.first_name !== null}"
                       id="first_name">
                <div class="invalid-feedback"
                     v-if="error !== null && error.errors !== null && error.errors.first_name !== null">
                    <ul>
                        <li v-for="error in error.errors.first_name">
                            {{ error }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" v-model="last_name"
                       :class="{'form-control':true, 'is-invalid': error !== null && error.errors !== null && error.errors.last_name !== null}"
                       id="last_name">
                <div class="invalid-feedback"
                     v-if="error !== null && error.errors !== null && error.errors.last_name !== null">
                    <ul>
                        <li v-for="error in error.errors.last_name">
                            {{ error }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" v-model="email"
                       :class="{'form-control':true, 'is-invalid': error !== null && error.errors !== null && error.errors.email !== null}"
                       id="email">
                <div class="invalid-feedback"
                     v-if="error !== null && error.errors !== null && error.errors.email !== null">
                    <ul>
                        <li v-for="error in error.errors.email">
                            {{ error }}
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" v-model="password"
                       :class="{'form-control':true, 'is-invalid': error !== null && error.errors !== null && error.errors.password !== null}"
                       id="password">
                <div class="invalid-feedback"
                     v-if="error !== null && error.errors !== null && error.errors.password !== null">
                    <ul>
                        <li v-for="error in error.errors.password">
                            {{ error }}
                        </li>
                    </ul>
                </div>
            </div>

            <Multiselect
                v-model="value"
                mode="tags"
                placeholder="Select department"
                :close-on-select="true"
                track-by="name"
                label="name"
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
import Multiselect from '@suadelabs/vue3-multiselect'
import useFetch from "../../../compsables/useFetch";

export default {
    name: 'ProjectCreate',
    components: {
        DashboardLayout,
        Multiselect
    },
    data() {
        return {
            first_name: '',
            last_name: '',
            email: '',
            password: '',
            department_id: 0,
            error: null,
            value: null,
            options: []
        }
    },
    created() {
        const fetchDepartments = useFetch('/departments/list', {skip: true})
        fetchDepartments.fetchHandel().then(
            response => {
                this.options = this.prepareSelectData(response.data.data)
            },
            error => {
                this.error = error.response.data
            }
        )

        const {fetchHandel} = useFetch('/employees/' + this.$route.params.id, {skip: true})
        fetchHandel().then(
            response => {
                this.first_name = response.data.data.employee.first_name
                this.last_name = response.data.data.employee.last_name
                this.email = response.data.data.employee.email
                this.value = {'id' : response.data.data.department.id, 'name': response.data.data.department.name}
            },
            error => {
                this.error = error.response.data
            }
        )
    },
    methods: {
        async create() {
            const {post} = usePost('/employees/'  + this.$route.params.id);
            post({
                first_name: this.first_name,
                last_name: this.last_name,
                email: this.email,
                password: this.password,
                department_id: this.value.id
            }).then(response => {
                    this.$router.push('/employees')
                },
                error => {
                    this.error = error.response.data
                })
        },
        prepareSelectData(items){
            const list = []
            for(let item in items){
                list.push({'id': item, 'name': items[item] })
            }
            return list
        }
    }
}
</script>
