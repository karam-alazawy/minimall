<?php
include 'config.php';
$action=$_GET['action'];

if (isset($_GET['action']) and $action=='login') {
	# code...
$information=array();
if (isset($_GET['username']) and isset($_GET['password'])) {
	# code...
	if ($_GET['action']=="login") {
		# code...
		$username=$_GET['username'];
		$password=$_GET['password'];
		$token = sha1(mt_rand(1, 90000) . 'karam');
		$result= mysqli_query($conn,"SELECT * FROM `user` WHERE username='$username' and password='$password'");
		if (mysqli_num_rows($result)>0) {
			# code...
			$res=mysqli_fetch_array($result);
			$information = array("access"=>'1',
				"id"=>$res["id"] ,
				"username"=>$res["username"],
				 "password"=>$res["password"] ,
				  "type"=>$res["type"] ,
				   "date_add"=>$res["date_add"],
				   "token"=>$res["token"]);
			echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		$_SESSION["id"] = $res['id'];
		$_SESSION["username"] = $res['username'];
		$_SESSION["type"] = $res['type'];
		$_SESSION["token"] = $res['token'];

		}
		else {
			$error= "Please Insert Correct Information !!";
			$information=array("access"=>'0',"error"=>$error);
	    echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		
		}

	}
	elseif ($_GET['action']=="signup") {
		# code...
		$username=$_GET['username'];
		$password=$_GET['password'];
		$result= mysqli_query($conn,"SELECT * FROM `user` WHERE username='$username'");
		if (mysqli_num_rows($result)>0) {
			# code...
			$error= "This username is already taken.";
			$information=array("access"=>'0',"error"=>$error);
	    echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		

		}
		else {
			
					$result= mysqli_query($conn,"INSERT INTO `user` ( `username`, `password`) VALUES ('$username', '$password');");
    	$last_id = $conn->insert_id;
    			$result= mysqli_query($conn,"SELECT * FROM `user` WHERE id='$last_id'");
			$res=mysqli_fetch_array($result);

			$information = array("access"=>'1',"id"=>$res["id"] ,"username"=>$res["username"], "password"=>$res["password"] , "type"=>$res["type"] , "date_add"=>$res["date_add"]);	
					echo json_encode($information,JSON_PRETTY_PRINT)."\n";
					$_SESSION["id"] = $res['id'];
		$_SESSION["username"] = $res['username'];
		$_SESSION["type"] = $res['type'];
				$_SESSION["token"] = $res['token'];


		}
	}
}
}else{
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
switch ($action) {

	case 'login':
	
		break;


	case 'addclient':
		if (!empty($_GET['reputation'])) {

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
				
					}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	}
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;





	case 'addexp':
		if (!empty($_GET['price'])) {

			# code...
		$title=$_GET['title'];
		$notes=$_GET['notes'];
		$price=$_GET['price'];
	
		$result= mysqli_query($conn,"INSERT INTO `expenses` ( `title`, `notes`, `price`) VALUES ('$title', '$notes','$price')");
    	$last_id = $conn->insert_id;
        $result= mysqli_query($conn,"SELECT * FROM `client` WHERE id='$last_id'");
		$res=mysqli_fetch_array($result);

		$information = array("access"=>'1',"id"=>$res["id"] ,"price"=>$res["price"],"notes"=>$res["notes"] , "date_added"=>$res["date_added"]);	
				
					}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	}
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;




	case 'editclient':
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
		}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	}
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;



	case 'search_for_client':
		if (isset($_GET['client_name']) and !empty($_GET['client_name'])) {
			# code...
			$client_name=$_GET['client_name'];
		
        $result= mysqli_query($conn,"SELECT * FROM `client` WHERE name like '%$client_name%'");

         $information = array("access"=>'1');	

					while ($res=mysqli_fetch_array($result)) {
						# code...
						array_push($information, $res);
					}
		}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	         }
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;




	case 'get_client':
		if (isset($_GET['client_id']) and !empty($_GET['client_id'])) {
			# code...
			$client_id=$_GET['client_id'];
		
        $result= mysqli_query($conn,"SELECT * FROM `client` WHERE id='$client_id'");

         $information = array("access"=>'1');	

					while ($res=mysqli_fetch_array($result)) {
						# code...
						array_push($information, $res);
					}
		}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	         }
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;

	

	case 'deleteclient':
		if (isset($_GET['client_id'])) {
			# code...
			$client_id=$_GET['client_id'];
			
			$result=mysqli_query($conn, "DELETE FROM client WHERE id='".$client_id."'");

       

		$information = array("access"=>'1');	
					echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	}
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;



	case 'addbill':
		$amount=$_GET['amount'];
		$shipping=$_GET['shipping'];
		$commission=$_GET['commission'];
		$extra_tax=$_GET['extra_tax'];
		$amount_paid=$_GET['amount_paid'];
		$continue=$_GET['continue'];
		$client_id=$_GET['client_id'];
		$total_amount=$shipping+$extra_tax+$amount;
		# code...
		if (isset($amount) and isset($client_id) and isset($amount_paid) and isset($continue) and !empty($client_id) ) {
		# code...
			$result= mysqli_query($conn,"INSERT INTO `bill` ( `amount`, `shipping`, `commission`,`extra_tax`,`amount_paid`,`continue`,`client_id`,`total_amount`) VALUES ('$amount', '$shipping','$commission','$extra_tax','$amount_paid','$continue','$client_id','$total_amount')");
			$lastid = mysqli_insert_id($conn); 
		$information = array("access"=>'1',"id"=>$lastid);	
	}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	}
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;


	case 'update_balance':
		$balance=$_GET['balance'];
		$client_id=$_GET['client_id'];
		# code...
		if (isset($balance) and isset($client_id) and !empty($client_id) ) {
		# code...
			$result= mysqli_query($conn,"UPDATE `client` SET `balance` = '$balance' WHERE `client`.`id` = $client_id");
		$information = array("access"=>'1');
	}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	}
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;







	case 'get_balance':
		$client_id=$_GET['client_id'];
		# code...
		if (isset($client_id) and !empty($client_id) ) {
		# code...
        $result= mysqli_query($conn,"SELECT * FROM `client` WHERE id='$client_id'");
        			$res=mysqli_fetch_array($result);
		$information = array("access"=>'1',"balance"=>$res["balance"]);	

	}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	}
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;





	//update bill
	case 'update_bill':
	$amount=$_GET['amount'];
		$shipping=$_GET['shipping'];
		$commission=$_GET['commission'];
		$extra_tax=$_GET['extra_tax'];
		$amount_paid=$_GET['amount_paid'];
		$continue=$_GET['continue'];
		$bill_id=$_GET['bill_id'];
				$total_amount=$shipping+$extra_tax+$amount;

		# code...
		if (isset($amount) and isset($bill_id) and isset($amount_paid) and isset($continue) and !empty($bill_id) ) {
		# code...
			$result= mysqli_query($conn,"UPDATE `bill` SET `amount` = '$amount', `shipping` = '$shipping', `commission` = '$commission', `extra_tax` = '$extra_tax', `amount_paid` = '$amount_paid', `continue` = '$continue', `total_amount` = '$total_amount' WHERE `bill`.`id` = $bill_id");
		$information = array("access"=>'1');	
	}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	}
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;


	//delete bill
	case 'delete_bill':

		$bill_id=$_GET['bill_id'];
		# code...
		if (isset($bill_id) and !empty($bill_id)) {
		# code...
			$result=mysqli_query($conn, "DELETE FROM bill WHERE id='".$bill_id."'");
		$information = array("access"=>'1');	
	}else{
			$error= "Id is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	}
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;


	case 'get_bill':
		if (isset($_GET['bill_id']) and !empty($_GET['bill_id'])) {
			# code...
			$bill_id=$_GET['bill_id'];
		
        $result= mysqli_query($conn,"SELECT * FROM `bill` WHERE id='$bill_id'");

         $information = array("access"=>'1');	

					while ($res=mysqli_fetch_array($result)) {
						# code...
						array_push($information, $res);
					}
		}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	         }
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;

	


	//add receipt
	case 'add_receipt':
		$client_id=$_GET['client_id'];
		$title=$_GET['title'];
		$price=$_GET['price'];
		$type=$_GET['type'];
		$notes=$_GET['notes'];
		# code...
		if (isset($client_id) and !empty($client_id) and isset($title) and !empty($title) and isset($price) and isset($type)) {
		# code...
			$result= mysqli_query($conn,"INSERT INTO `client_receipts` (`client_id`, `title`, `price`, `type`, `notes`) VALUES ('$client_id', '$title', '$price', '$type', '$notes')");
			$last_id = $conn->insert_id;
			$result= mysqli_query($conn,"SELECT * FROM `client_receipts` WHERE id='$last_id'");
			$res=mysqli_fetch_array($result);
		$information = array("access"=>'1',"id" =>$res['id']);	
	}else{
			$error= "information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	}
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;


	//update bill
	case 'update_receipt':
		$price=$_GET['price'];
		$notes=$_GET['notes'];
		$id=$_GET['id'];
		# code...
		if (isset($id) and isset($price) and !empty($id) ) {
		# code...
			$result= mysqli_query($conn,"UPDATE `client_receipts` SET `price` = '$price', `notes` = '$notes' WHERE  `id` = $id");
		$information = array("access"=>'1');	
	}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	}
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;


	//delete receipt
	case 'delete_receipt':
		$receipt_id=$_GET['receipt_id'];
		# code...
		if (isset($receipt_id) and !empty($receipt_id)) {
		# code...
			$result=mysqli_query($conn, "DELETE FROM client_receipts WHERE id='".$receipt_id."'");
		$information = array("access"=>'1');	
	}else{
			$error= "Id is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	}
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;


	//add item
	case 'add_item':
		$bill_id=$_GET['bill_id'];
		$url=$_GET['url'];
		$notes=$_GET['notes'];
		$quantity=$_GET['quantity'];
		# code...
		if (isset($bill_id)) {
		# code...
			$result= mysqli_query($conn,"INSERT INTO `items` (`bill_id`, `url`, `notes`, `quantity`) VALUES ('$bill_id', '$url', '$notes', '$quantity')");
		$information = array("access"=>'1');	
	}else{
			$error= "information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	}
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;


	//get item for bill
	case 'get_items':
		$bill_id=$_GET['bill_id'];
		# code...
		if (isset($bill_id) and !empty($bill_id)) {
			# code... 
			$result= mysqli_query($conn,"SELECT * FROM items WHERE bill_id=$bill_id");
				        $information = array("access"=>'1');	

					while ($res=mysqli_fetch_array($result)) {
						# code...
						array_push($information, $res);
					}
		}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	         }
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;

//get item for bill
	case 'delete_items':
		$bill_id=$_GET['bill_id'];
		# code...
		if (isset($bill_id) and !empty($bill_id)) {
			# code... 
			$result= mysqli_query($conn,"DELETE FROM items WHERE bill_id=$bill_id");
				        $information = array("access"=>'1');	

					while ($res=mysqli_fetch_array($result)) {
						# code...
						array_push($information, $res);
					}
		}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	         }
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;


		//return number of bill + 1
	case 'get_num_bills':
		# code...
	        $result= mysqli_query($conn,"SELECT id FROM bill");
	        $num=mysqli_num_rows($result);
	        $information = array("access"=>'1',"number"=>$num+1);	
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	


		break;
		//return bills of client by id
		case 'get_client_bills':
		# code...
		$client_id=$_GET['client_id'];
		if (isset($client_id) and !empty($client_id)) {
			# code... 
			$result= mysqli_query($conn,"SELECT * FROM bill WHERE client_id=$client_id");
				        $information = array("access"=>'1');	

					while ($res=mysqli_fetch_array($result)) {
						# code...
						array_push($information, $res);
					}
		}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	         }
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;

		case 'get_client_receipts':
		# code...
		$client_id=$_GET['client_id'];
		if (isset($client_id) and !empty($client_id)) {
			# code... 
			$information2=array();
			$result= mysqli_query($conn,"SELECT id,commission,`date_added`,client_id,total_amount,type,amount_paid FROM bill WHERE bill.client_id=$client_id UNION SELECT id,commission,`date_added`,client_id,price,type,0 FROM client_receipts WHERE client_receipts.client_id=$client_id ORDER by date_added");
				        $information = array("access"=>'1');	
					while ($res=mysqli_fetch_array($result)) {
						# code...
					$result2= mysqli_query($conn,"SELECT * FROM client WHERE client.id=$client_id");
					while ($res2=mysqli_fetch_array($result2)) {
						   array_push($information2, $res2);
					}
					$res += array('client_information' => $information2 );
						array_push($information, $res);
					}
		}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	         }
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;



case 'get_receipt_info':
		# code...
		$id=$_GET['id'];
		if (isset($id) and !empty($id)) {
			# code... 
			$information2=array();
			$result= mysqli_query($conn,"SELECT * FROM client_receipts WHERE id=$id");
				        $information = array("access"=>'1');	
					while ($res=mysqli_fetch_array($result)) {
						# code...
						array_push($information, $res);
					}
		}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	         }
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;



		//return info of client by name
		case 'get_client_info':
		# code...
		$client_name=$_GET['client_name'];
		if (isset($client_name) and !empty($client_name)) {
			# code... 
			$result= mysqli_query($conn,"SELECT * FROM `client` WHERE name LIKE '%$client_name%'");
				        $information = array("access"=>'1');	

					while ($res=mysqli_fetch_array($result)) {
						# code...
						array_push($information, $res);
					}
		}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	         }
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;


 		case 'get-reports':
    	$information=array();
            $start  = $_GET['start'];
            $end    = $_GET['end'];
       if (isset($start) and !empty($start) and isset($end) and !empty($end)) {
        $query ="SELECT * FROM client LEFT JOIN bill c1 ON client.id = c1.client_id WHERE c1.date_added >= '$start' AND c1.date_added <= '$end' or c1.date_added like '$start%' or c1.date_added like '$end%' ORDER by c1.date_added desc" ;
        $result = mysqli_query($conn, $query);
                while ($res=mysqli_fetch_array($result)) {
                        # code...
                        array_push($information, $res);
                    }
                }
                    else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	         }
        echo json_encode($information,JSON_PRETTY_PRINT)."\n";
        break;



 		case 'get-debt':
    	$information=array();
        $all_debt=0;
        $query ="SELECT balance FROM client" ;
        $result = mysqli_query($conn, $query);
                while ($res=mysqli_fetch_array($result)) {
                        # code...
                	 	$all_debt+=intval($res['balance']);
                    }
                
         $information=array("access"=>'1',"debt"=>$all_debt);    
        echo json_encode($information,JSON_PRETTY_PRINT)."\n";
        break;


 		case 'get-exp-reports':
    	$information=array();
            $start  = $_GET['start'];
            $end    = $_GET['end'];
       if (isset($start) and !empty($start) and isset($end) and !empty($end)) {
        $query ="SELECT * FROM expenses WHERE date_added >= '$start' AND date_added <= '$end' or date_added like '$start%' or date_added like '$end%'";
        $result = mysqli_query($conn, $query);
                while ($res=mysqli_fetch_array($result)) {
                        # code...
                        array_push($information, $res);
                    }
                }
                    else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	         }
        echo json_encode($information,JSON_PRETTY_PRINT)."\n";
        break;

		//add facebook client
		case 'add_facebook_client':
		# code...
		$name=$_GET['name'];
		$address=$_GET['address'];
		$email=$_GET['email'];
		$phone=$_GET['phone'];
		$reputation=$_GET['reputation'];
		$balance=$_GET['balance'];	
			if (isset($name) and !empty($name)) {
			# code... 
		$result= mysqli_query($conn,"INSERT INTO `facebook_client` ( `name`, `address`, `email`, `phone`, `reputation`, `balance`) VALUES ('$name', '$address','$email', '$phone', '$reputation', '$balance')");
				        $information = array("access"=>'1');		
		}else{
			$error= "Some information is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	         }
		echo json_encode($information,JSON_PRETTY_PRINT)."\n";	
		break;
	
}	
}
		else{
			$error= "Access Token is Required !!";
			$information=array("access"=>'0',"error"=>$error);
	    echo json_encode($information,JSON_PRETTY_PRINT)."\n";
		
		}
	}
?>