<template>
    <Home-Layout>
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">

                <div class="alert alert-danger" role="alert" v-if="error !== null">
                    {{ error }}
                </div>

                <div class="card card-default">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form @submit.prevent="handleSubmit">
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail
                                    Address</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" v-model="email" required
                                           autofocus autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="password"
                                           required autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </Home-Layout>
</template>

<script>
import {axiosInstance} from '../../bootstrap'
import HomeLayout from '../../layouts/HomeLayout'
import {useStore} from "vuex";

export default {
    components: {
        HomeLayout
    },
    data() {
        return {
            email: "",
            password: "",
            error: null
        }
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault()
            this.loading = true;
            this.$store.dispatch("auth/login", {
                email: this.email,
                password: this.password
            }).then(
                () => {
                    this.$router.push('/dashboard')
                },
                (e) => {
                    this.loading = false;
                    this.error = e.response.data.message
                }
            )
        }
    }
}
</script>
