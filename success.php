<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="style.css" rel="stylesheet">
    <title>Success</title>
</head>
<body>
    <?php
        session_start();
        $email = $_SESSION['customer'];

        $connect = mysqli_connect('localhost', 'root', 'RoxaR1234', 'kerepekdb');
        $query = "SELECT * FROM customer WHERE cust_email = '$email'";
        $result = mysqli_query($connect, $query);

        if($result) {
            if(mysqli_num_rows($result)>0) {
                $customer = mysqli_fetch_assoc($result);
            }
        }
    ?>
        <div style="color: black;" class="container-fluid customImgStock text-center mt-5">
          <div class="container pt-5 pb-5">
              <h1>Payment Successfull!</h1>
              <h4 class="fs-4">Please check your PayPal account to view your reciept.</h4>
          </div>
          <div class="container pt-5">
              <p class="fs-4">Thank you for shopping with Kerepek R Us!</p>
              <a href="index.php" class="btn btn-primary">Go home</a>
          </div>
        </div>

        <?php
            if(isset($_GET['payment'])) {
                $servername="localhost";
                $username="root";
                $password="RoxaR1234";
                
                $dbase="kerepekdb";
                
                $conn=new mysqli($servername, $username, $password, $dbase);
                
                if ($conn->connect_error) {
                  die("Connection failed: " .$conn->connect_error);
                } else
                  //echo "<br><br><br><br>";

                date_default_timezone_set("Asia/Kuala_Lumpur");
                $date_time = date('d-m-Y H:i:s');
                
                $name = $customer['cust_name'];
                $pay_status = "Completed";
    
                $sql="INSERT INTO payments(cust_email, cust_name, payment_status, date_time)
                VALUES('$email','$name','$pay_status','$date_time')";
                
                if ($conn->query($sql)===TRUE) {
                    //header("Refresh:0; url=index.php");
                    } else {
                    echo "Error: " .$sql. "<br>" . $conn->error;
                    }
            }
        ?>

    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>