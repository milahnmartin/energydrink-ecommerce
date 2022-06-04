<?php
require '.env.php';
if(isset($_POST["submit"])){
    session_start();
    global $servername;
    global $username;
    global $database;
    global $password;

    $pUsername = $_POST["pUsername"];
    $pPassword = $_POST["pPassword"];


    $conn = new mysqli($servername,$username,$password,$database);

    if($conn->connect_error){
        die("Connection Failed");
    }

    function encode($newPassword):string{
        $salt = "salt";
        $newPassword = $newPassword.$salt;
        return hash("sha256",$newPassword);
    }

    function checkLoginUser(): bool
    {
        $ExistResult = null;
        global $pUsername, $conn,$pPassword;
        $encodedPassword = encode($pPassword);
        $stmt = $conn->stmt_init();
        $stmt->prepare("SELECT Username from account where Username = ? and Password = ?");
        $stmt->bind_param("ss", $pUsername, $encodedPassword);
        $stmt->execute();
        $stmt->bind_result($ExistResult);
        $stmt->fetch();

        if ($ExistResult) {
            return true;
        }

        return false;

    }
    if(checkLoginUser()){
        $_SESSION["username"] = $pUsername;
        header("Location: ../products.php?signedin=true");
    }else{
        header("Location: ../login.php?signedin=false&username=".encode($pPassword));
    }
    $conn->close();
}

