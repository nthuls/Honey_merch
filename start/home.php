<?php 
// this code is for redirecting to different pages if the credentials are correct.
   session_start();
   include "db_conn.php";
   
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
         //admin
      	if ($_SESSION['role'] == 'admin'){
			header("Location: pages/admin.php");
      	 }
		 //user
		 else if ($_SESSION['role'] == 'user'){ 
			header("Location: pages/userpages/user1.php");
      	} 
		//farmer
		  else if ($_SESSION['role'] == 'farmer'){ 
			header("Location: pages/farmer.php");	
		}
		
 }
else{
	header("Location:login.php");
}
?>