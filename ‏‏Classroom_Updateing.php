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
	  $UPDATE = "UPDATE Classroom SET BuildingNumber = $BuildingNumber, ClassroomCapacity= $ClassroomCapacity WHERE ClassroomNameAndSymbol=$ClassroomNameAndSymbol";
	  
	  // Prwpare statment
	  
       $stmt = $conn->prepare($UPDATE);
	   $stmt->bind_param("i",$ClassroomCapacity);
	   $stmt->execute();
	   $stmt->bind_result($ClassroomCapacity);
	   $stmt->store_result();
	   $rnum = $stmt->num_rows;
	   
	   if ($rnum==0)
	   {
		   $stmt->close();
		   
           $stmt = $conn->prepare($UPDATE);

           //           نوع المتغيرات
		   $stmt->bind_param("sii",$ClassroomNameAndSymbol,$BuildingNumber,$ClassroomCapacity);
		   $stmt->execute();
		   echo "<h3><center><br><br><br> تم تعديل القاعة على النظام بنجاح </h3></center>";
	   }
	   
	   else 
	   {
		   echo "<h3><center><br><br><br> ---------------- </h3></center>";
	   }
	   
	   $stmt->close();
	   $conn->close();
	 
   }
   
}
else
{ echo "هناك خطأ في الاتصال بقاعدة البيانات";
  die(); }

?>