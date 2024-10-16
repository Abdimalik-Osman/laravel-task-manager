import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// Importing Bootstrap and its dependencies
import 'bootstrap';
import '@popperjs/core';
