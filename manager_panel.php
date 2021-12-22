<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="#" rel="stylesheet">
    <title>Manager Home Page</title>
</head>
<body>
    <!--PHP to verify manager session is active or not-->
    <?php
        session_start();
        if(!isset($_SESSION['manager'])) {
            header("Location:index.php");
        }
    ?>

    <!--Product Table-->
    <div class="container pt-5">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <h2>Welcome, Manager</h2>
        </div>
        <div class="pb-5 d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="index.php" class="btn btn-secondary">Go to main website</a>
            <a href="manager.php?logout=true" class="btn btn-danger">Log Out</a>
        </div>

    <a href="manager_manage_admin.php" class="btn btn-primary">Manage Admin Account</a>
    <a href="manager_view_activity.php" class="btn btn-primary">View Admin Activity</a>
    <a href="manager_view_customer.php" class="btn btn-primary">View Customer Contact</a>
    <a href="manager_view_payment.php" class="btn btn-primary">View Payments</a>
    <div style="clear:both"></div>
        <br>
        
        <div class="table-responsive">
            <table class="table">
                <tr><th colspan="5"><h3>Product Details</h3></th></tr>
                <tr>
                  <th width="30%">Product Name</th>
                  <th width="10%">Price</th>
                  <th width="25%">Product Description</th>
                  <th width="25%">Image</th>
                </tr>

        <?php
        $connect = mysqli_connect('localhost', 'root', '', 'kerepekdb');
        $query = 'SELECT * FROM product ORDER BY id ASC';
        $result = mysqli_query($connect, $query);

        if($result) :
            if(mysqli_num_rows($result)>0) :
                while($product = mysqli_fetch_assoc($result)) :
                    //print_r($product);
                    $id = $product['id'];
        ?>

                <tr>
                  <td><?php echo $product['name']; ?></td>
                  <td>RM <?php echo $product['price']; ?></td>
                  <td><?php echo $product['product_desc']; ?></td>
                  <td><img style="width:100%;" src="<?php echo $product['image']; ?>" alt="Product Image"></td>
                </tr>

            <?php
                endwhile;
            endif;
        endif;
        ?>

        </table>
        </div>
    </div>

    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>