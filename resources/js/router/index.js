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

const AuthenticatedManager = (to, from, next) => {
    store.dispatch("auth/authenticated")
    if (store.state.auth.status.loggedIn && store.state.auth.user.is_manager) {
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
        beforeEnter: AuthenticatedManager,
        component: () => import('../views/Dashboard/Departments/index')
    },
    {
        path: '/departments/create',
        name: 'DepartmentCreate',
        beforeEnter: AuthenticatedManager,
        component: () => import('../views/Dashboard/Departments/create')
    },

    {
        path: '/departments/:id/edit',
        name: 'DepartmentUpdate',
        beforeEnter: Authenticated,
        component: () => import('../views/Dashboard/Departments/update')
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
