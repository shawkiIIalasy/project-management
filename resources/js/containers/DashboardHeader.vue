<template>
    <header class="header" id="header">
        <div class="header_toggle"><i class='fa fa-bars' id="header-toggle"></i></div>

        <div class="dropdown">
            <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="header_img">
                    <img src="/images/user.png" alt="">
                </div>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" @click="logout">logout</a></li>
            </ul>
        </div>
    </header>
</template>

<script>
export default {
    name: 'Header',
    methods: {
        logout() {
            this.$store.dispatch("auth/logout").then(() => {
                this.$router.push('/login')
            }, (e) => {
                this.$router.push('/login')
            })
        }
    }
}
</script>
