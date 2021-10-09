<?php

$BuildingNumber = $_POST ['BuildingNumber'];
$ClassroomNameAndSymbol = $_POST ['ClassroomNameAndSymbol'];
$EvaluationDate = $_POST ['EvaluationDate'];
$EvaluationText = $_POST ['EvaluationText'];

if (!empty(!empty($BuildingNumber) || $ClassroomNameAndSymbol) || !empty($EvaluationDate) || !empty($EvaluationText))
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


	   $SELECT = "SELECT ClassroomNameAndSymbol From evaluation Where ClassroomNameAndSymbol = ? Limit 1";
	   $INSERT = "INSERT Into evaluation (BuildingNumber, ClassroomNameAndSymbol, EvaluationDate, EvaluationText) Values (?,?,?,?)";

	  // Prwpare statment
	  
       $stmt = $conn->prepare($INSERT);
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
		   $stmt->bind_param("isis",$BuildingNumber,$ClassroomNameAndSymbol,$EvaluationDate,$EvaluationText);
		   $stmt->execute();
		   echo "<h3><center><br><br><br> تم تقييم القاعة بنجاح </h3></center>";
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
{ echo "<h3><center><br><br><br> الرجاء ملىء جميع الحقول المطلوبة لتقييم قاعة </h3></center>";
  die(); }

?>