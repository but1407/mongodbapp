require('./bootstrap');
import { createApp } from 'vue';
import App from './App.vue';
window.axios =require('axios');
const app = createApp(App);
// app.mount(#app);
