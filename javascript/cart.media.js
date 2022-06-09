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
    modalContainer.classList.add("show-modal");
});

const hamburgerMen = document.querySelector(".hamburger-menu");
const body = document.querySelector("body");
body.addEventListener("dblclick",(e)=> {
    if(e.target.className !== "modal-container"){
        modalContainer.classList.remove("show-modal");
    }
});

body.addEventListener("keydown",(e)=> {
if(e.key === "Escape"){
    modalContainer.classList.remove("show-modal");
}
});

const stockInput = document.getElementById("stock-selector-amount");
stockInput.addEventListener("change",(e)=> {
    const stock = e.target.value;
    if(stock > e.target.max){
        e.target.value = e.target.max;
    }
})

const productAmountInput = document.getElementById("stock-selector-amount");
const productTotalPriceSpan = document.getElementById("total-span");
const productCouponCode = document.querySelector("#coupon-code");
const couponCodeLabel = document.getElementById("coupon-code-label");
const applyCouponIcon = document.querySelector(".apply-coupon-icon");


applyCouponIcon.addEventListener("click",(e)=> {
    if(productCouponCode.value === "iteca"){
        let currentPrice;
        currentPrice = productTotalPriceSpan.innerHTML.split(" ")[1];
        productTotalPriceSpan.innerHTML = 'R ' + Math.round((parseInt(currentPrice)-(0.10*currentPrice))*100 / 100).toFixed(2);
        productCouponCode.disabled = true;
        productCouponCode.style.color = 'limegreen';
        productCouponCode.style.fontWeight = 'bold';
        productCouponCode.style.textTransform = 'uppercase';
        productCouponCode.style.borderBottom = '2px solid limegreen';
        productCouponCode.style.cursor = 'no-drop';
        couponCodeLabel.style.color = 'limegreen';
        applyCouponIcon.style.color = 'limegreen';
        applyCouponIcon.style.cursor = 'no-drop';
        applyCouponIcon.removeEventListener("click",(e)=> {});
    }
});


productAmountInput.addEventListener("change",(e)=> {
    const stock = e.target.value;
    const price = productTotalPriceSpan.dataset.price;
    productTotalPriceSpan.innerHTML = 'R ' + Math.round((parseInt(stock)*(price))*100 / 100).toFixed(2);
});


const purchaseBTN = document.querySelector("#purchase-button");
const productCardInput = document.querySelector("#card-input");
const productEmailInput = document.querySelector("#email-purchase-info");


const handleInputError = (errorReason) => {
    purchaseBTN.innerHTML = errorReason;
    purchaseBTN.classList.add("errorButton");
    setTimeout(()=>{
        purchaseBTN.innerHTML = "PURCHASE";
        purchaseBTN.classList.remove("errorButton");
    },2000);
}

const handleSuccessInput = () => {
        purchaseBTN.classList.add("handleSuccesButton");
        purchaseBTN.innerHTML = "SUCCESS";
        setTimeout(()=>{
            purchaseBTN.classList.remove("handleSuccesButton");
            purchaseBTN.innerHTML = "PURCHASE";
            modalContainer.classList.remove("show-modal");
            window.location.assign("/purchase.php?status=success");
        },3000);


}

purchaseBTN.addEventListener("click",(e)=> {
    e.preventDefault();

    const re = new RegExp("^[\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,4}$");
    const reCreditCard = new RegExp("^[0-9]{16}$");

    if(Number(productAmountInput.value) > productAmountInput.max){
        handleInputError("Amount Error");
        return;
    }
    if((productCardInput.value).search(reCreditCard)){
        handleInputError("Card Error");
        return;
    }
    if(!(productEmailInput.value.length > 5) || (productEmailInput.value).search(re) === -1){
        console.log(productEmailInput.value.length)
        handleInputError("Email Error");
        return;
    }

    handleSuccessInput();

});