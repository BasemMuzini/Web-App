<?php

$BookingReason = $_POST ['BookingReason'];
$BuildingNumber = $_POST ['BuildingNumber'];
$ClassroomNameAndSymbol = $_POST ['ClassroomNameAndSymbol'];
$BookingWeek = $_POST ['BookingWeek'];
$BookingDay = $_POST ['BookingDay'];
$BookingTime = $_POST ['BookingTime'];


if (!empty($BookingReason) || !empty($BuildingNumber) || !empty($ClassroomNameAndSymbol) || !empty($BookingWeek) || !empty($BookingDay) || !empty($BookingTime))
{ 
   $host = "localhost";  
   $dbUsername = "root";
   $dbPassword = "";
   $dbname = "classroom_booking_system";
   
   // إنشاء الاتصال 
   
   $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
   
   if(mysqli_connect_error())
   {
	  die('Connect Error('.mysqli_connect_errno() .  ')'.mysqli_connect_error());
   }
   
   else 
   {
	  $SELECT = "SELECT BookingTime From thebookings Where BookingTime = ? Limit 1";
	  $INSERT = "INSERT Into thebookings (BookingReason,BuildingNumber,ClassroomNameAndSymbol,BookingWeek,BookingDay,BookingTime) Values (?,?,?,?,?,?)";
	  
	  // Prwpare statment
	  
       $stmt = $conn->prepare($SELECT);
	   $stmt->bind_param("s",$BookingTime);
	   $stmt->execute();
	   $stmt->bind_result($BookingTime);
	   $stmt->store_result();
	   $rnum = $stmt->num_rows;
	   
	   if ($rnum==0)
	   {
		   $stmt->close();
		   
           $stmt = $conn->prepare($INSERT);

           //           نوع المتغيرات
		   $stmt->bind_param("sissss", $BookingReason, $BuildingNumber, $ClassroomNameAndSymbol, $BookingWeek, $BookingDay, $BookingTime);
		   $stmt->execute();
		   echo "<h3><center><br><br><br> تم حجز القاعة بنجاح </h3></center>";
	   }
	   
	   else 
	   {
		   echo "<h3><center><br><br><br> يوجد بالفعل قاعة محجوزة في هذا الوقت .. فضلاً اختر وقتاً آخر </h3></center>";
	   }
	   
	   $stmt->close();
	   $conn->close();
	 
   }
   
}
else
{ echo "<h3><center><br><br><br> الرجاء ملىء جميع الحقول المطلوبة لحجز قاعة </h3></center>";
  die(); }

?>