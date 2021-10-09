<?php

$ClassroomNameAndSymbol = $_POST ['ClassroomNameAndSymbol'];
$BuildingNumber = $_POST ['BuildingNumber'];
$ClassroomCapacity = $_POST ['ClassroomCapacity'];

if (!empty($ClassroomNameAndSymbol) || !empty($BuildingNumber) || !empty($ClassroomCapacity))
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
	  $SELECT = "SELECT ClassroomNameAndSymbol From classroom Where ClassroomNameAndSymbol = ? Limit 1";
	  $INSERT = "INSERT Into Classroom (ClassroomNameAndSymbol,BuildingNumber,ClassroomCapacity) Values (?,?,?)";
	  
	  // Prwpare statment
	  
       $stmt = $conn->prepare($SELECT);
	   $stmt->bind_param("s",$ClassroomNameAndSymbol);
	   $stmt->execute();
	   $stmt->bind_result($ClassroomNameAndSymbol);
	   $stmt->store_result();
	   $rnum = $stmt->num_rows;
	   
	   if ($rnum==0)
	   {
		   $stmt->close();
		   
           $stmt = $conn->prepare($INSERT);

           //           نوع المتغيرات
		   $stmt->bind_param("sii",$ClassroomNameAndSymbol,$BuildingNumber,$ClassroomCapacity);
		   $stmt->execute();
		   echo "<h3><center><br><br><br> تم إضافة القاعة إلى النظام بنجاح </h3></center>";
	   }
	   
	   else 
	   {
		   echo "<h3><center><br><br><br> يوجد بالفعل قاعة بنفس هذا الاسم </h3></center>";
	   }
	   
	   $stmt->close();
	   $conn->close();
	 
   }
   
}
else
{ echo "هناك خطأ في الاتصال بقاعدة البيانات";
  die(); }

?>