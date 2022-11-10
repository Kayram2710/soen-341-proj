<?php 
	include_once 'views/header.php';

	//guard to keep each role in their respective page
	if(isset($_SESSION['userRole'])){
		if (($_SESSION['userRole']) == "supplier"){
			header("location: ./supplier.php");
		} elseif (($_SESSION['userRole']) == "client"){
			header("location: ./client.php");	
		}
    
	}

?>


  <link rel="stylesheet" href="./css/stylesheet.css">


<body>

 <div class="col-md-12 blue-text text-center">
 <div class = "centered">
            <h3 class="display-3 font-weight-bold white-text mb-0 pt-md-5 pt-5">Procurement System</h3>
            <hr class="hr-light my-2 w-100">
            <h4 class="subtext-header mt-2 mb-4">Purchase and Manage Easily With Us</h4>
			 <a href="#!" role="button" class="Register btn btn-rounded btn-outline-dark">
                Register Now
            </a>
			</div>

        </div>

 <!--  <div class="bg">
        <div class="col-md-12 blue-text text-center">
            <h3 class="display-3 font-weight-bold white-text mb-0 pt-md-5 pt-5">Procurement System</h3>
            <hr class="hr-light my-2 w-100">
            <h4 class="subtext-header mt-2 mb-4">Purchase and Manage Easily With Us</h4>
			 
			 <div class="col-md-12 text-center"style = "position:relative;top:300px;">
            <a href="#!" role="button" class="Register btn btn-rounded btn-outline-dark">
                Register Now
            </a>
        </div>

        </div>
     
    </div> -->
	
	</body>
	