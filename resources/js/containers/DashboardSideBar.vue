<template>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div><a href="#" class="nav_logo"> <i class='fa fa-tachometer-alt nav_logo-icon'></i> <span
                class="nav_logo-name">Project Management</span>
            </a>
                <div class="nav_list">
                    <router-link :to="{name: 'Projects'}" class="nav_link">
                        <i class='fa fa-project-diagram nav_icon'></i>
                        <span class="nav_name">Projects</span>
                    </router-link>
                    <router-link v-show="isManager" :to="{name: 'Departments'}" class="nav_link">
                        <i class='fa fa-building nav_icon'></i>
                        <span class="nav_name">Departments</span>
                    </router-link>
                    <router-link v-show="isManager" :to="{name: 'Employees'}" class="nav_link">
                        <i class='fa fa-users nav_icon'></i>
                        <span class="nav_name">Employees</span>
                    </router-link>
                </div>
            </div>
            <a @click="logout" class="nav_link"> <i class='fa fa-sign-out-alt nav_icon'></i> <span
                class="nav_name">SignOut</span>
            </a>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'DashboardSideBar',
    computed: {
        isManager() {
            return this.$store.state.auth.user.is_manager
        }
    },
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
