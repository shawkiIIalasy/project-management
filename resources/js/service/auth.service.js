import {axiosInstance} from '../bootstrap'
import header from './header'

class AuthService {
    login(user) {
        return axiosInstance.get('/sanctum/csrf-cookie')
            .then(response => {
                return axiosInstance.post('/login', {
                    email: user.email,
                    password: user.password
                })
                    .then(response => {
                        if (response.data.data.access_token) {
                            localStorage.setItem('user', JSON.stringify(response.data.data));
                        }
                        return response.data;
                    })
            })
    }

    logout() {
        axiosInstance.defaults.headers = header()
        return axiosInstance.get('/sanctum/csrf-cookie')
            .then(response => {
                return axiosInstance.post('/logout')
                    .then(response => {
                        localStorage.removeItem('user');
                        return response.data;
                    })
            })
    }

    register(user) {
        return axiosInstance.post('/register', {
            first_name: user.first_name,
            last_name: user.last_name,
            email: user.email,
            password: user.password
        });
    }

    authenticated(){
        axiosInstance.defaults.headers = header()
        return axiosInstance.get('/authenticated')
    }
}

export default new AuthService();
