<?php 
	include_once 'views/header.php';

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
        Here is a list of your listed products:<br>
        <?php 

            //echo " Product";
        
        ?>

        <br> List new product:
        <a class="ms-4 w-25 btn bg-info rounded-2 border-dark" data-bs-toggle="collapse" href="#openForm">Create Listing</a>
        <div id="openForm" class="collapse">
            


        </div>


        <form action="./includes/inventory.inc.php" class="rounded-4 border bg-white mt-2 px-4 py-2" method="post">
            <div class="m-4 mt-6">
                <label for="prodname" class="form-label">Listing Title:</label>
                <input id ="prodname" class="form-control" type="text" placeholder="Enter the title of this listing" name="name">
            </div>
            <div class="m-4">
                <label for="proddesc" class="form-label">Descritption:</label>
                <textarea id ="proddesc" class="form-control" rows="5" placeholder="Enter the description of the product" name="desc"></textarea>
            </div>
            <div class="row mb-4">
                <div class="col-4 mx-4">
                    <label for="prodprice" class="form-label">Price ($CAD):</label>
                    <input id ="prodprice" class="form-control w-75" type="text" placeholder="Enter Price" name="price">
                </div>
                <div class="col-4">
                <label for="prodquantity" class="form-label">Quantity Avaliable:</label>
                    <input id ="prodquantity" class="form-control w-50" type="text" placeholder="#" name="quantity">
                </div>
            </div>
            <div class="m-4 mb-6">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>


    </div>

</section>

<?php 
	include_once 'views/footer.php';
?>

