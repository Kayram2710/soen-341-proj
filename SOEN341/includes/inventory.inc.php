<?php

require_once 'dbh.inc.php';

//when session is set
if(isset($_SESSION['userID'])){
    $value = $_SESSION['userID'];
    $sql = "SELECT * FROM inventory WHERE itemOwnerID = '$value'";

    //retrieve array of lists
    $result = mysqli_query($conn, $sql);
    $listings = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $_SESSION['listings'] = $listings;

}

//when posted
if(isset($_POST['submit'])){

    require "listingForm.inc.php";

    //defining userID
    $userID = $_SESSION["userID"];

    //if all passes run addtoinventory
    if(empty($titleErr) && empty($descErr) && empty($priceErr) && empty($quantErr)){

        addToInventory($conn, $title, $description, $price, $quantity, $userID);
    
    }
}

//adding to inventory
function addToInventory($conn, $title, $description, $price, $quantity, $userID){

    $sql = "INSERT INTO inventory (itemName, itemDesc, itemPrice, itemQuantity, itemOwnerID) VALUES ('$title', '$description', '$price', '$quantity', '$userID')";

    if(mysqli_query($conn, $sql)){
        header("location: ./supplier.php?success=true");
    } else {
        echo 'Error ' . mysqli_error($conn); 
    }
}

?>