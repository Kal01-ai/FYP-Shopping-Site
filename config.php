<?php  
// PayPal configuration  
define('PAYPAL_ID', 'sandbox-store@kal.com'); 
define('PAYPAL_SANDBOX', TRUE); //TRUE or FALSE  
 
define('CONTINUE_SHOPPING_URL', 'http://localhost/fyp-website/cart.php');  
define('PAYPAL_RETURN_URL', 'http://localhost/fyp-website/success.php');  
define('PAYPAL_CANCEL_URL', 'http://localhost/fyp-website/cancel.php');  
//define('PAYPAL_NOTIFY_URL', 'http://localhost/Paypal-cart-payment/paypal_ipn.php');  
define('PAYPAL_CURRENCY', 'MYR');  
  
// Change not required  
define('PAYPAL_URL', (PAYPAL_SANDBOX == true)?"https://www.sandbox.paypal.com/cgi-bin/webscr":"https://www.paypal.com/cgi-bin/webscr");