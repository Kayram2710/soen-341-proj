<?php

    require_once 'dbh.inc.php';

    if(isset($_SESSION['userID'])){
       updateSession($conn);
    }

    //when session is set
    if(isset($_SESSION['orderID'])){
        $orderID = $_SESSION['orderID'];
        $_SESSION['cart'] = getOrder($conn,$orderID);
    }

    if(isset($_POST['submit'])){

        //validate item ID
        if(!empty($_POST['itemID'])){
            $id = $_POST['itemID'];
            addItem($conn,$id);
        }

    }

    function addItem($conn,$itemID){
        //fetch user ID
        $orderID = $_SESSION['orderID'];
        $sql = "INSERT INTO orderlist (itemID, itemQuantity, orderID) VALUES ('$itemID','1','$orderID')";

        //make sql query
        if(mysqli_query($conn, $sql)){
            header("location: ./view_item.php?success=true&index=".$_GET['index']);
        } else {
            echo 'Error ' . mysqli_error($conn);
        }
    }

    function createOrder($conn){
        //fetch user ID
        $userID = $_SESSION['userID'];
        $sql = "INSERT INTO orders (orderPlacerID, total) VALUES ('$userID', '0')";

        //make sql query
        mysqli_query($conn, $sql);

        updateSession($conn);
    }

    function updateSession($conn){
        //fetch user ID
        $userID = $_SESSION['userID'];
        $sql = "SELECT * FROM orders WHERE orderPlacerID = '$userID'";

        //retrieve order
        $result = mysqli_query($conn, $sql);
        $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        if($orders == null){

            createOrder($conn);

        }else{

            $_SESSION['orders'] = $orders;

            //count amount of orders
            $orderAmt = count($_SESSION['orders']);

            //fetch most recent order ID
            $orderID = $orders[$orderAmt-1]["orderID"];

            $_SESSION['orderID'] = $orderID;
        }
    }

    function getOrder($conn,$orderID){
        $sql = "SELECT * FROM orderlist WHERE orderID = '$orderID'";

        //retrieve array of lists
        $result = mysqli_query($conn, $sql);
        $order = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $order;
    }

    function setTotal($conn,$total){
        //fetch user ID
        $orderID = $_SESSION['orderID'];
        $sql = "UPDATE orders SET total = '$total' WHERE orderID = '$orderID';";

        //make sql query
        mysqli_query($conn, $sql);

        updateSession($conn);
    }
?>