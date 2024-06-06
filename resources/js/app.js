import Inputmask from "inputmask";

document.addEventListener("DOMContentLoaded", function() {
    const phoneInput = document.getElementById('input-phone');
    if (phoneInput) {
        const im = new Inputmask("+7 (999) 999-99-99");
        im.mask(phoneInput);
    }

});

