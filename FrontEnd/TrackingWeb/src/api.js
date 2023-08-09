import axios from 'axios';
import Cookies from 'js-cookie';

const apiClient = axios.create({
  baseURL: 'https://api1.mams-ark.my.id/api/',
});

//Get Token auth_token in Header in all request
apiClient.interceptors.request.use(function (config) {
    const token = Cookies.get('auth_token');
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  }, function (error) {
    return Promise.reject(error);
  });

export default apiClient;
