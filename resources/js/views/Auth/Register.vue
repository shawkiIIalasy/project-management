<template>
    <Home-Layout>
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">

                <div class="alert alert-danger" role="alert" v-if="error !== null">
                    {{ error }}
                </div>

                <div class="card card-default">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="first_name" class="col-sm-4 col-form-label text-md-right">First Name</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" v-model="first_name"
                                           required
                                           autofocus autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-sm-4 col-form-label text-md-right">Last Name</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" v-model="last_name" required
                                           autofocus autocomplete="off">
                                </div>
                            </div>

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
                                    <button type="submit" class="btn btn-primary" @click="handleSubmit">
                                        Register
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
            error: null
        }
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault()
            this.message = ""
            this.successful = false
            this.loading = true
            this.$store.dispatch("auth/register", {
                first_name: this.first_name,
                last_name: this.last_name,
                email: this.email,
                password: this.password
            }).then(
                (data) => {
                    this.$router.push('/login')
                },
                (error) => {
                    this.error = error.response.data.message
                    this.successful = false
                    this.loading = false
                }
            )
        }
    }
}
</script>
