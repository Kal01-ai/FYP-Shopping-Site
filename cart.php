<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="cart.css" rel="stylesheet">
    <title>Checkout</title>
</head>
<body>
    <div class="container">
    <!--PHP Here-->
    <?php 
    
        $connect = mysqli_connect('localhost', 'root', '', 'kerepekdb');
        $query = 'SELECT * FROM product ORDER BY id ASC';
        $result = mysqli_query($connect, $query);

        if($result) :
            $i=0;
            echo '<table><tr>';
            if(mysqli_num_rows($result)>0) :
                while($product = mysqli_fetch_assoc($result)) :
                    //print_r($product);
                    ?>

                    <td>
                        <div class="product">
                            <form method="post" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                                <div class="row row-cols-1 row-cols-md-3 g-4"></div>
                            </form>
                        </div>
                    </td>

                <?php
                    $i++;
                    if($i==5) {
                        echo '</tr><tr>';
                    }
                endwhile;
                    echo '</tr></table>';
            endif;
        endif;
    ?>
    </div>

    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>