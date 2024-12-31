// src/axios.js
import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000/api', // URL de ton API Symfony (ajuste si nécessaire)
  headers: {
    'Content-Type': 'application/json',
  },
});

export default api;
