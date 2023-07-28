<?php
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
if(mail("s190084@rguktsklm.ac.in","My subject",$msg)){
    echo 'yes';
}
else{
    echo 'noo';
}
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
?>
