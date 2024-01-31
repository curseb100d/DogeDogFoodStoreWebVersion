<?php 
	session_start();
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

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'dogedogfoodstoreinformationsystem');

	//customer
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
		header('location: dashboard.php');
	}

	//Retrieve records
	php $results = mysqli_query($db, "SELECT * FROM customer");
?>