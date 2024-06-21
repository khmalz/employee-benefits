import axios from "axios";
window.axios = axios;

import $ from "jquery";
window.jquery = window.jQuery = window.$ = $;

import GLightbox from "glightbox";
window.GLightbox = GLightbox;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
