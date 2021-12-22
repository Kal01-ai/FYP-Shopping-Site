<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="#" rel="stylesheet">
    <title>Add New Product</title>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['admin'])) {
            header("Location:index.php");
        }
    ?>

    <div class="container pt-5">
        <h2 style="text-align: center;">Add a New Product</h2>
        <br>
    <form action="admin_add_product.php" method="post" class="mx-1 mx-md-4" enctype="multipart/form-data">
      
        <div class="d-flex flex-row align-items-center mb-4">
          <i class="fas fa-user fa-lg me-3 fa-fw"></i>
          <div class="form-outline flex-fill mb-0">
            <label class="form-label customText" for="name">Product Name</label>
            <input type="text" name="productName" id="name" class="form-control" required />
          </div>
        </div>

        <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
              Warning: If no image is chosen, image will be empty.<br>
              Choose an Image File
              <div class="form-group">
                <input type="file" class="form-control-file" name="file">
               </div>
            </div>
          </div>

        <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
              <label class="form-label customText" for="price">Price</label>
              <input type="number" name="price" id="price" class="form-control" required />
            </div>
          </div>

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
            <label class="form-label customText" for="price">Product Description</label>
            <textarea class="form-control customInput" rows="5" id="pDesc" name="pDescription" required></textarea>
            </div>
          </div>

          <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
            <label class="form-label customText" for="price">Description to Manager</label>
            <textarea class="form-control customInput" rows="5" id="desc" name="description" required></textarea>
            </div>
          </div>

        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
          <button class="btn btn-primary me-md-2 btn-lg" type="submit" name="addProduct">Add</button>
          <a class="btn btn-danger btn-lg" href="admin_panel.php" role="button">Cancel</a>
        </div>

      </form>
    </div>

    <?php
      if(isset($_POST['addProduct'])) {
        $servername="localhost";
        $username="root";
        $password="";
        
        $dbase="kerepekdb";
        
        $conn=new mysqli($servername, $username, $password, $dbase);
        
        if ($conn->connect_error) {
          die("Connection failed: " .$conn->connect_error);
        } else
          echo "<br><br><br><br>";
        
          $image = 'img/' . $_FILES['file']['name'];
          date_default_timezone_set("Asia/Kuala_Lumpur");
          $date_time = date('d-m-Y H:i:s');
          $action = 'Create Product';
        
          $admin_email = $_SESSION['admin'];
          $pName=$_POST['productName'];
          $price=$_POST['price'];
          $pDesc=$_POST['pDescription'];
          $desc=$_POST['description'];
        
        $sql="INSERT INTO activity_admin(admin_email, admin_description, date_time, action_performed)
        VALUES('$admin_email','$desc','$date_time','$action')";
        
        if ($conn->query($sql)===TRUE) {
            //header("Refresh:0; url=contact-us.html");
            } else {
            echo "Error: " .$sql. "<br>" . $conn->error;
            }

        $sql="INSERT INTO product(name, image, price, product_desc)
        VALUES('$pName','$image','$price','$pDesc')";
        
        if ($conn->query($sql)===TRUE) {
            header("Refresh:0; url=admin_panel.php");
            } else {
            echo "Error: " .$sql. "<br>" . $conn->error;
            }

        //check if uploaded image already exist in img folder.
        //If img exist, the img will not be duplicated in the folder
        //but the database will update the img.
        $target_dir = getcwd() . "\\img\\";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
          //echo "Sorry, file already exists.\n";
          $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.\n";
        // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            //echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.\n";
          } else {
            //echo "Sorry, there was an error uploading your file.\n";
          }
        }
      }
    ?>

    <!--JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>