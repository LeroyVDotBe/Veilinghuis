require('./bootstrap');

//Flatpickr voor date & datetime velden
window.flatpickr("input[type='date']", {
    weekNumbers: true,
    altInput: true,
    time_24hr: true,

    altFormat: "j F Y",
    dateFormat: "Y-m-d",
});

window.flatpickr("input[type='datetime-local']", {
    weekNumbers: true,
    altInput: true,
    time_24hr: true,

    enableTime: true,
    altFormat: "j F Y, H:i",
    dateFormat: "Y-m-d H:i:00",
});
