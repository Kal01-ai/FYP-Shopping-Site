<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="register.css" rel="stylesheet">
    <title>Registration Result</title>
</head>
<body>
    <!--Sign up form-->
    <section class="vh-100">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                      <!--PHP here-->
                      <?php 
                      $servername="localhost";
                      $username="root";
                      $password="RoxaR1234";

                      $dbase="kerepekdb";
 
                      $conn=new mysqli($servername, $username, $password, $dbase);

                      if ($conn->connect_error) {
	                    die("Connection failed: " .$conn->connect_error);
                      } else
                        echo "<br><br><br><br>";

                        $name=$_POST['name'];
                        $email=$_POST['email'];
                        $password=$_POST['password'];
                        $cPassword=$_POST['cPassword']; 
                      ?>

                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4 customText">

                      <?php
                      $sql="SELECT * FROM customer WHERE cust_email = '$email'";
                      $result=$conn->query($sql);

                      if($result->num_rows>0) {
                         echo "Email already exist!";
                         header("Refresh:3; url=register.php");
                       } else {

                      if($password != $cPassword) {
                        echo "Password do not match!";
                        header("Refresh:3; url=register.php");
                      } else {

                      $sql="INSERT INTO customer(cust_name, cust_email, cust_password)
                      VALUES('$name','$email','$password')";

                      if ($conn->query($sql)===TRUE) {
                          echo "Registration Successful! <br>";
                          header("Refresh:3; url=login.php");
                      } else {
                    echo "Error: " .$sql. "<br>" . $conn->error;
                      }
                    } 
                    }
                      ?>

                      </p>
                      
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                      <img src="img/kerepek-r-us-logo.png" class="img-fluid" alt="Logo">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>