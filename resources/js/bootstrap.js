import * as bootstrap from 'bootstrap';
import _ from 'lodash';
import axios from 'axios';
import swal from 'sweetalert2';
import jquery from 'jquery';
import 'datatables.net-bs5'

window.$ = jquery
window._ = _
window.axios = axios
wndow.axios = axios
window.swal = swal
window.bootstrap = bootstrap
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


const csrf_token = document.head.querySelector('meta[name = "csrf-token"]')
if (csrf_token){
    window.csrf_token = csrf_token.textContent
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = Window.csrf_token
} else console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')


