<template>
    <div id="body-pd">
        <Dashboard-Header></Dashboard-Header>
        <Dashboard-Side-Bar></Dashboard-Side-Bar>

        <div class="height-100 bg-light p-5">
            <slot></slot>
        </div>
    </div>
</template>

<script>
import DashboardHeader from '../containers/DashboardHeader'
import DashboardSideBar from '../containers/DashboardSideBar'

export default {
    name: 'DashboardLayout',
    components: {
        DashboardHeader,
        DashboardSideBar
    },
    mounted() {

        const showNavbar = (toggleId, navId, bodyId, headerId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId)
            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener('click', () => {
                    nav.classList.toggle('show')
                    toggle.classList.toggle('bx-x')
                    bodypd.classList.toggle('body-pd')
                    headerpd.classList.toggle('body-pd')
                })
            }
        }

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink() {
            if (linkColor) {
                linkColor.forEach(l => l.classList.remove('active'))
                this.classList.add('active')
            }
        }

        linkColor.forEach(l => l.addEventListener('click', colorLink))
    }
}
</script>
