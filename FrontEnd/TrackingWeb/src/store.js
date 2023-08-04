import { defineStore } from 'pinia';
import apiClient from '@/api'; 
import Cookies from 'js-cookie'; 

export const useAuthStore = defineStore('auth', {
  state: () => ({
    token: null,
  }),
  actions: {
    setToken(token) {
      this.token = token;
      Cookies.set('auth_token', token);
    },
    //Login
    async login(email, password) {
      try {
        const response = await apiClient.post('login', { email, password });
        const { token } = response.data;
        this.setToken(token);
        return true;
        } catch (error) {
        throw error;
      }
    },
    //Logout
    async logout() {
        try {
          await apiClient.post('logout');
          this.setToken(null);
          Cookies.remove('auth_token');
        } catch (error) {
          console.error(error);
        }
    }
  },
});
