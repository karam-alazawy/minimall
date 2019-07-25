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
	
	if ($_GET['action']=="addclient" and !empty($_GET['reputation'])) {
		# code...
		$name=$_GET['name'];
		$address=$_GET['address'];
		$email=$_GET['email'];
		$phone=$_GET['phone'];
		$reputation=$_GET['reputation'];
		$balance=$_GET['balance'];
	
		$result= mysqli_query($conn,"INSERT INTO `client` ( `name`, `address`, `email`, `phone`, `reputation`, `balance`) VALUES ('$name', '$address','$email', '$phone', '$reputation', '$balance')");
    	$last_id = $conn->insert_id;
        $result= mysqli_query($conn,"SELECT * FROM `client` WHERE id='$last_id'");
		$res=mysqli_fetch_array($result);

		$information = array("access"=>'1',"id"=>$res["id"] ,"name"=>$res["name"],"email"=>$res["email"], "address"=>$res["address"] , "phone"=>$res["phone"], "reputation"=>$res["reputation"], "balance"=>$res["balance"] , "date_add"=>$res["date_added"]);	
					echo json_encode($information,JSON_PRETTY_PRINT)."\n";
					
	}
		elseif ($_GET['action']=="editclient" and !empty($_GET['reputation'])) {
		# code...
		if (isset($_GET['client_id'])) {
			# code...
			$client_id=$_GET['client_id'];
			$name=$_GET['name'];
					$email=$_GET['email'];
		$address=$_GET['address'];
		$phone=$_GET['phone'];
		$reputation=$_GET['reputation'];
		$balance=$_GET['balance'];
			$result=mysqli_query($conn,"UPDATE `client` SET `name` = '$name',`email` = '$email', `address` = '$address', `phone` = '$phone', `reputation` = '$reputation', `balance` = '$balance' WHERE `client`.`id` = '$client_id'");

        $result= mysqli_query($conn,"SELECT * FROM `client` WHERE id='$client_id'");
		$res=mysqli_fetch_array($result);

		$information = array("access"=>'1',"id"=>$res["id"] ,"name"=>$res["name"],"email"=>$res["email"], "address"=>$res["address"] , "phone"=>$res["phone"], "reputation"=>$res["reputation"], "balance"=>$res["balance"] , "date_add"=>$res["date_added"]);	
					echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		}
		else{
			$error= "Client ID is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	    echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		
		}
					
	}

		elseif ($_GET['action']=="deleteclient") {
		# code...
		if (isset($_GET['client_id'])) {
			# code...
			$client_id=$_GET['client_id'];
			
			$result=mysqli_query($conn, "DELETE FROM client WHERE id='".$client_id."'");

       

		$information = array("access"=>'1');	
					echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		}
		else{
			$error= "Client ID is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	    echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		
		}
					
	}

			elseif ($_GET['action']=="showclient") {
		# code...
		if (isset($_GET['client_id'])) {
			# code...
			$client_id=$_GET['client_id'];
			
			$result=mysqli_query($conn, "SELECT * FROM client WHERE id='".$client_id."'");
					$res=mysqli_fetch_array($result);

$information = array("access"=>'1',"id"=>$res["id"] ,"name"=>$res["name"],"email"=>$res["email"], "address"=>$res["address"] , "phone"=>$res["phone"], "reputation"=>$res["reputation"], "balance"=>$res["balance"] , "date_add"=>$res["date_added"]);	
					echo json_encode($information,JSON_PRETTY_PRINT)."\n";
       

		}
		else{
			$error= "Client ID is Required !!";
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
