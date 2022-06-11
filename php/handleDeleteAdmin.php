<?php
require '.env.php';
global $servername,$username,$database,$password;
$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $stmt = $conn->stmt_init();
    $query = "DELETE FROM drinks WHERE drinks.id = ?";
    $stmt->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: ../products.php?deleted=true");
}
