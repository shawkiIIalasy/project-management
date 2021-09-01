import {createRouter, createWebHistory} from 'vue-router'
import store from '../store'

const Authenticated = (to, from, next) => {
    store.dispatch("auth/authenticated")
    if (store.state.auth.status.loggedIn) {
        next()
        return
    }
    next('/login')
}

const LoggedIn = (to, from, next) => {
    if (store.state.auth.status.loggedIn) {
        next('/dashboard')
        return
    }
    next()
}

const routes = [
    {
        path: '/',
        name: 'Home',
        beforeEnter: LoggedIn,
        component: () => import('../views/Auth/Login')
    },
    {
        path: '/dashboard',
        name: 'Dashboard',
        beforeEnter: Authenticated,
        component: () => import('../views/Dashboard/index')
    },
    {
        path: '/departments',
        name: 'Departments',
        beforeEnter: Authenticated,
        component: () => import('../views/Dashboard/Departments/index')
    },
    {
        path: '/departments/create',
        name: 'DepartmentCreate',
        beforeEnter: Authenticated,
        component: () => import('../views/Dashboard/Departments/create')
    },
    {
        path: '/departments/:id',
        name: 'DepartmentView',
        beforeEnter: Authenticated,
        component: () => import('../views/Dashboard/Departments/view')
    },
    {
        path: '/login',
        name: 'Login',
        beforeEnter: LoggedIn,
        component: () => import('../views/Auth/Login')
    },
    {
        path: '/register',
        name: 'Register',
        component: () => import('../views/Auth/Register')
    }
]

const router = createRouter({
    history: createWebHistory('/'),
    base: '/',
    routes
})


export default router
