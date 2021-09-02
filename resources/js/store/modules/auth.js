import AuthService from '../../service/auth.service'
import router from '../../router'

const user = JSON.parse(localStorage.getItem('user'))
const initialState = user ? {status: {loggedIn: true}, user} : {status: {loggedIn: false}, user: null}

export const auth = {
    namespaced: true,
    state: initialState,
    actions: {
        login({commit}, user) {
            return AuthService.login(user).then(
                user => {
                    commit('loginSuccess', user)
                    return Promise.resolve(user)
                },
                error => {
                    commit('loginFailure')
                    return Promise.reject(error)
                }
            )
        },
        logout({commit}) {
            AuthService.logout()
            commit('logout')
        },
        authenticated({commit}) {
            AuthService.authenticated().then(
                response => {
                    commit('authenticated', response.data)
                    return Promise.resolve(response.data)
                },
                error => {
                    commit('unAuthenticated')
                    return Promise.reject(error)
                }
            )
        },
        register({commit}, user) {
            return AuthService.register(user).then(
                response => {
                    commit('registerSuccess')
                    return Promise.resolve(response.data)
                },
                error => {
                    commit('registerFailure')
                    return Promise.reject(error)
                }
            )
        }
    },
    mutations: {
        loginSuccess(state, user) {
            state.status.loggedIn = true
            state.user = user
        },
        loginFailure(state) {
            state.status.loggedIn = false
            state.user = null
        },
        logout(state) {
            state.status.loggedIn = false
            state.user = null
        },
        registerSuccess(state) {
            state.status.loggedIn = false
        },
        registerFailure(state) {
            state.status.loggedIn = false
        },
        authenticated(state, data) {
            state.status.loggedIn = true
        },
        unAuthenticated(state) {
            router.push('/login')
            localStorage.removeItem('user')
            state.status.loggedIn = false
            state.user = null
        },
    }
}
