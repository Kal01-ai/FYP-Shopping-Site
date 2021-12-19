<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="login.css" rel="stylesheet">
    <title>Login</title>
</head>
<body class="text-center">
    <?php
        session_start();
        if(isset($_SESSION['customer'])) {
            header("Location:index.php");
        }
    ?>

    <!--Login form-->
    <main class="form-signin">
        <form action="login-success.php" method="post">
          <img class="mb-4" src="img/kerepek-r-us-logo.png" alt="Logo" width="140" height="140">
          <h1 class="h3 mb-3 fw-normal" style="color: white;">Please sign in</h1>
      
          <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
          <div class="container pt-3 pb-3">
            <a class="btn btn-secondary btn-lg" href="index.php" role="button">Go home</a>
          </div>
          <a style="color: white;" href="change_password.php">Forgot password?</a>
          <p class="mt-5 mb-3 text-muted">Copyright &copy; 2021 Kerepek R Us</p>
        </form>
      </main>          

    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>