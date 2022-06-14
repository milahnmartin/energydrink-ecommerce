<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ED Warehouse - Register</title>
    <link rel="shortcut icon" href="./assets/eg.png" type="image/png">
    <link rel="stylesheet" href="styles/style.css">
    <script src="javascript/navbar.js" defer></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9CG94C4ZT5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-9CG94C4ZT5');
</script>
</head>
<body>
<div class="navbar hide-navbar">
    <div class="navbar-elements">
        <img src="./assets/logo.png" alt="e-logo" loading="lazy">
        <div class="navbar-main"><h1>MAIN</h1></div>
        <div class="navbar-about"><h1>ABOUT</h1></div>
        <div class="navbar-products"><h1>PRODUCTS</h1></div>
        <div class="navbar-register active"><h1>REGISTER</h1></div>
    </div>
</div>
<section class="grid-container">
    <div class="navbar-container">
        <button class="login-btn">LOGIN</button>
        <div class="hamburger-menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </div>
    </div>
    <div class="welcome-container">
        <h1>ARE YOU NEW ?</h1>
        <h3>CREATE AN ACCOUNT !</h3>
    </div>
    <div class="login-container">
        <form method="POST" action="php/handleRegister.php">
            <span title="Username"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 user-icon icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg></span>
            <input type="text" id="pUsername" placeholder="Username" name="pUsername" required pattern="^[a-zA-Z]{5,}$">
            <span title="Surname"><svg xmlns= "http://www.w3.org/2000/svg" class="h-6 w-6 user-icon-register ed-name icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                </svg></span>
            <input type="text" id="pName" placeholder="Name" name="pName" required$>
            <span title="Name"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 user-icon-register ed-surname icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                </svg></span>
            <input type="text" id="pSurname" placeholder="Surname" name="pSurname" required>
            <span title="Password">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 password-icon-register icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
            </span>
            <input type="password" id="pPassword" name="pPassword" placeholder="Password" required>
            <button id="submit" name="submit" type="submit" value="submit">SIGN UP</button>
        </form>
    </div>
</section>
</body>
</html>