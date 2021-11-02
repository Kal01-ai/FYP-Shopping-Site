<?php  

    session_start();
    $product_id = array();
    //session_destroy();

    //Check if add to cart button has been submitted
    if(filter_input(INPUT_POST, 'add-to-cart')) {
        if(isset($_SESSION['shopping_cart'])) {
            //Keep track how many products are in the shopping cart
            $count = count($_SESSION['shopping_cart']);

            //Create sequential array to product id
            $product_id = array_column($_SESSION['shopping_cart'], 'id');

            if(!in_array(filter_input(INPUT_GET, 'id'), $product_id)) {
                $_SESSION['shopping_cart'][$count] = array
                (
                    'id' => filter_input(INPUT_GET, 'id'),
                    'name' => filter_input(INPUT_POST, 'name'),
                    'price' => filter_input(INPUT_POST, 'price'),
                    'quantity' => filter_input(INPUT_POST, 'quantity')
                );
            }
            else { //Product already exist, increase quantity
                for($i = 0; $i < count($product_id); $i++) {
                    if($product_id[$i] == filter_input(INPUT_GET, 'id')) {
                        //Add quantity in existing array
                        $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                    }
                }
            }
        } else {
            //If shopping cart does not exist, create first product with array key 0
            $_SESSION['shopping_cart'][0] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );
        }
    }
//pre_r($_SESSION);

function pre_r($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>

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
    <!--Navigation Bar-->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.html">
                <img src="img/kerepek-r-us-logo.png" alt="Kerepek R Us Logo" width="80" height="80">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="product.html">Go back</a>
                  </li>
                </ul>
                <div style="color: white;" class="d-grid gap-2 d-md-flex justify-content-md-end">
                  Welcome, customer!
                  </div>
              </div>
            </div>
          </nav>
      </div>

    <!--Shopping cart page-->
    <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <!--PHP Here-->
    <?php 
    
        $connect = mysqli_connect('localhost', 'root', '', 'kerepekdb');
        $query = 'SELECT * FROM product ORDER BY id ASC';
        $result = mysqli_query($connect, $query);

        if($result) :
            if(mysqli_num_rows($result)>0) :
                while($product = mysqli_fetch_assoc($result)) :
                    //print_r($product);
                ?>

                <form method="post" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                    <div class="product col">
                        <div class="card">
                            <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product['name']; ?></h5>
                                <h4 class="card-text">RM <?php echo $product['price']; ?></h4>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="name" value="<?php echo $product['name']; ?>">
                                <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                                <input type="submit" name="add-to-cart" class="btn btn-info mt-3" value="Add to Cart">
                            </div>
                        </div>
                    </div>
                </form>

                <?php
                endwhile;
            endif;
        endif;
    ?>
    </div>

        <div style="clear:both"></div>
        <br>
        <div class="table-responsive">
            <table class="table">
                <tr><th colspan="5"><h3>Order Details</h3></th></tr>
                <tr>
                  <th width="40%">Product Name</th>
                  <th width="10%">Quantity</th>
                  <th width="20%">Price</th>
                  <th width="15%">Total</th>
                  <th width="5%">Action</th>
                </tr>
                <?php 
                
                  if(!empty($_SESSION['shopping_cart'])):

                    $total = 0;

                    foreach($_SESSION['shopping_cart'] as $key => $product):
                ?>
                <tr>
                  <td><?php echo $product['name']; ?></td>
                  <td><?php echo $product['quantity']; ?></td>
                  <td>RM <?php echo $product['price']; ?></td>
                  <td>RM <?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>
                  <td>
                    <a href="cart.php?action=delete&id=<?php echo $product['id']; ?>">
                      <div class="btn btn-danger">Remove</div>
                    </a>
                  </td>
                </tr>
                <?php 
                    $total = $total + ($product['quantity'] * $product['price']);
                    endforeach;
                ?>
                <tr>
                  <td colspan="3" align="right">Total Price</td>
                  <td align="right">RM <?php echo number_format($total, 2); ?></td>
                  <td></td>
                </tr>
                <tr>
                  <!--Show checkout only if shopping cart is not empty-->
                  <td colspan="5">
                    <?php 
                      if(isset($_SESSION['shopping_cart'])):
                      if(count($_SESSION['shopping_cart']) > 0):
                    ?>
                    <a href="#" class="d-grid gap-2 btn btn-primary">Checkout</a>
                    <?php endif; endif; ?>
                  </td>
                </tr>
                <?php endif; ?>
            </table>
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