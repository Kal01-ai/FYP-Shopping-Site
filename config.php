<?php  
// PayPal configuration  
define('PAYPAL_ID', 'sandbox-store@kal.com'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE  
 
define('CONTINUE_SHOPPING_URL', 'http://localhost/FYP-Shopping-Site-main/cart.php');  
define('PAYPAL_RETURN_URL', 'http://localhost/FYP-Shopping-Site-main/success.html');  
define('PAYPAL_CANCEL_URL', 'http://localhost/FYP-Shopping-Site-main/cancel.html');  
//define('PAYPAL_NOTIFY_URL', 'http://localhost/FYP-Shopping-Site-main/paypal_ipn.php');  
define('PAYPAL_CURRENCY', 'MYR');  
  
// Change not required  
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");