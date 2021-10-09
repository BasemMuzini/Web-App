<?php

$UserName = $_POST ['UserName'];
$Password = $_POST ['Password'];
$JobNumber = $_POST ['JobNumber'];
$PhoneNumber = $_POST ['PhoneNumber'];
$Email = $_POST ['Email'];

if (!empty($UserName) || !empty($Password) || !empty($JobNumber) || !empty($PhoneNumber) || !empty($Email))
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
	  $SELECT = "SELECT UserName From supervisor Where UserName = ? Limit 1";
	  $INSERT = "INSERT Into supervisor (UserName,Password,JobNumber,PhoneNumber,Email) Values (?,?,?,?,?)";
	  
	  // Prwpare statment
	  
       $stmt = $conn->prepare($SELECT);
	   $stmt->bind_param("s",$UserName);
	   $stmt->execute();
	   $stmt->bind_result($UserName);
	   $stmt->store_result();
	   $rnum = $stmt->num_rows;
	   
	   if ($rnum==0)
	   {
		   $stmt->close();
		   
           $stmt = $conn->prepare($INSERT);

           //           نوع المتغيرات
		   $stmt->bind_param("siiss",$UserName,$Password,$JobNumber,$PhoneNumber,$Email);
		   $stmt->execute();
		   echo "تم إنشاء الحساب بنجاح";
	   }
	   
	   else 
	   {
		   echo "يوجد بالفعل مستخدم بنفس هذا الاسم .. فضلا قم بتغيير اسم المستخدم";
	   }
	   
	   $stmt->close();
	   $conn->close();
	 
   }
   
}
else
{ echo "يجب ملىء جميع الحقول المطلوبة"; die(); }

?>