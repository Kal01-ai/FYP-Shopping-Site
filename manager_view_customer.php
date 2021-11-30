<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="#" rel="stylesheet">
    <title>Customer Contact</title>
</head>
<body>
    <!--PHP to verify manager session is active or not-->
    <?php
        session_start();
        if(!isset($_SESSION['manager'])) {
            header("Location:index.html");
        }
    ?>

    <!--contact Table-->
    <div class="container pt-5">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <h2>Welcome, Manager</h2>
        </div>
        <div class="pb-5 d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="manager_panel.php" class="btn btn-secondary">Go back to main panel</a>
            <a href="manager.php?logout=true" class="btn btn-danger">Log Out</a>
        </div>

    <div style="clear:both"></div>
        <br>
        
        <div class="table-responsive">
            <table class="table">
                <tr><th colspan="5"><h3>Customer Contact</h3></th></tr>
                <tr>
                  <th width="10%">First Name</th>
                  <th width="10%">Last Name</th>
                  <th width="10%">Customer Email</th>
                  <th width="30%">Comment</th>
                  <th width="10%">Date and Time</th>
                </tr>

        <?php
        $connect = mysqli_connect('localhost', 'root', 'RoxaR1234', 'kerepekdb');
        $query = 'SELECT * FROM contact ORDER BY id ASC';
        $result = mysqli_query($connect, $query);

        if($result) :
            if(mysqli_num_rows($result)>0) :
                while($contact = mysqli_fetch_assoc($result)) :
                    //print_r($contact);
                    $id = $contact['id'];
        ?>

                <tr>
                  <td><?php echo $contact['first_name']; ?></td>
                  <td><?php echo $contact['last_name']; ?></td>
                  <td><?php echo $contact['email']; ?></td>
                  <td><?php echo $contact['comment']; ?></td>
                  <td><?php echo $contact['date_time']; ?></td>
                </tr>

            <?php
                endwhile;
            endif;
        endif;
        ?>

        </table>
        </div>
    </div>

    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>