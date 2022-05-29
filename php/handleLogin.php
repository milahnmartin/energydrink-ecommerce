<?php
require '.env.php';
if(isset($_POST["submit"])){
    session_start();
    global $servername;
    global $username;
    global $database;

    $pUsername = $_POST["pUsername"];
    $pPassword = $_POST["pPassword"];


    $conn = new mysqli($servername,$username,null,$database);

    if($conn->connect_error){
        die("Connection Failed");
    }

    function checkLoginUser()
    {
        $ExistResult = null;
        global $pUsername, $conn,$pPassword;
        $stmt = $conn->stmt_init();
        $stmt->prepare("SELECT Username from account where Username = ? and Password = ?");
        $stmt->bind_param("ss", $pUsername,$pPassword);
        $stmt->execute();
        $stmt->bind_result($ExistResult);
        $stmt->fetch();

        if ($ExistResult) {
            return true;
        }

        return false;

    }


    if(checkLoginUser()){
        $conn->close();
        $_SESSION["username"] = $pUsername;
        header("Location: ../products.php?signedin=true");
        exit();
    }else{
        $conn->close();
        header("Location: ../login.php?signedin=false");
        exit();
    }



}

