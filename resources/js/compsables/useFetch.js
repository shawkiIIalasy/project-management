import { ref } from 'vue'
import { axiosInstance } from '../bootstrap'
import header from '../service/header'


const useFetch = (url, config = {}) => {
    const data = ref(null)
    const error = ref(null)
    const response = ref(null)
    const loading = ref(false)
    const success = ref(false)

    axiosInstance.defaults.headers = header()

    const fetch = async (params = {}) => {
        loading.value = true
        try {
            const result = await axiosInstance.request({
                url,
                params,
                ...config
            })
            response.value = result
            data.value = result.data.data
            success.value = true
        } catch (e) {
            error.value = e.response.data
            loading.value = false
            success.value = false
        } finally {
            loading.value = false
        }
    }

    const fetchHandel = async (params = {}) => {
        return  await axiosInstance.request({
            url,
            params,
            headers: header(),
            ...config
        })
    }
    !config.skip && fetch()
    return { data, error, loading, response, success, fetch, fetchHandel }
}

export default useFetch
