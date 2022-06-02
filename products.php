<?php
    require './php/.env.php';
    session_start();
    global $servername,$username,$database,$password;
    $conn = new mysqli($servername, $username, $password, $database);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }

    $searchRequested = false;

    if(isset($_GET["pSearch"])){
        $searchRequested = true;
    }

    if(!$searchRequested) {
        $sql = "SELECT * FROM drinks";
    }else{
        $sql = "SELECT * FROM drinks WHERE drinks.name LIKE '%".$_GET["pSearch"]."%'";
    }

    $result = $conn->query($sql);
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ED Warehouse - Products</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/products.media.css">
    <script src="javascript/navbar.js" defer></script>
    <script src="javascript/products.js" defer></script>
</head>
<body>
<div class="navbar hide-navbar">
    <div class="navbar-elements">
        <img src="./assets/logo.png" alt="e-logo" loading="lazy">
        <div class="navbar-main"><h1>MAIN</h1></div>
        <div class="navbar-about"><h1>ABOUT</h1></div>
        <div class="navbar-products active"><h1>PRODUCTS</h1></div>
        <div class="navbar-register"><h1>REGISTER</h1></div>
    </div>
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
    <div class="products-container">
        <form method="get" action="/products.php" class="products-search-form">
            <input type="search" id="pSearch" name="pSearch" placeholder="Search For Drink or Brand...">
            <label for="clear-submit">
                <input id="clear-submit" type="submit" value="">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 clear-search-params-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </label>
            <label for="pSubmit">
                <input type="submit" id="pSubmit" name="pSubmit" value="true">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 product-search-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </label>
        </form>
        <?php foreach ($result as $data){ ?>
            <div class="cart-item">
                <div class="flex-cart-info">
                    <img src="/assets/<?php echo $data["drink_img"];?>" alt="<?php echo $data["name"];?>" loading="lazy">
                    <h1><?php echo $data["name"];?></h1>
                    <h2><?php echo $data["Price"]?></h2>
                    <button class="product-info-btn" id="<?php echo $data["id"] ?>">INFO</button>
                </div>
            </div>
        <?php }?>
    </div>
</section>
</body>
</html>