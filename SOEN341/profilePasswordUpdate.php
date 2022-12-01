<?php 
  include_once 'views/header.php';
?>

<form action="includes/profileUpdatePassword.inc.php" method="post">
  <h1>Update Password</h1>

    <!-- Error checker-->
    <?php
    if(isset($_GET['error'])){

      if($_GET['error'] == "emptyinput"){
        echo "<p>Please fill in all fields!</p>";
        echo "<script type=\"text/javascript\"> container.classList.add(\"right-panel-active\"); </script>";


      }else if($_GET['error'] == "pwdnomatch"){
        echo "<p>Passwords do not match! Please enter your passwords again!</p>";
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
  ?>

  <!-- Sign Up Form-->
  <input type="password" name="oldpwd" placeholder="Old password" />
  <input type="password" name="pwd" placeholder="New password" />
  <input type="password" name="pwdRepeat" placeholder="Confirm new password">
  <button type="submit" name="submit">Update password</button>
</form>