<?php
 	// RAJU, CHANDAN
  //   JADRAN 048
  //   PROJECT 3
  //   FALL 2017 
if($_GET) exit;
if($_POST) exit;


$pass = array('cs545','abc123','sdsu');

#### Using SHA256 #######
$salt='$1$gj9@9i8md';  # 12 character salt starting with $1$

for($i=0; $i<count($pass); $i++) 
        echo crypt($pass[$i],$salt)."...";
?>