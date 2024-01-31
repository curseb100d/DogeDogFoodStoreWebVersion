<?php
	// connect to database
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'dogedogfoodstoreinformationsystem');

	// initialize variables
	$id = 0;
	$firstname = "";
	$lastname = "";
	$mobile_num = "";
	$brand = "";
	$flavor = "";
	$typeofpackage = "";
	$kilogram = "";
	$deliveryboolean = "";
	$update = false;

	//If save button is clicked in customer
	if (isset($_POST['save'])){
	 		$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
	 		$mobile_num = $_POST['mobile_num'];
	 		$brand = $_POST['brand'];
            $flavor = $_POST['flavor'];
            $typeofpackage = $_POST['typeofpackage'];
            $kilogram = $_POST['kilogram'];
            $deliveryboolean = $_POST['deliveryboolean'];

		mysqli_query($db, "INSERT into customer (firstname, lastname, mobile_num, brand, flavor, typeofpackage, kilogram, deliveryboolean) values ('$firstname','$lastname','$mobile_num', '$brand', '$flavor', '$typeofpackage', '$kilogram', '$deliveryboolean')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: dashboard.php');	//redirect to index page after inserting
		}

		//Update records
		if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$mobile_num = $_POST['mobile_num'];
		$brand = $_POST['brand'];
        $flavor = $_POST['flavor'];
        $typeofpackage = $_POST['typeofpackage'];
        $kilogram = $_POST['kilogram'];
        $deliveryboolean = $_POST['deliveryboolean'];

		mysqli_query($db, "UPDATE customer SET firstname='$firstname', lastname='$lastname', mobile_num='$mobile_num', brand='$brand', flavor='$flavor', typeofpackage='$typeofpackage', kilogram='$kilogram', deliveryboolean='$deliveryboolean' WHERE id=$id");
		$_SESSION['message'] = "Address updated!"; 
		header('location: dashboard.php');
		
		}

		// delete records
		if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM customer WHERE id=$id");
		$_SESSION['message'] = "Address deleted!"; 
		header('location: dashboard.php');
		}

	// retrieve records
	$results = mysqli_query($db, "SELECT * FROM customer");
?>