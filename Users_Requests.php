<html>
<head>

<meta charset="utf-8">
<title>استقبال الطلبات العامة</title>

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

<h2>الطلبات العامة</h2>
<hr>
<br>

 <tr>

<th>  الطلب </th>
<th> البريد الإلكتروني </th>
<th> رقم الجوال  </th>
<th> رقم الحجز  </th>
<th> الاسم الثلاثي </th>


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

$sql = "SELECT RequestsText, Email, PhoneNumber, BookingNumber, FullName FROM generalrequest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" .$row["RequestsText"]."</td><td>". $row["Email"]."</td><td>".$row["PhoneNumber"]. "</td><td>".$row["BookingNumber"]. "</td><td>".$row["FullName"]. "</td></tr>";
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