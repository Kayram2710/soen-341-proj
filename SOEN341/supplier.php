<?php 
	include_once 'views/header.php';
    require_once 'includes/inventory.inc.php';

    //guard to keep each role in their respective page
    if(!isset($_SESSION['userRole']) || !($_SESSION['userRole'] == "supplier") ){
        header("location: ./index.php");
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
                    <div class="card-body bg-light text-black-50">No Listings Yet...</div>
                </div>
                <div class="card">
                    <a class="card-body bg-light" data-bs-toggle="collapse" href="#openForm">+ Add A Listing</a>
                </div>
                
            <?php endif; $index = 0; foreach($listings as $entry): ?>
                
                <div class="card bg-light mb-2">
                    <h5 class="card-header"><?php echo $entry['itemName'] ?></h5>
                    <div class="card-body"><?php echo $entry['itemDesc'] ?></div>
                    <div class="card-body"><?php echo "Price :$" . $entry['itemPrice'] ."<br> Quantity Available: " .$entry['itemQuantity']?></div>
                    <a class="card-footer text-end" href="edit_item.php?index=<?php echo $index; $index++?>">Edit Listing</a>
                </div>
                
                
            <?php endforeach?>
        </div>

        <!-- New Product Form-->
        <br> List new product:
        <a class="ms-4 w-25 btn bg-info rounded-2 border-dark" data-bs-toggle="collapse" href="#openForm">Create Listing</a>
        <div id="openForm" class="collapse" >
            <form action="" class="rounded-4 border bg-white mt-2 px-4 py-2" method="POST">
                <div class="m-4 mt-6">
                    <label for="prodname" class="form-label">Listing Title:</label>
                    <input id ="prodname" class="form-control <?php if(isset($_POST['submit'])){echo !$titleErr ? 'is-valid': 'is-invalid';} ?>" type="text" placeholder="Enter the title of this listing" name="name" value="<?php echo !isset($_POST['name'])? "": $_POST['name']; ?>">
                    <div class="invalid-feedback"><?php echo $titleErr?> </div>
                </div>
                <div class="m-4">
                    <label for="proddesc" class="form-label">Descritption:</label>
                    <textarea id ="proddesc" class="form-control <?php if(isset($_POST['submit'])){echo !$descErr ? 'is-valid': 'is-invalid';} ?>" rows="5" placeholder="Enter the description of the product" name="desc"><?php echo !isset($_POST['desc'])? null : $_POST['desc']; ?></textarea>
                    <div class="invalid-feedback"><?php echo $descErr?> </div>
                </div>
                <div class="row mb-4">
                    <div class="col-4 mx-4">
                        <label for="prodprice" class="form-label">Price ($CAD):</label>
                        <input id ="prodprice" class="form-control w-75 <?php if(isset($_POST['submit'])){echo !$priceErr ? 'is-valid': 'is-invalid';} ?>" type="text" placeholder="Enter Price" name="price" value="<?php echo !isset($_POST['price'])? "": $_POST['price']; ?>">
                        <div class="invalid-feedback"><?php echo $priceErr?> </div>
                    </div>
                    <div class="col-4">
                        <label for="prodquantity" class="form-label">Quantity Avaliable:</label>
                        <input id ="prodquantity" class="form-control w-50 <?php if(isset($_POST['submit'])){echo !$quantErr ? 'is-valid': 'is-invalid';} ?>" type="text" placeholder="#" name="quantity" value="<?php echo !isset($_POST['quantity'])? "": $_POST['quantity']; ?>">
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

