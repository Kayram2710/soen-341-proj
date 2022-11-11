<?php 
	include_once 'views/header.php';
    require_once 'includes/inventory.inc.php';

    $sql = "SELECT * FROM inventory ";

    //retrieve array of lists
    $result = mysqli_query($conn, $sql);
    $listings = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>

<section>
    <div class="container-fluid" style="max-width: 800px">

        <h2>Welcome to the Market</h2>

        <!-- Display loop-->
        <div class="container-fluid mt-4 p-4 bg-white rounded-2 border" >
            <h4>All listed products:</h4>
            <?php if(empty($listings)): ?>
                <div class="card">
                    <div class="card-body bg-light text-black-50">No Listings Yet...</div>
                </div>
                
            <?php endif;?>
            <div class="row">
                <?php $index = 0; foreach($listings as $entry): ?>
                    <div class="col-4 mt-4">
                        <div class="card bg-light mb-2">
                            <h5 class="card-header"><?php echo $entry['itemName'] ?></h5>
                            <div class="card-body"><?php echo $entry['itemDesc'] ?></div>
                            <div class="card-body"><?php echo "Price :$" . $entry['itemPrice'] ."<br> Quantity Available: " .$entry['itemQuantity']?></div>
                            <a class="card-footer text-end" href="#">View</a>
                        </div>
                    </div>
                <?php endforeach?>
            </div>
        </div>


    </div>

</section>

<?php 
	include_once 'views/footer.php';
?>

