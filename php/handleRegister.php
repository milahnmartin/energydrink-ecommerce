<?php
require '.env.php';
if(isset($_POST["submit"])){
    global $servername;
    global $username;
    global $database;
    global $password;

    $pUsername = $_POST["pUsername"];
    $pName = $_POST["pName"];
    $pSurname = $_POST["pSurname"];
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
            $encode = encode($pPassword);
            $stmt = $conn->stmt_init();
            $stmt->prepare("INSERT INTO account(Username,Name,Surname,Password)VALUES(?,?,?,?)");
                $stmt->bind_param("ssss", $pUsername, $pName, $pSurname, $encode);
                $stmt->execute();
        }


    if(!checkUserNameExist()){
        handleRegister();
        $conn->close();
        header("Location: ../login.php?signedin=true");
        exit();
    }

    $conn->close();
    header("Location: ../login.php?signedin=false");
}

