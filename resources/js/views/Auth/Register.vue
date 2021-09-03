<template>
    <Home-Layout>


        <div class="container register">
            <div class="row register-frame">
                <div class="col-md-3 register-left">
                    <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                    <h3>Welcome</h3>
                    <p>Manage your company.</p>
                    <router-link :to="{name: 'Login'}" class="btn link">
                        Login
                    </router-link>
                    <br/>
                </div>
                <div class="col-md-9 register-right">
                    <ul class="nav nav-tabs d-inline-block" id="myTab" role="tablist">
                        <li class="nav-item d-inline-block" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">Employee
                            </button>
                        </li>
                        <li class="nav-item d-inline-block" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">Manager
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="alert alert-danger mt-2" role="alert" v-if="error !== null">
                            {{ error.message }}
                        </div>
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Apply as a Employee</h3>
                            <div class="row register-form">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="first_name" type="text"
                                               :class="{'form-control':true, 'is-invalid': error !== null && typeof error.errors != 'undefined' && error.errors.first_name != null}"
                                               v-model="first_name"
                                               placeholder="First name"
                                               required
                                               autofocus autocomplete="off">
                                        <div class="invalid-feedback"
                                             v-if="error !== null && typeof error.errors != 'undefined' && error.errors.first_name != null">
                                            <ul>
                                                <li v-for="error in error.errors.first_name">
                                                    {{ error }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="last_name" type="text"
                                               :class="{'form-control':true, 'is-invalid': error !== null && typeof error.errors != 'undefined' && error.errors.last_name != null}"
                                               v-model="last_name"
                                               placeholder="Last name"
                                               required
                                               autofocus autocomplete="off">
                                        <div class="invalid-feedback"
                                             v-if="error !== null && typeof error.errors != 'undefined' && error.errors.last_name != null">
                                            <ul>
                                                <li v-for="error in error.errors.last_name">
                                                    {{ error }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <div class="col">
                                        <input id="email" type="email"
                                               v-model="email"
                                               :class="{'form-control':true, 'is-invalid': error !== null && typeof error.errors != 'undefined' && error.errors.email != null}"
                                               placeholder="Email"
                                               required
                                               autofocus autocomplete="off">
                                        <div class="invalid-feedback"
                                             v-if="error !== null && typeof error.errors != 'undefined' && error.errors.email != null">
                                            <ul>
                                                <li v-for="error in error.errors.email">
                                                    {{ error }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <div class="col">
                                        <input id="password" type="password"
                                               v-model="password"
                                               :class="{'form-control':true, 'is-invalid': error !== null && typeof error.errors != 'undefined' && error.errors.password != null}"
                                               placeholder="Password"
                                               required autocomplete="off">
                                        <div class="invalid-feedback"
                                             v-if="error !== null && typeof error.errors != 'undefined' && error.errors.password != null">
                                            <ul>
                                                <li v-for="error in error.errors.password">
                                                    {{ error }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col">
                                        <input id="access_code" type="password"
                                               v-model="access_code"
                                               :class="{'form-control':true, 'is-invalid': error !== null && typeof error.errors != 'undefined' && error.errors.access_code != null}"
                                               placeholder="Department access code"
                                               required autocomplete="off">
                                        <div class="invalid-feedback"
                                             v-if="error !== null && typeof error.errors != 'undefined' && error.errors.access_code != null">
                                            <ul>
                                                <li v-for="error in error.errors.access_code">
                                                    {{ error }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary w-100" @click="handleSubmit">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h3 class="register-heading">Apply as a Manager</h3>
                            <div class="row register-form">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="first_name" type="text"
                                               :class="{'form-control':true, 'is-invalid': error !== null && typeof error.errors != 'undefined' && error.errors.first_name != null}"
                                               v-model="first_name"
                                               placeholder="First name"
                                               required
                                               autofocus autocomplete="off">
                                        <div class="invalid-feedback"
                                             v-if="error !== null && typeof error.errors != 'undefined' && error.errors.first_name != null">
                                            <ul>
                                                <li v-for="error in error.errors.first_name">
                                                    {{ error }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="last_name" type="text"
                                               :class="{'form-control':true, 'is-invalid': error !== null && typeof error.errors != 'undefined' && error.errors.last_name != null}"
                                               v-model="last_name"
                                               placeholder="Last name"
                                               required
                                               autofocus autocomplete="off">
                                        <div class="invalid-feedback"
                                             v-if="error !== null && typeof error.errors != 'undefined' && error.errors.last_name != null">
                                            <ul>
                                                <li v-for="error in error.errors.last_name">
                                                    {{ error }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <div class="col">
                                        <input id="email" type="email"
                                               v-model="email"
                                               :class="{'form-control':true, 'is-invalid': error !== null && typeof error.errors != 'undefined' && error.errors.email != null}"
                                               placeholder="Email"
                                               required
                                               autofocus autocomplete="off">
                                        <div class="invalid-feedback"
                                             v-if="error !== null && typeof error.errors != 'undefined' && error.errors.email != null">
                                            <ul>
                                                <li v-for="error in error.errors.email">
                                                    {{ error }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <div class="col">
                                        <input id="password" type="password"
                                               v-model="password"
                                               :class="{'form-control':true, 'is-invalid': error !== null && typeof error.errors != 'undefined' && error.errors.password != null}"
                                               placeholder="Password"
                                               required autocomplete="off">
                                        <div class="invalid-feedback"
                                             v-if="error !== null && typeof error.errors != 'undefined' && error.errors.password != null">
                                            <ul>
                                                <li v-for="error in error.errors.password">
                                                    {{ error }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col">
                                        <input id="access_code" type="password"
                                               v-model="access_code"
                                               :class="{'form-control':true, 'is-invalid': error !== null && typeof error.errors != 'undefined' && error.errors.access_code != null}"
                                               placeholder="Manager access code"
                                               required autocomplete="off">
                                        <div class="invalid-feedback"
                                             v-if="error !== null && typeof error.errors != 'undefined' && error.errors.access_code != null">
                                            <ul>
                                                <li v-for="error in error.errors.access_code">
                                                    {{ error }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary w-100"
                                                @click="handleSubmit($event,true)">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </Home-Layout>
</template>

<script>
import HomeLayout from '../../layouts/HomeLayout'

export default {
    components: {
        HomeLayout
    },
    data() {
        return {
            first_name: "",
            last_name: "",
            email: "",
            password: "",
            access_code: "",
            error: null
        }
    },
    methods: {
        handleSubmit(e, manager = false) {
            e.preventDefault()
            this.message = ""
            this.successful = false
            this.loading = true
            let request = "auth/register";
            if (manager === true) {
                request = "auth/registerManager";
            }
            this.$store.dispatch(request, {
                first_name: this.first_name,
                last_name: this.last_name,
                email: this.email,
                password: this.password,
                access_code: this.access_code
            }).then(
                (data) => {
                    this.$router.push('/login')
                },
                (error) => {
                    this.error = error.response.data
                    this.successful = false
                    this.loading = false
                }
            )
        }
    }
}
</script>
