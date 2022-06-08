const purchaseStatus = new URL(window.location).search.split("=")[1];

const typeWriter = (status) => {
    const messageContainer = document.querySelector(".energy-span");
    if(status){
        let counter = 0;
        const successMessage = "Successful";
        const i = setInterval(()=>{
            messageContainer.innerHTML += successMessage[counter];
            if(counter < successMessage.length - 1){
                counter += 1;
            }else{
                setTimeout(()=>{
                    counter = 0;
                    messageContainer.innerHTML = "";
                    typeWriter(true);
                },1000)
                clearInterval(i)
            }
         },300)
    }else{
        let counter = 0;
        const successMessage = "Unsuccessful";
        const i = setInterval(()=>{
            messageContainer.innerHTML += successMessage[counter];
            if(counter < successMessage.length -1){
                counter += 1;
            }else{
                setTimeout(()=>{
                    counter = 0;
                    messageContainer.innerHTML = "";
                    typeWriter(false);
                },1000)
                clearInterval(i)
            }
        },300)
    }

}


    if(purchaseStatus === "success"){
        typeWriter(true);
    }else{
        typeWriter(false);
    }



const homeButton = document.querySelector(".home-btn");
homeButton.addEventListener("click",() => {
    window.location.assign("/index.php")
})

