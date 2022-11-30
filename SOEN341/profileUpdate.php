<?php 
	include_once 'views/header.php';
?>

<form action="includes/profileUpdate.inc.php" method="post">
  <h1>Edit Profile</h1>

    <!-- Error checker-->
    <?php
    if(isset($_GET['error'])){

      if($_GET['error'] == "emptyinput"){
        echo "<p>Please fill in all fields!</p>";
        echo "<script type=\"text/javascript\"> container.classList.add(\"right-panel-active\"); </script>";

      }else if($_GET['error'] == "stmtfailed"){
        echo "<p>Something went wrong, try again!</p>";
        echo "<script type=\"text/javascript\"> container.classList.add(\"right-panel-active\"); </script>";


      }else if($_GET['error'] == "none"){
        echo "<p>You have signed up!</p>";
        echo "<script type=\"text/javascript\"> container.classList.add(\"right-panel-active\"); </script>";
      
      //to have a redirect marker
      } else if($_GET['error'] == "!"){
        echo "<script type=\"text/javascript\"> container.classList.add(\"right-panel-active\"); </script>";
      }
  }

  echo "<input type='text' name='fName' value={$_SESSION["userFName"]} />";
  echo "<input type='text' name='lName' value={$_SESSION["userLName"]} />";
  ?>

  <!-- Sign Up Form-->
  <button type="submit" name="submit">Edit Profile</button>
</form>


<?php 
	include_once 'views/footer.php';
?>