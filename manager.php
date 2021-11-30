<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="admin.css" rel="stylesheet">
    <title>Login Result</title>
</head>
<body>
    <!--Login form-->
    <main class="form-signin">
        <form>
          <img class="mb-4" src="img/kerepek-r-us-logo.png" alt="Logo" width="140" height="140">

        <!--PHP Here-->
        <?php
           $servername="localhost";
           $username="root";
           $password="RoxaR1234";

           $dbase="kerepekdb";
 
           $conn=new mysqli($servername, $username, $password, $dbase);
           ?>

        <?php
           if ($conn->connect_error) {
	      die("Connection failed: " .$conn->connect_error);
           } else
              echo "<br><br><br><br>";

           $email=$_POST['email'];
           $password=$_POST['password'];

           $sql="SELECT * FROM manager_log WHERE manager_email = '$email' && manager_password = '$password'";
           $result=$conn->query($sql);
           ?>

        <h1 class="h3 mb-3 fw-normal" style="color: black;">

        <?php
           if($result->num_rows>0) {
             session_start();
             $_SESSION['manager'] = $email;

             echo "Login Successful!";
             header("Refresh:2; url=manager_panel.php");
           } else {
                 echo "Error! Invalid username or password!";
                 header("Refresh:2; url=manager_login.php");
           }
           ?>

          <?php
            if(isset($_GET['logout'])) {
              session_start();
              unset($_SESSION['manager']);
              session_destroy();
              header("Location:manager_login.php");
              exit;
            }
          ?>

        </h1>
        
          <p class="mt-5 mb-3 text-muted">Copyright &copy; 2021 Kerepek R Us</p>
        </form>
      </main>

    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>