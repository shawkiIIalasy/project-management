require('./bootstrap')

import { createApp } from 'vue'
import App from './App'
import router from './router'
import store from './store'

import 'bootstrap/dist/js/bootstrap'

createApp(App)
    .use(router)
    .use(store)
    .mount('#app')
