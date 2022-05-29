const url = new URL(window.location);
const signInStatus = url.search.split("=")[1];
console.log(signInStatus)

const statusBTN = document.querySelector(".login-btn");

if(signInStatus === 'true'){
    statusBTN.innerHTML = "LOGOUT";
    statusBTN.addEventListener("click",()=>{
        window.location.assign("/login.php")
    })
}else{
    statusBTN.innerHTML = "LOGIN";
}
console.log(url.search)
const clearSearchParams = document.querySelector(".clear-search-params-icon");
clearSearchParams.addEventListener("click",()=>{
    // window.location.assign("/products.php");
});