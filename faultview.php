<?php 

include_once "includes/dbh.inc.php";

$sql="SELECT * FROM faults";
$result=mysqli_query($conn, $sql);

echo "<table>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['fault_id'] . "</td><td>" . $row['equipment_id'] . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>";