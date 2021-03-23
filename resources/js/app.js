require('./bootstrap');

//Flatpickr handles datetime-local fields
window.flatpickr("input[type='datetime-local']", {
    weekNumbers: true,
    altInput: true,
    time_24hr: true,

    enableTime: true,
    altFormat: "j F Y, H:i",
    dateFormat: "Y-m-d H:i:00",
});
