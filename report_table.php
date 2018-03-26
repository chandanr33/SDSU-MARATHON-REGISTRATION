<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Person Report</title>
    <link rel="stylesheet" href="report.css">
  <!--   // RAJU, CHANDAN
  //   JADRAN 048
  //   PROJECT 3
  //   FALL 2017  -->
</head>
<body>
    <h1>Runners report</h1>
<?php
$server = 'opatija.sdsu.edu:3306';
$user = 'jadrn048';
$password = 'outlet';
$database = 'jadrn048';
if(!($db = mysqli_connect($server,$user,$password,$database)))
    echo "ERROR in connection ".mysqli_error($db);
else {
    $sql = "select * from person order by category,lname;";    
    $result = mysqli_query($db, $sql);
    // if(!result)
    //     echo "ERROR in query".mysqli_error($db);
    echo "<table>\n";
    echo
   
"<tr><td>Last name</td><td>First name</td><td>Email</td><td>Age</td><td>Experience level</td><td>Category</td><td>Runner's Image</td></tr>";
    while($row=mysqli_fetch_row($result)) {
        echo "<tr>";
        foreach(array_slice($row,1,-1) as $item) 
            echo "<td>$item</td>";
        $img=$row[7];
        echo "<td><img src='./images/".$img."'/></td>";

        echo "</tr>\n";
        }
    mysqli_close($db);
    }
?>
</table>
</body>
</html>