const leftArrow = document.querySelector(".left-arrow-info");
const rightArrow = document.querySelector(".right-arrow-info");
const maxItems = 13;
const currentItem = new URL(window.location).searchParams.get("id");

rightArrow.addEventListener("click",()=> {
    if(currentItem < maxItems) {
        window.location.assign(`/cart.php?id=${parseInt(currentItem)+1}`);
    }else{
        window.location.assign(`/cart.php?id=${1}`);
    }
});

leftArrow.addEventListener("click",()=> {
    if(currentItem > 1) {
        window.location.assign(`/cart.php?id=${parseInt(currentItem)-1}`);
    }else{
        window.location.assign(`/cart.php?id=${13}`);
    }
});

const buyBTB = document.querySelector(".buy-btn");
const modalContainer = document.querySelector(".modal-container");
const gridContainer = document.querySelector(".grid-container");

buyBTB.addEventListener("click",(e)=> {
    if(e.target.id === "$"){
        window.location.assign("/login.php");
        return;
    }
    modalContainer.style.visibility = "visible";
    gridContainer.style.filter = "blur(5px)";
});

const body = document.querySelector("body");
// body.addEventListener("dblclick",(e)=> {
//     if(e.target.className !== "modal-container"){
//         modalContainer.style.visibility = "hidden";
//         gridContainer.style.filter = "blur(0)";
//     }
// });

body.addEventListener("keydown",(e)=> {
if(e.key === "Escape"){
    modalContainer.style.visibility = "hidden";
    gridContainer.style.filter = "blur(0)";
}
});

const stockInput = document.getElementById("stock-selector-amount");
stockInput.addEventListener("change",(e)=> {
    const stock = e.target.value;
    if(stock > e.target.max){
        e.target.value = e.target.max;
    }
})

