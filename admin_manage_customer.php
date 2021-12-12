<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="#" rel="stylesheet">
    <title>Admin Home Page</title>
</head>
<body>
    <!--PHP to verify admin session is active or not-->
    <?php
        session_start();
        if(!isset($_SESSION['admin'])) {
            header("Location:index.php");
        }
    ?>

    <!--customer Table-->
    <div class="container pt-5">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <h2>Welcome, Admin</h2>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="admin_panel.php" class="btn btn-secondary">Go back to main panel</a>
            <a href="admin.php?logout=true" class="btn btn-danger">Log Out</a>
        </div>

    <div style="clear:both"></div>
        <br>
        
        <div class="table-responsive">
            <table class="table">
                <tr><th colspan="5"><h3>Customer Details</h3></th></tr>
                <tr>
                  <th width="10%">Customer Name</th>
                  <th width="10%">Email</th>
                  <th width="20%">Password</th>
                  <th width="15%">Request Password Status</th>
                  <th width="15%">Action</th>
                </tr>

        <?php
        $connect = mysqli_connect('localhost', 'root', 'RoxaR1234', 'kerepekdb');
        $query = 'SELECT * FROM customer ORDER BY id ASC';
        $result = mysqli_query($connect, $query);

        if($result) :
            if(mysqli_num_rows($result)>0) :
                while($customer = mysqli_fetch_assoc($result)) :
                    //print_r($customer);
                    $id = $customer['id'];
        ?>

                <tr>
                  <td><?php echo $customer['cust_name']; ?></td>
                  <td><?php echo $customer['cust_email']; ?></td>
                  <td><?php echo $customer['cust_password']; ?></td>
                  <td><?php echo $customer['change_passwd'] ?></td>
                  <td>
                    <div class="d-grid gap-2 d-md-flex">
                    <form action="admin_update_customer.php?updateid=<?php echo $id; ?>" method="post">
                        <button class="btn btn-success" type="submit" name="Update">Update</button>
                    </form>
                    <form action="admin_delete_customer.php?deleteid=<?php echo $id; ?>" method="post">
                        <button class="btn btn-danger" type="submit" name="Delete">Delete</button>
                    </form>
                    </div>
                  </td>
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