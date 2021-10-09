<?php

$ClassroomNameAndSymbol = $_POST ['ClassroomNameAndSymbol'];
$BuildingNumber = $_POST ['BuildingNumber'];

if (!empty($ClassroomNameAndSymbol) || !empty($BuildingNumber))
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
	   
	   $query = "SELECT * FROM Classroom";

       $result1 = mysqli_query($conn, $query);

       $result2 = mysqli_query($conn, $query);
       $options = "";
       
       while($row2 = mysqli_fetch_array($result2))
       {
         $options = $options."<options> $row2[1]</options>";
       }


	   $DELETE = "DELETE FROM Classroom WHERE ClassroomNameAndSymbol = ? Limit 1";

	  // Prwpare statment
	  
       $stmt = $conn->prepare($DELETE);
	   $stmt->bind_param("s",$ClassroomNameAndSymbol);
	   $stmt->execute();
	   $stmt->bind_result($ClassroomNameAndSymbol);
	   $stmt->store_result();
	   $rnum = $stmt->num_rows;
	   
	   if ($rnum==0)
	   {
		   $stmt->close();
		   
           $stmt = $conn->prepare($DELETE);

           //           نوع المتغيرات
		   $stmt->bind_param("s",$ClassroomNameAndSymbol);
		   $stmt->execute();
		   echo "<h3><center><br><br><br> تم حذف القاعة من النظام بنجاح </h3></center>";
	   }
	   
	   else 
	   {
		   echo "<h3><center><br><br><br>يوجد الآن حجز على هذه القاعة ولا يمكن حذفها في الوقت الحالي  </h3></center>";
	   }
	   
	   $stmt->close();
	   $conn->close();
	 
   }
   
}
else
{ echo "هناك خطأ في الاتصال بقاعدة البيانات";
  die(); }

?>