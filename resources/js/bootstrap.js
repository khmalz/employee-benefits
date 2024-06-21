import axios from "axios";
window.axios = axios;

import $ from "jquery";
window.jquery = window.jQuery = window.$ = $;

import GLightbox from "glightbox";
window.GLightbox = GLightbox;

import Datepicker from "flowbite-datepicker/Datepicker";
window.Datepicker = Datepicker;
Datepicker.locales.id = {
    days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
    daysShort: ["Mgu", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
    daysMin: ["Mg", "Sn", "Sl", "Ra", "Ka", "Ju", "Sa"],
    months: [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember",
    ],
    monthsShort: [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "Mei",
        "Jun",
        "Jul",
        "Ags",
        "Sep",
        "Okt",
        "Nov",
        "Des",
    ],
    today: "Hari Ini",
    clear: "Kosongkan",
};

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
