<html>
<head>

<meta charset="utf-8">
<title>تلقي تقييمات القاعات</title>

</head>
<style>



td, th {
  border: 1px solid #ddd;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}

 tr:hover {background-color: #ddd;}

 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

body
{
	background: #f7f7f7;
}
</style>


<body>
<center>	
<table>
 
 <br><br>

<h2> تقييمات القاعات </h2>
<hr>
<br>

 <tr>
 
<th> تقييم القاعة </th>
<th>  تاريخ آخر حجز للقاعة </th>
<th> رقم المبنى  </th>
<th> اسم القاعة </th>


 </tr>

 <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "classroom_booking_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT EvaluationText, EvaluationDate, BuildingNumber, ClassroomNameAndSymbol FROM evaluation";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" .$row["EvaluationText"]."</td><td>" .$row["EvaluationDate"]."</td><td>". $row["BuildingNumber"]."</td><td>".$row["ClassroomNameAndSymbol"]. "</td></tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

?>


</table>
</center>
</body>
</html>