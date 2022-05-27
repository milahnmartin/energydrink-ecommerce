"use strict";
const login_btn = document.querySelector(".login-btn");
login_btn.addEventListener("click", () => {
    window.location.assign("/login");
});
const e_drink_text = document.querySelector(".energy-span");
const e_drink_name = ["E", "n", "e", "r", "g", "y", " ", "D", "r", "i", "n", "k"];
let current = 0;
const typeWriterHandler = () => {
    if (current === e_drink_name.length) {
        current = 0;
        e_drink_text.innerHTML = "";
    }
    else {
        e_drink_text.innerHTML += e_drink_name[current];
        current += 1;
    }
};
setInterval(typeWriterHandler, 500);
