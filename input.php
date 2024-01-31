<?php include('server.php'); ?>

<?php 
        $title = 'Input';
        require_once 'includes/header.php'; 
    ?>

<?php 
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $update = true;
        $record = mysqli_query($db, "SELECT * FROM customer WHERE id=$id");

        if (count(array($record)) == 1 ) {
            $n = mysqli_fetch_array($record);
            $firstname = $n['firstname'];
            $lastname = $n['lastname'];
            $mobile_num = $n['mobile_num'];
            $brand = $n['brand'];
            $flavor = $n['flavor'];
            $typeofpackage = $n['typeofpackage'];
            $kilogram = $n['kilogram'];
            $deliveryboolean = $n['deliveryboolean'];

        }
    }
?>

<?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php 
            echo $_SESSION['message']; 
            unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>


<form method="post" action="server.php" >
    <link rel="stylesheet" type="text/css" href="style.css">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="input-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label>First Name</label>
            <input type="text" name="firstname" value="<?php echo $firstname; ?>">
        </div>
        <div class="input-group">
            <label>Last Name</label>
            <input type="text" name="lastname" value="<?php echo $lastname; ?>">
        </div>
        <div class="input-group">
            <label>Mobile Number</label>
            <input type="tel" name="mobile_num" value="<?php echo $mobile_num; ?>">
        </div>
        <div class="input-group">
            <label>Brand</label>
            <input type="text" name="brand" value="<?php echo $brand; ?>">
        </div>
        <div class="input-group">
            <label>Flavor</label>
            <input type="text" name="flavor" value="<?php echo $flavor; ?>">
        </div>
        <div class="input-group">
            <label>Type</label>
            <select name="typeofpackage" id="typeofpackage" value="<?php echo $typeofpackage; ?>">
            <option selected></option>
            <option>Partial</option>
            <option>Full Package</option>
            </select>
            <span id="error_typeofpackage" class="text-danger"></span>
        </div>
        <div class="input-group">
            <label>Weight</label>
            <input type="number" name="kilogram" value="<?php echo $kilogram; ?>">
        </div>
        <div class="input-group">
            <label>Delivery</label>
            <select name="deliveryboolean" id="deliveryboolean" value="<?php echo $deliveryboolean; ?>">
            <option selected></option>
            <option>Yes</option>
            <option>No</option>
            </select>
            <span id="error_deliveryboolean" class="text-danger"></span>
        </div>
        <div class="input-group">
            <?php if ($update == true): ?>
            <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
            <?php else: ?>
            <button class="btn" type="submit" name="save" >Save</button>
            <?php endif ?>
        </div>
    </form>
    <?php require_once 'includes/footer.php'; ?>
</body>
</html>
