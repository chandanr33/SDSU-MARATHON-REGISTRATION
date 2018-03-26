<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;
    charset=iso-8859-1" />
    <title>Sample Form Processing with PHP</title>
<link rel="stylesheet" type="text/css" href="style.css" />
    

</head>
<!--     // RAJU, CHANDAN
  //   JADRAN 048
  //   PROJECT 3
  //   FALL 2017 
 -->
<body>
<?php
echo <<<ENDBLOCK
    <h1>$params[0] $params[1], thank you for registering.</h1>
    <table>
        <tr>
            <td>Address1</td>
            <td>$params[2]</td>
        </tr>
        <tr>
            <td>Address2</td>
            <td>$params[18]</td>
        </tr>
        <tr>
            <td>City</td>
            <td>$params[3]</td>
        </tr>
        <tr>
            <td>State</td>
            <td>$params[4]</td>
        </tr>
        <tr>
            <td>Zip Code</td>
            <td>$params[5]</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>($params[6]) $params[7]-$params[8]</td>
        </tr> 
        <tr>
            <td>Email</td>
            <td>$params[9]</td>
        </tr>
        <tr>
            <td>Gender</td>
            <td>$params[10]</td>
        </tr>
        <tr>
            <td>DOB</td>
            <td>$params[11]/$params[12]/$params[13]</td>
        </tr>
  
        <tr>
            <td>Experience level</td>
            <td>$params[14]</td>
        </tr>
        <tr>
            <td>Category</td>
            <td>$params[15]</td>
        </tr>
         <tr>
            <td>Runner's Image</td>
            <td>$params[16]</td>
        </tr>
        
    </table>                          
ENDBLOCK;


echo "<p>The raw query string that came from the browser is ",
    file_get_contents("php://input"),"</p>";

?>
</body></html> 