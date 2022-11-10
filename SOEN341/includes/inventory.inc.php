<?php

require_once 'dbh.inc.php';

if(isset($_SESSION['userID'])){
    
}

if(isset($_POST['submit'])){

    //print_r($_SESSION);

    $titleErr = $descErr = $priceErr = $quantErr = "";
    $title = $description = $price = $quantity = "";

    if(empty($_POST['name'])){
        $titleErr = "You must give this listing a title";
    } else {
        $title = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(empty($_POST['desc'])){
        $descErr = "You must give this item a proper description";
    } else {
        $description = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(empty($_POST['price'])){
        $priceErr = "You must enter the price of this item";
    } elseif(!is_numeric($_POST['price'])){
        $priceErr = "You must enter a number for the price";
    } else {
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT);
    }
    
    if(empty($_POST['quantity'])){
        $quantErr = "You must enter current quantity of this item";
    } elseif(!is_numeric($_POST['quantity'])){
        $quantErr = "You must enter a number for the quantity";
    } else {
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_NUMBER_INT);
    }

    $userID = $_SESSION["userID"];

    //echo "Title: $title, Desc: $description, Price: $$price, Quantity: $quantity";
    if(empty($titleErr) && empty($descErr) && empty($priceErr) && empty($quantErr)){

        echo "ran!";
        addToInventory($conn, $title, $description, $price, $quantity, $userID);
        
    }
}

function addToInventory($conn, $title, $description, $price, $quantity, $userID){

    $sql = "INSERT INTO inventory (itemName, itemDesc, itemPrice, itemQuantity, itemOwnerID) VALUES ('$title', '$description', '$price', '$quantity', '$userID')";

    if(mysqli_query($conn, $sql)){
        header("location: ./supplier.php?success=true");
    } else {
        echo 'Error ' . mysqli_error($conn); 
    }
}

?>