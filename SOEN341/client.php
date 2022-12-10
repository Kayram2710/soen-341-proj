<?php 
	include_once 'views/header.php';
	require_once 'includes/orders.inc.php';
	require_once 'includes/cart.inc.php';

	if(!isset($_SESSION['userRole']) || !($_SESSION['userRole'] == "client") ){
        header("location: ./index.php");
    }

	//print_r($_SESSION);

	$orders = $_SESSION['orders'];
	$cart = displayCart();
    
?>

<section>
    <div class="container-fluid" style="max-width: 800px">

        <h3><?php echo "Hello, " .  $_SESSION["userFName"] . "."; ?></h3>

		<div class="container-fluid mt-4 p-4 bg-white rounded-2 border">
			<h4> Cart </h4>
            <?php if(empty($cart)): ?>
                <div class="card">
                    <div class="card-body bg-light text-black-50">Cart is empty</div>
                </div>
                <div class="card">
                    <a class="card-body bg-light" href="./market.php">Go to Market</a>
                </div>
                
            <?php endif; $index = 0; $total = 0; foreach($cart as $entry):?>

				<?php $itemID = $entry[0]["itemID"]; $quantity = count($entry);$item = findItem($conn,$itemID);$price = $quantity*$item[0]['itemPrice']?>
                
                <div class="card bg-light mb-2">
                    <h5 class="card-header"><?php echo $item[0]['itemName']; $index++?></h5>
					<div class="card-body">Quantity: <?php echo $quantity?></div>
                    <div class="card-body">Total: $<?php echo $price?></div>
                </div>
                
            <?php $total += $price;endforeach; setTotal($conn,$total);?>

			<h5> Cart Total: $<?php echo $total?></h5>
			

		</div>

       <!-- Display loop-->
	   <div class="container-fluid mt-4 p-4 bg-white rounded-2 border">
			<h4> Orders </h4>
            <?php if(empty($orders)): ?>
                <div class="card">
                    <div class="card-body bg-light text-black-50">No Orders Yet...</div>
                </div>
                <div class="card">
                    <a class="card-body bg-light" href="./market.php">Go to Market</a>
                </div>
                
            <?php endif; $index = 0; foreach($orders as $entry): ?>
                
                <div class="card bg-light mb-2">
                    <h5 class="card-header">Order: <?php echo $index+1; $index++?></h5>
                    <div class="card-body">Total: $<?php echo $entry['total'] ?></div>
                </div>
                
            <?php endforeach?>
        </div>


	</div>
</section>

<?php 
	include_once 'views/footer.php';
?>

