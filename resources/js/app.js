import './bootstrap';

import flatpickr from "flatpickr";
import Alpine from 'alpinejs';

window.flatpickr = flatpickr;
window.Alpine = Alpine;

Alpine.start();

flatpickr("#event_date", {
    dateFormat: "Y-m-d",
    minDate: "today"
});