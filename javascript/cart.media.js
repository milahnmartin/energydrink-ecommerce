const leftArrow = document.querySelector(".left-arrow-info");
const rightArrow = document.querySelector(".right-arrow-info");
const maxItems = 13;
const currentItem = new URL(window.location).searchParams.get("id");

rightArrow.addEventListener("click",()=> {
    if(currentItem < maxItems) {
        window.location.assign(`/cart.php?id=${parseInt(currentItem)+1}`);
    }else{
        console.log("COCK")
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