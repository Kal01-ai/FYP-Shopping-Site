<?php  
// PayPal configuration  
define('PAYPAL_ID', 'sandbox-store@kal.com'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE  
 
define('CONTINUE_SHOPPING_URL', 'http://localhost/FYP/cart.php');  
define('PAYPAL_RETURN_URL', 'http://localhost/FYP/success.php?payment=true');  
define('PAYPAL_CANCEL_URL', 'http://localhost/FYP/cancel.php?cancel=true');  
//define('PAYPAL_NOTIFY_URL', 'http://localhost/FYP/paypal_ipn.php');  
define('PAYPAL_CURRENCY', 'MYR');  
  
// Change not required  
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");