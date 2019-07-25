<?php
include 'config.php';
$information=array();
$check=0;
if (isset($_GET['token'])) {
	# code...
	if (!empty($_GET['token'])) {
		# code...
		$token=$_GET['token'];
        $result= mysqli_query($conn,"SELECT * FROM `user` WHERE token='$token'");
		if (mysqli_num_rows($result)>0) {
			$check=1;
		}
	}
}
if ($check==1) {
	# code...
	if (isset($_GET['action'])) {
	
	if ($_GET['action']=="addexpense") {
		# code...
		$title=$_GET['title'];
		$notes=$_GET['notes'];
		$price=$_GET['price'];
	
	
		$result= mysqli_query($conn,"INSERT INTO `expenses` ( `title`, `notes`, `price`) VALUES ('$title', '$notes','$price')");
    	$last_id = $conn->insert_id;
        $result= mysqli_query($conn,"SELECT * FROM `expenses` WHERE id='$last_id'");
		$res=mysqli_fetch_array($result);

		$information = array("access"=>'1',"id"=>$res["id"] ,"title"=>$res["title"],"notes"=>$res["notes"], "price"=>$res["price"] , "date_added"=>$res["date_added"]);	
					echo json_encode($information,JSON_PRETTY_PRINT)."\n";
					
	}
		elseif ($_GET['action']=="addreceipt") {
				# code...
		$title=$_GET['title'];
		$notes=$_GET['notes'];
		$price=$_GET['price'];
	
	
		$result= mysqli_query($conn,"INSERT INTO `receipts` ( `title`, `notes`, `price`) VALUES ('$title', '$notes','$price')");
    	$last_id = $conn->insert_id;
        $result= mysqli_query($conn,"SELECT * FROM `receipts` WHERE id='$last_id'");
		$res=mysqli_fetch_array($result);

		$information = array("access"=>'1',"id"=>$res["id"] ,"title"=>$res["title"],"notes"=>$res["notes"], "price"=>$res["price"] , "date_added"=>$res["date_added"]);	
					echo json_encode($information,JSON_PRETTY_PRINT)."\n";
					
	}

		elseif ($_GET['action']=="deletereceipt") {
		# code...
		if (isset($_GET['receipt_id'])) {
			# code...
			$receipt_id=$_GET['receipt_id'];
			
			$result=mysqli_query($conn, "DELETE FROM receipts WHERE id='".$receipt_id."'");

       

		$information = array("access"=>'1');	
					echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		}
		else{
			$error= "receipt ID is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	    echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		
		}
					
	}

			elseif ($_GET['action']=="deleteexpense") {
		# code...
		if (isset($_GET['expense_id'])) {
			# code...
			$expense_id=$_GET['expense_id'];
			
			$result=mysqli_query($conn, "DELETE FROM expenses WHERE id='".$expense_id."'");

       

		$information = array("access"=>'1');	
					echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		}
		else{
			$error= "receipt ID is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	    echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		
		}
					
	}

			elseif ($_GET['action']=="showexpense") {
		# code...
		if (isset($_GET['expense_id'])) {
			# code...
			$expense_id=$_GET['expense_id'];
			
			$result=mysqli_query($conn, "SELECT * FROM expenses WHERE id='".$expense_id."'");
		    $res=mysqli_fetch_array($result);
$information = array("access"=>'1',"id"=>$res["id"] ,"title"=>$res["title"],"notes"=>$res["notes"], "price"=>$res["price"] , "date_added"=>$res["date_added"]);	
					echo json_encode($information,JSON_PRETTY_PRINT)."\n";
       

		}
		else{
			$error= "Expense ID is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	    echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		
		}
					
	}
	elseif ($_GET['action']=="showreceipt") {
		# code...
		if (isset($_GET['receipt_id'])) {
			# code...
			$receipt_id=$_GET['receipt_id'];
			
			$result=mysqli_query($conn, "SELECT * FROM receipts WHERE id='".$receipt_id."'");
		    $res=mysqli_fetch_array($result);
$information = array("access"=>'1',"id"=>$res["id"] ,"title"=>$res["title"],"notes"=>$res["notes"], "price"=>$res["price"] , "date_added"=>$res["date_added"]);	
					echo json_encode($information,JSON_PRETTY_PRINT)."\n";
       

		}
		else{
			$error= "Expense ID is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	    echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		
		}
					
	}

			elseif ($_GET['action']=="editexpense") {
		# code...
		if (isset($_GET['expense_id'])) {
			# code...
			$expense_id=$_GET['expense_id'];
		$title=$_GET['title'];
		$notes=$_GET['notes'];
		$price=$_GET['price'];
	
			$result=mysqli_query($conn,"UPDATE `expenses` SET `title` = '$title',`notes` = '$notes', `price` = '$price' WHERE `expenses`.`id` = '$expense_id'");

        $result= mysqli_query($conn,"SELECT * FROM `expenses` WHERE id='$expense_id'");
		$res=mysqli_fetch_array($result);

			$information = array("access"=>'1',"id"=>$res["id"] ,"title"=>$res["title"],"notes"=>$res["notes"], "price"=>$res["price"] , "date_added"=>$res["date_added"]);	
					echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		}
		else{
			$error= "Expense ID is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	    echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		
		}
					
	}

				elseif ($_GET['action']=="editreceipt") {
		# code...
		if (isset($_GET['receipt_id'])) {
			# code...
			$receipt_id=$_GET['receipt_id'];
		$title=$_GET['title'];
		$notes=$_GET['notes'];
		$price=$_GET['price'];
	
			$result=mysqli_query($conn,"UPDATE `receipts` SET `title` = '$title',`notes` = '$notes', `price` = '$price' WHERE `expenses`.`id` = '$expense_id'");

        $result= mysqli_query($conn,"SELECT * FROM `receipts` WHERE id='$receipt_id'");
		$res=mysqli_fetch_array($result);

			$information = array("access"=>'1',"id"=>$res["id"] ,"title"=>$res["title"],"notes"=>$res["notes"], "price"=>$res["price"] , "date_added"=>$res["date_added"]);	
					echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		}
		else{
			$error= "receipt ID is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	    echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		
		}
					
	}

}
}		else{
			$error= "Access Token is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	    echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		
		}

?>
