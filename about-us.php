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
    <title>About Us</title>
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
                    <a class="nav-link active" aria-current="page" href="about-us.php">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="product.php">Our Products</a>
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

      <!--Image and Header-->
      <div class="container-fluid customImgLogo text-center mt-5">
        <div class="container pt-5">
            <h1 class="title">About Kerepek R Us</h1>
        </div>
        <img src="img/kerepek-r-us-logo.png" class="img-fluid" alt="Kerepek Image">
        <div class="container pt-5">
          <p style="color: black;" class="fs-4">Kerepek R Us is a start up business founded by a small group of college students in 2021 based in Selangor. We strive to offer our customers the very best when it comes to local snacks.</p>
          <p style="color: black;" class="fs-4">Our business initially started from a group project but since then, we've only grown bigger and better! We have expanded out horizons and the variety of our menu.</p>
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