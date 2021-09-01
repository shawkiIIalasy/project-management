<template>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div><a href="#" class="nav_logo"> <i class='fa fa-tachometer-alt nav_logo-icon'></i> <span class="nav_logo-name">Project Management</span>
            </a>
                <div class="nav_list">
                    <a href="#" class="nav_link"> <i class='fa fa-project-diagram nav_icon'></i>
                        <span class="nav_name">Projects</span>
                    </a>
                    <router-link :to="{name: 'Departments'}" class="nav_link"> <i class='fa fa-building nav_icon'></i>
                        <span class="nav_name">Departments</span>
                    </router-link>
                    <a href="#" class="nav_link"> <i class='fa fa-users nav_icon'></i>
                        <span class="nav_name">Employees</span>
                    </a>
                </div>
            </div>
            <a href="#" class="nav_link"> <i class='fa fa-sign-out-alt nav_icon'></i> <span class="nav_name">SignOut</span>
            </a>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'DashboardSideBar'
}
</script>
