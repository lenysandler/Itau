<?php 
// Start session
session_start(); 

// Username and password
$ID = file_get_contents('login.txt');
$pass = file_get_contents('senha.txt');

if (isset($_POST["username"]) && isset($_POST["password"])) { 

    if ($_POST["username"] === $ID && $_POST["password"] === $pass) { 
    
    $_SESSION["loginSession"] = $ID;
    $_SESSION["senhaSession"] = $pass; 

    header("Location: user.php"); 
    
    } 

    else {
    	header("Location: index.php");
    }
}
?>