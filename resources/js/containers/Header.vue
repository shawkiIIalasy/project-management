<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <router-link :to="{name: 'Home'}" class="navbar-brand d-inline-block">
                    <h5 class="d-inline-block">Project Management</h5>
                </router-link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav navbar-main me-auto mb-2 mb-lg-0">

                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link class="nav-link btn btn-tab" :to="{name: 'Login'}">Login</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link btn btn-tab" :to="{name: 'Register'}">Register</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'Header'
}
</script>
