<?php

$servername="localhost";
$username="root";
$password="";

$dbase="kerepekdb";

$conn=new mysqli($servername, $username, $password, $dbase);

if ($conn->connect_error) {
  die("Connection failed: " .$conn->connect_error);
} else
  echo "<br><br><br><br>";

  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $comment=$_POST['comment'];

$sql="INSERT INTO contact(first_name, last_name, email, comment)
VALUES('$fname','$lname','$email','$comment')";

if ($conn->query($sql)===TRUE) {
    header("Refresh:0; url=contact-us.html");
    } else {
    echo "Error: " .$sql. "<br>" . $conn->error;
    }

?>