import { axiosInstance } from '../bootstrap'
import header from '../service/header'

const useDelete = (url, config = {}) => {
    axiosInstance.defaults.headers = header()


    const deleteItem = async (requests) => {
        return await axiosInstance.delete(url, requests, { ...config })
    }
    return { deleteItem }
}

export default useDelete
