<?php 
//DO NOT MODIFY OR LISTING SYSTEM WILL FAIL

//product listing form template
$titleErr = $descErr = $priceErr = $quantErr = "";
$title = $description = $price = $quantity = "";

//Error handling of passed values
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

?>