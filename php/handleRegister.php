<?php
require '.env.php';
if(isset($_POST["submit"])){
    global $servername;
    global $username;
    global $database;

    $pUsername = $_POST["pUsername"];
    $pName = $_POST["pName"];
    $pSurname = $_POST["pSurname"];
    $pPassword = $_POST["pPassword"];


    $conn = new mysqli($servername,$username,null,$database);

    if($conn->connect_error){
        die("Connection Failed");
    }

    function checkUserNameExist()
    {
        $ExistResult = null;
        global $pUsername, $conn;
        $stmt = $conn->stmt_init();
        $stmt->prepare("SELECT Username from account where Username = ?");
            $stmt->bind_param("s", $pUsername);
            $stmt->execute();
            $stmt->bind_result($ExistResult);
            $stmt->fetch();

            if ($ExistResult) {
                return true;
            }

            return false;

    }
        function handleRegister()
        {
            global $pUsername, $pSurname, $pPassword, $pName, $conn;
            $stmt = $conn->stmt_init();
            $stmt->prepare("INSERT INTO account(Username,Name,Surname,Password)VALUES(?,?,?,?)");
                $stmt->bind_param("ssss", $pUsername, $pName, $pSurname, $pPassword);
                $stmt->execute();
        }


    if(!checkUserNameExist()){
        handleRegister();
        echo "SUCCESS";
        $conn->close();
        exit();
    }

    echo "USER ALREADY EXISTS";
    $conn->close();
}

