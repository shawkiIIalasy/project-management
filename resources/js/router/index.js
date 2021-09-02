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
        path: '/departments/:id',
        name: 'DepartmentView',
        beforeEnter: Authenticated,
        component: () => import('../views/Dashboard/Departments/view')
    },
    {
        path: '/departments/:id/edit',
        name: 'DepartmentUpdate',
        beforeEnter: AuthenticatedManager,
        component: () => import('../views/Dashboard/Departments/update')
    },
    {
        path: '/projects',
        name: 'Projects',
        beforeEnter: Authenticated,
        component: () => import('../views/Dashboard/Projects/index')
    },
    {
        path: '/projects/create',
        name: 'ProjectCreate',
        beforeEnter: AuthenticatedManager,
        component: () => import('../views/Dashboard/Projects/create')
    },
    {
        path: '/projects/:id',
        name: 'ProjectView',
        beforeEnter: Authenticated,
        component: () => import('../views/Dashboard/Projects/view')
    },
    {
        path: '/projects/:id/edit',
        name: 'ProjectUpdate',
        beforeEnter: AuthenticatedManager,
        component: () => import('../views/Dashboard/Projects/update')
    },
    {
        path: '/employees',
        name: 'Employees',
        beforeEnter: AuthenticatedManager,
        component: () => import('../views/Dashboard/Employees/index')
    },
    {
        path: '/employees',
        name: 'EmployeeCreate',
        beforeEnter: AuthenticatedManager,
        component: () => import('../views/Dashboard/Employees/create')
    },
    {
        path: '/employees/:id/edit',
        name: 'EmployeeUpdate',
        beforeEnter: AuthenticatedManager,
        component: () => import('../views/Dashboard/Employees/update')
    },
    {
        path: '/employees/:id',
        name: 'EmployeeView',
        beforeEnter: Authenticated,
        component: () => import('../views/Dashboard/Employees/view')
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
