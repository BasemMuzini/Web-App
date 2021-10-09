<?php

$FullName = $_POST ['FullName'];
$BookingNumber = $_POST ['BookingNumber'];
$PhoneNumber = $_POST ['PhoneNumber'];
$Email = $_POST ['Email'];
$RequestsText = $_POST ['RequestsText'];

if (!empty($FullName) || !empty($BookingNumber) || !empty($PhoneNumber) || !empty($Email) || !empty($RequestsText))
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
	   $SELECT = "SELECT BookingNumber From generalrequest Where BookingNumber = ? Limit 1";
	   $INSERT = "INSERT Into generalrequest (FullName, BookingNumber, PhoneNumber, Email, RequestsText) Values (?,?,?,?,?)";

	  // Prwpare statment
	  
       $stmt = $conn->prepare($SELECT);
	   $stmt->bind_param("i",$BookingNumber);
	   $stmt->execute();
	   $stmt->bind_result($BookingNumber);
	   $stmt->store_result();
	   $rnum = $stmt->num_rows;
	   
	   if ($rnum==0)
	   {
		   $stmt->close();
		   
           $stmt = $conn->prepare($INSERT);

           //           نوع المتغيرات
		   $stmt->bind_param("siiss",$FullName,$BookingNumber,$PhoneNumber,$Email,$RequestsText);
		   $stmt->execute();
		   echo "<h3><center><br><br><br> تم تقديم الطلب بنجاح </h3></center>";
	   }
	 
	 else 
	   {
		   echo "<h3><center><br><br><br> ------------------ </h3></center>";
	   }
	   
	   $stmt->close();
	   $conn->close();
	 
   }
   
}
else
{ echo "<h3><center><br><br><br> الرجاء ملىء جميع الحقول المطلوبة لتقديم طلب عام </h3></center>";
  die(); }

?>