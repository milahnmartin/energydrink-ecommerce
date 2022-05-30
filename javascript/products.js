const url = new URL(window.location);
const signInStatus = url.search.split("=")[1];

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


const productClickInfo = document.getElementsByClassName("product-info-btn");

for(let i of productClickInfo){
   i.addEventListener("click",()=> {
           window.location.assign(`/cart.php?id=${i.id}`);
   });
}