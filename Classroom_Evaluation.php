<?php
 
   $host = "localhost";  
   $dbUsername = "root";
   $dbPassword = "";
   $dbname = "classroom_booking_system";
   
   // إنشاء الاتصال 
   
   $connect = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
   

       $query = "SELECT * FROM Classroom";

       $result1 = mysqli_query($connect, $query);

       $result2 = mysqli_query($connect, $query);
       $options = "";
       
       while($row2 = mysqli_fetch_array($result2))
       {
         $options = $options."<options> $row2[1]</options>";
       }

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<title> تقييم قاعة </title>

</head>
<style>
input[type=text], select {
  width:40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 20%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  float: center;
}

body
{
	background: #f7f7f7;
	float:center;
}

</style>
<body >
<center>

<form action="Classroom_Evaluationing.php" method="POST"></br>


<br>
<font face="Tahoma, Geneva, sans-serif" color="#000000"><h3>تقييم قاعة</h3></font><br/>

<hr>
<br><br>
    <label for="BN">اختيار رقم المبنى</label></br><br>
    <select name="BuildingNumber">
      <option selected hidden value="">اختر رقم المبنى</option>
<option value="105">105</option>

    </select></br>



	<label for="CN&S"> اختيار اسم القاعة </label></br>
  
<select  name="ClassroomNameAndSymbol">
   <option selected hidden value="">اختر اسم القاعة</option>
	<?php while ($row1 = mysqli_fetch_array($result1)):;?>
	<option> <?php echo $row1[0];?>  </option>
	 <?php endwhile;?>

</select>
	
<br><br>

 <label for="BN">اختيار تاريخ آخر حجز للقاعة</label></br>
  <input type="date" name="EvaluationDate">
  
<br><br>

<label for="OW">كتابة التقييم</label><br/>
  <textarea type="text" name="EvaluationText" rows="3" cols="50">
</textarea>

</br>

    <input type="submit" value="تقييم القاعة" >
 
 </form>


</center>
</body>
</html>