"use strict";
const login_btn = document.querySelector(".login-btn");
login_btn.addEventListener("click", () => {
    window.location.assign("/login");
});
const e_drink_text = document.querySelector(".energy-span");
const e_drink_string = "Energy Drink"
let current = 0;
const typeWriterHandler = () => {
    if (current === e_drink_string.length) {
        current = 0;
        e_drink_text.innerHTML = "";
    }
    else {
        e_drink_text.innerHTML += e_drink_string[current];
        current += 1;
    }
};
setInterval(typeWriterHandler, 500);
