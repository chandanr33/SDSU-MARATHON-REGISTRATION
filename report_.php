<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>A Login Example</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />                 
<style type="text/css">
h1, h2 { text-align: center; }
input { margin: 5px; }
#message_line { color: red; }
</style>             	
</head>
<body>
<?php

    // RAJU, CHANDAN
  //   JADRAN 048
  //   PROJECT 3
  //   FALL 2017 
$pass = $_POST['pass'];
$valid = false;

$raw = file_get_contents('passwords.dat');
$data = explode("~",$raw);
foreach($data as $item) {
    
    if(crypt($pass,$item) === $item) 
            $valid = true;            
    }  #end foreach
    
if($valid)
    readfile("http://jadran.sdsu.edu/~jadrn048/proj3/report_table.php"); 
else
    echo "Login Unsuccessful.";     
?>
</body>
</html>