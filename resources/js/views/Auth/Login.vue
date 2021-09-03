<template>
    <Home-Layout>
        <div class="container register">
            <div class="row register-frame">
                <div class="col-md-3 register-left">
                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                    <h3>Welcome</h3>
                    <p>Manage your company.</p>
                    <router-link :to="{name: 'Register'}" class="btn link">
                        Register
                    </router-link>
                    <br/>
                </div>
                <div class="col-md-9 register-right">
                    <h3 class="register-heading">Login</h3>
                    <div class="row register-form">
                        <div class="alert alert-danger" role="alert" v-if="error !== null">
                            {{ error.message }}
                        </div>
                        <form @submit.prevent="handleSubmit" class="position-relative">
                            <div class="form-group row m-3">
                                <div class="col">
                                    <input id="email" type="email"
                                           v-model="email"
                                           :class="{'form-control':true, 'is-invalid': error !== null && error.errors != null && error.errors.email != null}"
                                           placeholder="Email"
                                           required
                                           autofocus autocomplete="off">
                                    <div class="invalid-feedback"
                                         v-if="error !== null && error.errors != null && error.errors.email != null">
                                        <ul>
                                            <li v-for="error in error.errors.email">
                                                {{ error }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row m-3">
                                <div class="col">
                                    <input id="password" type="password"
                                           v-model="password"
                                           :class="{'form-control':true, 'is-invalid': error !== null && error.errors != null && error.errors.password != null}"
                                           placeholder="Password"
                                           required autocomplete="off">
                                    <div class="invalid-feedback"
                                         v-if="error !== null && error.errors != null && error.errors.password != null">
                                        <ul>
                                            <li v-for="error in error.errors.password">
                                                {{ error }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row m-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary w-100">
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
                    this.$router.push('/projects')
                },
                (e) => {
                    this.loading = false;
                    this.error = e.response.data
                }
            )
        }
    }
}
</script>
