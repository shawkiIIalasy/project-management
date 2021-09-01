import { axiosInstance } from '../bootstrap'
import header from '../service/header'

const usePost = (url, config = {}) => {
    axiosInstance.defaults.headers = header()


    const post = async (requests) => {
        return await axiosInstance.post(url, requests, { ...config })
    }
    return { post }
}

export default usePost
