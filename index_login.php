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
    <title>Home</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['customer'])) {
            header("Location:index.php");
        }
    ?>

    <!--Navigation Bar-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="index_login.php">
                <img src="img/kerepek-r-us-logo.png" alt="Kerepek R Us Logo" width="80" height="80">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index_login.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="about-us_login.php">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="product_login.php">Our Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact-us_login.php">Contact Us</a>
                  </li>
                </ul>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-primary me-md-2" href="register.php" role="button">Register</a>
                    <a class="btn btn-secondary" href="login.php" role="button">Login</a>
                </div>
              </div>
            </div>
          </nav>
      </div>

      <!--Image and Welcome Message-->
      <div class="container-fluid customImgStock text-center mt-5">
          <div class="container pt-5">
              <h1 class="title">Welcome to Kerepek R Us</h1>
              <p class="fs-4 title-content">Snack N' Relax</p>
          </div>
          <img src="img/main-img-site.png" class="img-fluid" alt="Kerepek Image">
      </div>

      <!--Main Contents-->
      <div class="container pt-3">
          <div class="row mt-5">
              <div class="col-sm">
                  <div class="card customCard">
                      <div class="card-body">
                          <h5 class="card-title fw-bold">About Us</h5>
                          <p class="card-text">Kerepek R Us is a small and independant business that sells kerepek in various flavours.</p>
                          <p class="card-text">Learn more by clicking the button below.</p>
                          <a href="about-us_login.php" class="btn btn-info">About Us</a>
                      </div>
                  </div>
              </div>
              <div class="col-sm">
                <div class="card customCard">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Our Products</h5>
                        <p class="card-text">Kerepek R Us provides a variety of kerepek flavours such as kerepek pisang, kerepek bawang and kerepek ubi pedas.</p>
                        <p class="card-text">Learn more by clicking the button below.</p>
                        <a href="product_login.php" class="btn btn-info">Our Products</a>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card customCard">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Contact Us</h5>
                        <p class="card-text">Interested in our business? Need to ask some questions?</p>
                        <p class="card-text">Learn how to contact us by clicking the button below.</p>
                        <a href="contact-us_login.php" class="btn btn-info">Contact Us</a>
                    </div>
                </div>
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