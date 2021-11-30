<?php

$servername="localhost";
$username="root";
$password="RoxaR1234";

$dbase="kerepekdb";

$conn=new mysqli($servername, $username, $password, $dbase);

if ($conn->connect_error) {
  die("Connection failed: " .$conn->connect_error);
} else
  echo "<br><br><br><br>";

  date_default_timezone_set("Asia/Kuala_Lumpur");
  $date_time = date('d-m-Y H:i:s');

  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $comment=$_POST['comment'];

$sql="INSERT INTO contact(first_name, last_name, email, comment, date_time)
VALUES('$fname','$lname','$email','$comment','$date_time')";

if ($conn->query($sql)===TRUE) {
    header("Refresh:0; url=contact-us.html");
    } else {
    echo "Error: " .$sql. "<br>" . $conn->error;
    }

?>