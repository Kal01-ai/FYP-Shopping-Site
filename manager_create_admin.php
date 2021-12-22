<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="#" rel="stylesheet">
    <title>Add New Product</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['manager'])) {
            header("Location:index.php");
        }
    ?>

    <div class="container pt-5">
        <h2 style="text-align: center;">Create a new Admin Account</h2>
        <br>
    <form action="manager_create_admin.php" method="post" class="mx-1 mx-md-4" enctype="multipart/form-data">
      
        <div class="d-flex flex-row align-items-center mb-4">
          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
          <div class="form-outline flex-fill mb-0">
            <label class="form-label customText" for="name">Admin Name</label>
            <input type="text" name="adminName" id="name" class="form-control" required />
          </div>
        </div>

        <div class="d-flex flex-row align-items-center mb-4">
          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
          <div class="form-outline flex-fill mb-0">
            <label class="form-label customText" for="email">Admin Email</label>
            <input type="email" name="adminEmail" id="email" class="form-control" required />
          </div>
        </div>

        <div class="d-flex flex-row align-items-center mb-4">
          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
          <div class="form-outline flex-fill mb-0">
            <label class="form-label customText" for="password">Admin Password</label>
            <input type="password" name="adminPasswd" id="password" class="form-control" required />
          </div>
        </div>

        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
          <button class="btn btn-primary me-md-2 btn-lg" type="submit" name="createAdmin">Add</button>
          <a class="btn btn-danger btn-lg" href="manager_manage_admin.php" role="button">Cancel</a>
        </div>

      </form>
    </div>

    <?php
      if(isset($_POST['createAdmin'])) {
        $servername="localhost";
        $username="root";
        $password="";
        
        $dbase="kerepekdb";
        
        $conn=new mysqli($servername, $username, $password, $dbase);
        
        if ($conn->connect_error) {
          die("Connection failed: " .$conn->connect_error);
        } else
          echo "<br><br><br><br>";

          $name = $_POST['adminName'];
          $email = $_POST['adminEmail'];
          $password = $_POST['adminPasswd'];
        
        $sql="INSERT INTO admin_log(admin_name, admin_email, admin_password)
        VALUES('$name','$email','$password')";
        
        if ($conn->query($sql)===TRUE) {
            header("Refresh:0; url=manager_manage_admin.php");
            } else {
            echo "Error: " .$sql. "<br>" . $conn->error;
            }
      }
    ?>

    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>