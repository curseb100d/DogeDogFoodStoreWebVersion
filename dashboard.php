<?php
    // connect to database
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'dogedogfoodstoreinformationsystem');
?>

<?php 
        $title = 'Input';
        require_once 'includes/header.php'; 
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Doge Dog Food Store Information System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <?php $results = mysqli_query($db, "SELECT * FROM customer"); ?>

<table>
    <thead>
        <br>
        <center><a href="input.php" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create</a></center>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Mobile Number</th>
            <th>Brand</th>
            <th>Flavor</th>
            <th>Type</th>
            <th>Weight</th>
            <th>Delivery</th>
            <th colspan="8">Action</th>
        </tr>
    </thead>
    
    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['mobile_num']; ?></td>
            <td><?php echo $row['brand']; ?></td>
            <td><?php echo $row['flavor']; ?></td>
            <td><?php echo $row['typeofpackage']; ?></td>
            <td><?php echo $row['kilogram']; ?></td>
            <td><?php echo $row['deliveryboolean']; ?></td>
            <td>
                <a href="input.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
    <?php require_once 'includes/footer.php'; ?>
</body>
</html>