<?php
ob_start();
session_start();
if(!isset($_SESSION['user']) && !isset($authpage)) {
    header("location: login.php?redir=1");
    exit();
} else {
    $luser = $_SESSION['user'];
    $stmt = $conn->prepare("SELECT UserType FROM account WHERE UserName=?");
    $stmt->bind_param("s", $luser);
    $stmt->execute();
    $stmt->bind_result($type);
    $stmt->store_result();
    $stmt->fetch();
    
    if($stmt->num_rows > 0) {
        $_SESSION["UserType"] = "$type";
    }
}
?>

<?php
if(isset($_REQUEST['logout'])) {
    session_unset();
    session_destroy();
    header('Location:login.php');
}
?>