const hamburger_menu = document.querySelector(".hamburger-menu");
const sidebar = document.querySelector(".navbar");
let hamburger_menu_status = false;
hamburger_menu.addEventListener("click", () => {
    if (hamburger_menu_status) {
        sidebar.classList.remove("show-navbar");
        sidebar.classList.add("hide-navbar");
    }
    else {
        sidebar.classList.remove("hide-navbar");
        sidebar.classList.add("show-navbar");
    }
    hamburger_menu_status = !hamburger_menu_status;
});

const SideBarMain = document.querySelector(".navbar-main");
const SideBarAbout = document.querySelector(".navbar-about");
const SideBarProducts = document.querySelector(".navbar-products");
const SideBarRegister = document.querySelector(".navbar-register");
const LoginBTN = document.querySelector(".login-btn");
const handleNav = (page=null) => {
    if(!page){
        window.location.assign("/");
        return;
    }
    window.location.assign(`/${page}.html`);
}

SideBarMain.addEventListener("click",()=>{
    handleNav();
});
SideBarAbout.addEventListener("click",()=>{
    handleNav("about");
});
SideBarProducts.addEventListener("click",()=>{
    handleNav("products");
});
SideBarRegister.addEventListener("click",()=>{
    handleNav("register");
});

LoginBTN.addEventListener("click",()=>{
    handleNav("login");
});

