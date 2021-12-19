<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="#" rel="stylesheet">
    <title>Delete Admin</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['manager'])) {
            header("Location:index.php");
        }

        $id = $_GET['deleteid'];

        $connect = mysqli_connect('localhost', 'root', 'RoxaR1234', 'kerepekdb');
        $query = "SELECT * FROM payments WHERE id = $id";
        $result = mysqli_query($connect, $query);

        if($result) {
            if(mysqli_num_rows($result)>0) {
                $payments = mysqli_fetch_assoc($result);
            }
        }
            
    ?>

    <div class="container pt-5">
        <h2 style="text-align: center;">Delete Admin</h2>
        <br>
    <form action="manager_delete_payment.php?deleteid=<?php echo $id; ?>" method="post" class="mx-1 mx-md-4" enctype="multipart/form-data">
      
        <div class="d-flex flex-row align-items-center mb-4">
          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
          <div class="form-outline flex-fill mb-0">
            <label class="form-label customText" for="name">Please confirm deletion of Payment:<br><br> 
                <b><?php echo $payments['cust_name']; ?></b><br>
                <b><?php echo $payments['cust_email']; ?></b><br>
                <b><?php echo $payments['date_time']; ?></b>
            </label>
          </div>
        </div>

        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
          <button class="btn btn-danger me-md-2 btn-lg" type="submit" name="deleteAdmin">Delete</button>
          <a class="btn btn-primary btn-lg" href="manager_view_payment.php" role="button">Cancel</a>
        </div>

      </form>
    </div>

    <?php
      if(isset($_POST['deleteAdmin'])) {
        $servername="localhost";
        $username="root";
        $password="RoxaR1234";
        
        $dbase="kerepekdb";
        
        $conn=new mysqli($servername, $username, $password, $dbase);
        
        if ($conn->connect_error) {
          die("Connection failed: " .$conn->connect_error);
        } else
          echo "<br><br><br><br>";

        $sql="DELETE FROM payments WHERE id=$id";
        
        if ($conn->query($sql)===TRUE) {
            header("Refresh:0; url=manager_view_payment.php");
            } else {
            echo "Error: " .$sql. "<br>" . $conn->error;
            }
      }
    ?>

    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>