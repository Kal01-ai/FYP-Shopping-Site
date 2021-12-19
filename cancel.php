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
        if(isset($_GET['cancel'])) {}

        if(!isset($_GET['cancel'])) {
            header("Location:index_login.php");
        }
    ?>
        <div class="container-fluid customImgStock text-center mt-5">
          <div class="container pt-5 pb-5">
              <h1 style="color: black;">Payment Cancelled!</h1>
          </div>
          <div class="container pt-5">
              <p style="color: black;">Thank you for shopping with Kerepek R Us!</p>
              <a href="index.php" class="btn btn-primary">Go home</a>
          </div>
        </div>

    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>