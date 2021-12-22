<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia|Permanent+Marker">
    <link href="style.css" rel="stylesheet">
    <title>Our Products</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['customer'])) {
            header("Location:index_login.php");
        }
    ?>

    <!--Navigation Bar-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">
                <img src="img/kerepek-r-us-logo.png" alt="Kerepek R Us Logo" width="80" height="80">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about-us.php">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="product.php">Our Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact-us.php">Contact Us</a>
                  </li>
                </ul>
                <div style="color: white;" class="d-grid gap-2 d-md-flex justify-content-md-end">
                  Welcome, customer!
                  <a href="login-success.php?logout=true" class="btn btn-danger">Log Out</a>
                  </div>
              </div>
            </div>
          </nav>
      </div>

      <!--Product List-->
      <div class="container-fluid text-center mt-5">
        <div class="container pt-5">
            <h1 class="title">Our Products</h1>
        </div>
        <div class="container pt-5">
            <div class="row row-cols-1 row-cols-md-2 g-4">

        <?php
        $connect = mysqli_connect('localhost', 'root', '', 'kerepekdb');
        $query = 'SELECT * FROM product ORDER BY id ASC';
        $result = mysqli_query($connect, $query);

        if($result) :
            if(mysqli_num_rows($result)>0) :
                while($product = mysqli_fetch_assoc($result)) :

        ?>

                <div class="card customCard mb-3" style="max-width: 540px; background-color: rgb(27, 27, 27);">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="<?php echo $product['image']; ?>" class="img-fluid rounded-start" alt="Kerepek">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $product['name']; ?></h5>
                          <p class="card-text"><?php echo $product['product_desc']; ?></p>
                          <a href="cart.php" class="btn btn-info">Buy Now</a>
                        </div>
                      </div>
                    </div>
                  </div>

        <?php 
            endwhile;
          endif;
        endif;
        ?>

              </div>
        </div>
    </div>

      <!--Footer-->
      <div class="container">
        <footer class="bg-dark text-white text-center mt-5">
          <div class="container p-4 pb-0">
            <section class="mb-4">
              <a class="btn btn-primary m-1" href="https://www.facebook.com/kerepekRandUs/" target="_blank" role="button" style="background-color: #3b5998;">
                <i class="bi bi-facebook"></i>
              </a>
              <a class="btn btn-primary m-1" href="https://www.instagram.com/r_n_us/?hl=en" target="_blank" role="button" style="background-color: #ac2bac;">
                <i class="bi bi-instagram"></i>
              </a>
            </section>
          </div>
            <div class="p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                <p class="lead mt-3">Copyright &copy; 2021 Kerepek R Us</p>
            </div>
        </footer>
      </div>

      <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>