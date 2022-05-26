const login_btn = document.querySelector(".login-btn") as HTMLButtonElement;

login_btn.addEventListener("click",() : void =>{
    window.location.assign("/login");
})


const e_drink_text = document.querySelector(".energy-span") as HTMLElement;
const e_drink_name = ["E","n","e","r","g","y"," ","D","r","i","n","k"];
let current = 0;

const typeWriterHandler = () => {
    if(current == e_drink_name.length){
        current = 0;
        e_drink_text.innerHTML = ""
    }else{
        e_drink_text.innerHTML += e_drink_name[current];
        current += 1;
    }
}

const typewriter = setInterval(typeWriterHandler,500);


const hamburger_menu = document.querySelector(".hamburger-menu") as HTMLButtonElement;
const sidebar = document.querySelector(".navbar") as HTMLDivElement;

let hamburger_menu_status = false;

hamburger_menu.addEventListener("click",() => {

    if(hamburger_menu_status){
        sidebar.classList.remove("show-navbar");
        sidebar.classList.add("hide-navbar");

    }else{
        sidebar.classList.remove("hide-navbar");
        sidebar.classList.add("show-navbar");
    }

    hamburger_menu_status = !hamburger_menu_status;

})