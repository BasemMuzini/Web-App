<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<title>الصفحة الرئيسية</title>

</head>
<style>


input[type=number], select {
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 10%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn{
	width: 7%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}


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

<?php

$connection = mysqli_connect('localhost','root','','classroom_booking_system');
if(isset($_POST['search'])) {
	$searchkey = $_POST['search'];
	$sql = "SELECT * FROM classroom WHERE ClassroomCapacity LIKE '%$searchkey%'";
} else {
    $sql = "SELECT * FROM classroom";
    $searchkey="";

}

$result = mysqli_query($connection,$sql);

?>

<center>	
 
 <br><br>


<h3>القاعات الموجودة على النظام</h3><br/>

<hr>
<form action="" method="POST">

<br>

<h3>البحث عن قاعة بحسب السعة الاستيعابية</h3><br>
	
<input type="number" name="search" placeholder="اكتب رقم السعة الاستعابية" value="">
<button class="btn">بحث</button>


<br><br>
<table>

 <tr>

<th>  السعة الاستيعابية للقاعة </th>
<th> رقم المبنى  </th>
<th> اسم القاعة </th>

 </tr>

 <br><br>

<?php while($row = mysqli_fetch_object($result)) { ?>

<tr>
	<td><?php echo $row->ClassroomCapacity ?></td>
	<td><?php echo $row->BuildingNumber ?></td>
	<td><?php echo $row->ClassroomNameAndSymbol ?></td>
</tr>
<?php } ?>
</table>

</center>
</form>
</body>
</html>