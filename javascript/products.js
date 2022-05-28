const url = new URL(window.location);
const signInStatus = url.search.split("=")[1];
console.log(signInStatus)

const statusBTN = document.querySelector(".login-btn");

if(signInStatus === 'true'){
    statusBTN.innerHTML = "LOGOUT";
    statusBTN.addEventListener("click",()=>{
        window.location.assign("/login.html")
    })
}else{
    statusBTN.innerHTML = "LOGIN";
}