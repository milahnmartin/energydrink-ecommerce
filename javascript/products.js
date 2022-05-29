const url = new URL(window.location);
const signInStatus = url.search.split("=")[1];
console.log(signInStatus)

const statusBTN = document.querySelector(".login-btn");
statusBTN.addEventListener("click",()=>{
    window.location.assign("/login.php")
})
const queryString = url.search.split("?")[1];
console.log(queryString)
const clearSearchParams = document.querySelector(".clear-search-params-icon");
clearSearchParams.addEventListener("click",()=>{
    // window.location.assign("/products.php");
});