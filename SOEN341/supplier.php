<?php 
	include_once 'views/header.php';
    require_once 'includes/inventory.inc.php';

    //guard to keep each role in their respective page
    if(!isset($_SESSION['userRole'])){
        header("location: ./index.php");
    } elseif (($_SESSION['userRole']) == "client"){
        header("location: ./client.php");
    }

?>

<section>
    <h3><?php echo "Hello, " .  $_SESSION["userFName"] . "."; ?></h3>
    <div class="container-fluid">
        
    <!-- List of listed products-->
        Here is a list of your listed products:<br>
        <?php 
            if(isset($_GET['success'])){
                echo "<h5 style=\"color:MediumSeaGreen;\">New item succefuly added!</h5>";
            }
        ?>

        <!-- Display loop-->
        <div class="container-fluid mt-4 p-4 bg-white rounded-2 border">
            <?php if(empty($listings)): ?>
                <div class="card">
                    <div class="card-body bg-light">No Listings Yet...</div>
                </div>
                
            <?php endif; foreach($listings as $entry): ?>
            
                <!-- echo $entry['itemName'] . "<br>" -->
            <?php endforeach?>
        </div>

        <!-- New Product Form-->
        <br> List new product:
        <a class="ms-4 w-25 btn bg-info rounded-2 border-dark" data-bs-toggle="collapse" href="#openForm">Create Listing</a>
        <div id="openForm" class="collapse" >
            <form action="" class="rounded-4 border bg-white mt-2 px-4 py-2" method="POST">
                <div class="m-4 mt-6">
                    <label for="prodname" class="form-label">Listing Title:</label>
                    <input id ="prodname" class="form-control <?php echo !$titleErr ?: 'is-invalid' ?>" type="text" placeholder="Enter the title of this listing" name="name">
                    <div class="invalid-feedback"><?php echo $titleErr?> </div>
                </div>
                <div class="m-4">
                    <label for="proddesc" class="form-label">Descritption:</label>
                    <textarea id ="proddesc" class="form-control <?php echo !$descErr ?: 'is-invalid' ?>" rows="5" placeholder="Enter the description of the product" name="desc"></textarea>
                    <div class="invalid-feedback"><?php echo $descErr?> </div>
                </div>
                <div class="row mb-4">
                    <div class="col-4 mx-4">
                        <label for="prodprice" class="form-label">Price ($CAD):</label>
                        <input id ="prodprice" class="form-control w-75 <?php echo !$priceErr ?: 'is-invalid' ?>" type="text" placeholder="Enter Price" name="price">
                        <div class="invalid-feedback"><?php echo $priceErr?> </div>
                    </div>
                    <div class="col-4">
                        <label for="prodquantity" class="form-label">Quantity Avaliable:</label>
                        <input id ="prodquantity" class="form-control w-50 <?php echo !$quantErr ?: 'is-invalid' ?>" type="text" placeholder="#" name="quantity">
                        <div class="invalid-feedback"><?php echo $quantErr?> </div>
                    </div>
                </div>
                <div class="m-4 mb-6">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>


    </div>

</section>

<?php 
	include_once 'views/footer.php';
?>

