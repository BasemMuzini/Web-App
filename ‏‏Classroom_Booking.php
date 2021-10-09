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
<title>حجز قاعة</title>

</head>
<style>
input[type=text], select {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=date], select {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=time], select {
  width: 40%;
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
<center>
<body>

<br><br>
<font face="Tahoma, Geneva, sans-serif" color="#000000"><h3>حجز قاعة</h3></font><br/>
<hr>
<div>
  <form action="‏‏Classroom_Booking_Cunt.php" method="POST">

    <label for="BR">اختيار سبب الحجز للقاعة</label><br>
    <select name="BookingReason">
      <option selected hidden value="">اختر سبب الحجز</option>
      <option value="محاضرة">محاضرة</option>
	  <option value="اجتماع">اجتماع</option>
	  <option value="ورشة عمل">ورشة عمل</option>
	  <option value="دورة علمية">دورة علمية</option>
    </select>
	
	<br><br>
	
	 <label for="BN">اختيار المبنى</label><br>
    <select name="BuildingNumber">
      <option selected hidden value="">اختر رقم المبنى</option>
      <option value="105">105</option>
	</select>
    
	<br><br>
	

        <label for="CN&S">اختيار اسم القاعة</label><br>  
     
	 <select  name="ClassroomNameAndSymbol" >
	      <option selected hidden value="">اختر اسم القاعة</option>
	<?php while ($row1 = mysqli_fetch_array($result1)):;?>
	<option> <?php echo $row1[0];?>  </option>
	 <?php endwhile;?>

     </select>
	
<br><br>

<label for="BT">اختيار أسبوع الحجز</label><br>
    <select name="BookingWeek">
      <option selected hidden value="">اختر أسبوع الحجز</option>
      <option value="Week 01">Week 01</option>
	  <option value="Week 02">Week 02</option>
      <option value="Week 03">Week 03</option>
      <option value="Week 04">Week 04</option>
      <option value="Week 05">Week 05</option>
      <option value="Week 06">Week 06</option>
      <option value="Week 07">Week 07</option>
      <option value="Week 08">Week 08</option>
      <option value="Week 09">Week 09</option>
      <option value="Week 10">Week 10</option>
      <option value="Week 11">Week 11</option>
      <option value="Week 12">Week 12</option>
      <option value="Week 13">Week 13</option>
      <option value="Week 14">Week 14</option>
      <option value="Week 15">Week 15</option>
    </select>
	
<br><br>

<label for="BT">اختيار يوم الحجز</label><br>
    <select name="BookingDay">
      <option selected hidden value="">اختر يوم الحجز</option>
      <option value="الأحد">الأحد</option>
	  <option value="الاثنين">الاثنين</option>
	  <option value="الثلاثاء">الثلاثاء</option>
	  <option value="الأربعاء">الأربعاء</option>
	  <option value="الخميس">الخميس</option>
    </select> 
	
<br><br>

<label for="BT">اختيار وقت الحجز</label><br>
    <select name="BookingTime">
      <option selected hidden value="">اختر وقت الحجز</option>
      <option value="09:00 - 10:15">09:00 - 10:15</option>
	  <option value="11:30 - 12:45">11:30 - 12:45</option>
	  <option value="13:00 - 14:15">13:00 - 14:15</option>
	  <option value="14:30 - 15:45">14:30 - 15:45</option>
	  <option value="16:00 - 17:15">16:00 - 17:15</option>
	  <option value="17:30 - 18:45">17:30 - 18:45</option>
	  <option value="19:00 - 20:15">19:00 - 20:15</option>
	  <option value="20:30 - 22:10">20:30 - 22:10</option>

    </select>

<br><br> 

    <input type="submit" value="حجز القاعة">
  
  <br><br>
  
  </form>
</div>
</body>
</center>
</html>
