<?php

require './php/.env.php';
session_start();
global $servername,$username,$database,$password;
$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$drinkID = $_GET["id"];

if(!isset($_GET["id"])){
    header("Location: ../products.php");
}

$sql = "SELECT drinks.*,vendor.* from drinks INNER JOIN vendor ON drinks.vendor_info = vendor.Name WHERE drinks.id = ?";
$stmt = $conn->stmt_init();
$stmt->prepare($sql);
$stmt->bind_param("i", $drinkID);
$stmt->execute();
$result = $stmt->get_result();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ED Warehouse - Cart</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/cart.media.css">
    <script src="javascript/navbar.js" defer></script>
    <script src="javascript/cart.media.js" defer></script>
</head>
<body>
<div class="navbar hide-navbar">
    <div class="navbar-elements">
        <img src="./assets/logo.png" alt="e-logo" loading="lazy">
        <div class="navbar-main"><h1>MAIN</h1></div>
        <div class="navbar-about"><h1>ABOUT</h1></div>
        <div class="navbar-products"><h1>PRODUCTS</h1></div>
        <div class="navbar-register"><h1>REGISTER</h1></div>
    </div>
</div>
<div class="modal-container">
   <?php foreach ($result as $data){?>
       <form method="post" action="./cart.php">
           <input id="stock-selector-amount" type="number" max="<?php echo $data["Stock"];?>" min="1" value="1" required>
           <label for="stock-selector-amount">Amount</label>
           <input type="number" id="card-input" placeholder="4444333322221111" minlength="16" maxlength="16" required>
           <label for="card-input">Card Info</label>
           <input type="email" id="email-purchase-info" placeholder="customer@energy.com" required>
           <label for="email-purchase-info">Email</label>
           <input type="text" id="coupon-code" maxlength="10">
           <label for="coupon-code" id="coupon-code-label">Coupon Code</label>
           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 apply-coupon-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
               <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
           </svg>
           <h1>Total: <span data-price="<?php echo $data["Price"];?>" id="total-span">R <?php echo $data["Price"]; ?></span></h1>
           <button type="submit"  id="purchase-button">PURCHASE</button>
       </form>
    <?php }?>
</div>
<section class="grid-container">
    <div class="navbar-container">
        <button class="login-btn">
            <?php
            if(isset($_SESSION["username"])){
                echo "LOGOUT";
            }else{
                echo "LOGIN";
            }
            ?>
        </button>
        <div class="hamburger-menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </div>
    </div>
    <div class="drink-container">

        <div class="left-drink-container">
            <?php foreach ($result as $data){?>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 left-arrow-info" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                </svg>
                <img src="/assets/<?php echo $data["drink_img"];?>" alt="<?php echo $data["name"];?>" loading="lazy">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 right-arrow-info" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                </svg>
                <?php
                if(isset($_SESSION["username"])){
                    echo "<button class='buy-btn' id=".$data['id'].">BUY</button>";
                }else{
                    echo "<button class='buy-btn' id='$' >BUY</button>";
                }
            }
                ?>
        </div>

        <div class="right-drink-info-container">
            <?php  foreach ($result as $data) {?>
                <div class="right-container-title">
                    <h1><?php echo $data["name"];?></h1>
                </div>
                <h2 class="cart-energy">Energy</h2>
                <h2 class="cart-sugar">Sugar</h2>
                <h2 class="cart-vendor">Vendor</h2>
                <h2 class="cart-stock">Stock</h2>
                <h2 class="cart-price price">Price</h2>
                <h2 class="cart-energy-total result"><?php echo $data["Energy"]; ?><span> KJ</span></h2>
                <h2 class="cart-sugar-total result"><?php echo $data["Sugar"]; ?><span> g</span></h2>
                <h2 class="cart-vendor-total result"><?php echo ucfirst($data["vendor_info"]); ?></h2>
                <h2 class="cart-stock-total result"><?php echo $data["Stock"]; ?> Left</h2>
                <h2 class="cart-price-total result price final-price"><span>R </span><?php echo $data["Price"]; ?></h2>
            <?php } ?>
        </div>
    </div>
</section>
</body>
</html>