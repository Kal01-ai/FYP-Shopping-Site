<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['admin'])) {
            header("Location:index.html");
        }
    ?>

    <h1>Hello Admin</h1>

    <p><a href="admin.php?logout=true">Logout</a></p>
</body>
</html>