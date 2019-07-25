 <?php


//$time = strtotime('2019-5-14 -3 years -1 months -5 days');
//echo $date = date("Y-m-d", $time);

//use Picqer\Barcode\BarcodeGeneratorJPG;
//use Picqer\Barcode\BarcodeGeneratorPNG;

include "./config.php";

$q = $_GET['q'];
switch ($q) {
    case 'new-item':
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $id     = $post['id'];
        $name   = $post['name'];
        $number = $post['number'];
        $price  = $post['price'];
        $query = "insert into items value ('$id', '$name', '$number', '$price')";
        mysqli_query($con, $query);
        if($result == 1) echo 'done';

        break;

    case 'get-items':
        //echo 'no';
        $query = "select * from items";
        $result = mysqli_query($con, $query);
        $data = [];
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($data, $row);
            }
        }
        print_r(json_encode($data));
        break;

    case 'get-exist-items':
        //echo 'no';
        $query = "select * from items";
        $result = mysqli_query($con, $query);
        $data = [];
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                if($row['number'] > 0) array_push($data, $row);
            }
        }
        print_r(json_encode($data));
        break;

    case 'delete-item':
        $id = $_GET['id'];
        $query = "delete from items where id = '$id'";
        mysqli_query($con, $query);
        echo 'done';
        break;

    case 'update-item':
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $id     = $post['id'];
        $name   = $post['name'];
        $number = $post['number'];
        $price  = $post['price'];
        $query = "update items set name= '$name', number='$number', price= '$price' where id= '$id'";
        mysqli_query($con, $query);
        echo 'done';
        break;

    case 'students-uncompleted-package':
        $query = "select * from students";
        $result = mysqli_query($con, $query);
        $data = [];
        $query1 = "select * from items";
        $result1 = mysqli_query($con, $query1);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $query2 = "select * from students_item where student_id = '$id' and free= 1";
                $result2 = mysqli_query($con, $query2);


                if(mysqli_num_rows($result2) <= mysqli_num_rows($result1)) {

                    $take = [];
                    while ($row1 = mysqli_fetch_assoc($result2)) {
                        array_push($take, $row1);
                    }
                    $row['related'] = $take;
                    array_push($data, $row);

                }
            }
        }
        print_r(json_encode($data));

        break;
    case 'add-item-to-the-package':
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $std_id     = $post['std_id'];
        $item_id    = $post['item_id'];
        $paid       = $post['paid'];
        $free       = 1;
        if ($paid) $free = 0;
        $query = "select * from students_item where student_id = '$std_id' and item_id = '$item_id'";
        $result = mysqli_query($con, $query);


         if (mysqli_num_rows($result) <= 0 || $paid) {
            $no = $post['no'];
            for($i =0 ; $i <$no; $i++) {
                $query = "select * from items where id = '$item_id'";
                $result = mysqli_query($con, $query);
                if (mysqli_num_rows($result) > 0 && mysqli_fetch_assoc($result)['number'] > 0) {
                    $query = "insert into students_item values(null, '$std_id', '$item_id', '$free', null)";
                    mysqli_query($con, $query);
                    $query = "update items set number = number -1 where id = '$item_id'";
                    mysqli_query($con, $query);
    
                    print_r(json_encode(['status' =>'done']));
                } else  print_r(json_encode(['status' =>'empty']));
            }
            
        } else {
            print_r(json_encode(['status' =>'taken']));
        }

        break;


    case 'get-items-report':
        $query = "select * from items";
        $result = mysqli_query($con, $query);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $item_id = $row['id'];
                $query1 = "select * from students_item where item_id = '$item_id' and  free = '1'";
                $result1 = mysqli_query($con, $query1);
                $row['free'] = mysqli_num_rows($result1);


                $query1 = "select * from students_item where item_id = '$item_id' and  free = '0'";
                $result1 = mysqli_query($con, $query1);
                $row['paid'] = mysqli_num_rows($result1);
                array_push($data, $row);
            }
        }
        print_r(json_encode($data));
        break;

    case 'get-items-history':
        $query = "select * from items";
        $result = mysqli_query($con, $query);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            $start  = $_GET['start'];
            $end    = $_GET['end'];
            while ($row = mysqli_fetch_assoc($result)) {
                $item_id = $row['id'];
                $query1  = "select * from students_item where item_id = '$item_id'";
                $result1 = mysqli_query($con, $query1);
                if (mysqli_num_rows($result1) > 0) {
                    $newItem = [];
                    $newItem['id']   = $item_id;
                    $newItem['name'] = $row['name'];
                    $newItem['free'] = 0;
                    $newItem['paid'] = 0;
                    $newItem['price'] = $row['price'];


                    while ($row1 = mysqli_fetch_assoc($result1)) {

                        /*echo "Current item : ".$row1['datetime']."<br>";
                        echo "start : ".$start."<br>";
                        echo "end : ".$end."<br>";*/
                        $datetime   = strtotime($row1['datetime']);
                        $start_date = strtotime($start);
                        $end_date   = strtotime($end);
                        $diff_start = floor((($datetime - $start_date)/60/60/24));
                        $diff_end = floor((($end_date - $datetime)/60/60/24));
                        //echo $diff_start.'<br>';
                        //echo $diff_end.'<br><br>';

                        if ($diff_start >= 0 && $diff_end >= 0) {
                            if ($row1['free'] == 1) $newItem['free'] ++;
                            else $newItem['paid'] ++;
                        }

                    }
                    if ($newItem['paid'] !=0 || $newItem['free'] !=0) array_push($data, $newItem);

                }
            }
        }

        print_r(json_encode($data));

        break;


    case 'login':
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $name       = $post['name'];
        $password   = $post['password'];

        $query = "select * from accounts where name = '$name' and password ='$password'";
        $result = mysqli_query($con, $query);
        $response = ['login' => 'no'];
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $response['login'] = 'ok';
        }

        print_r(json_encode($response));
        break;




    case 'update-account':
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $id       = $post['id'];
        $name       = $post['name'];
        $password   = $post['password'];

        $query = "update accounts set name = '$name', password ='$password' where id = '$id'";
        $result = mysqli_query($con, $query);
        if ($result == 1) echo 'done';
        else echo"error";
        break;


    case 'delete-account':
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $id       = $post['id'];
        $query = "delete from accounts where id = '$id'";
        $result = mysqli_query($con, $query);
        if ($result == 1) echo 'done';
        else echo"error";
        break;

    case 'get-accounts':
        $query = "select * from accounts";
        $result = mysqli_query($con, $query);
        $data = [];
        if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($data, $row);
            }
        }
        print_r(json_encode($data));
        break;


    /* For Accounting App */

    // for student
    case 'add-student':
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $id             = $post['id'];
        $name           = $post['name'];
        $birthday       = $post['birthday'];
        $class          = $post['class'];
        $files          = $post['files'];
        $postpone       = $post['postpone'];
        $pic            = $post['pic'];
        $eao_father     = $post['eao_father'];
        $eao_mother     = $post['eao_mother'];
        $from_school    = $post['from_school'];
        $closest_point  = $post['closest_point'];
        $fathers_phone  = $post['fathers_phone'];
        $mothers_phone  = $post['mothers_phone'];
        $related  = $post['related'];
        $related_phone  = $post['related_phone'];
        $avenu  = $post['avenu'];
        $avenu_no  = $post['avenu_no'];
        $house_no  = $post['house_no'];
        $class_name  = $post['class_name'];
        $fathers_job  = $post['fathers_job'];
        $mothers_job  = $post['mothers_job'];
        $total_postpone  = $post['total_postpone'];
        $register_date  = $post['register_date'];
        $note1  = $post['note1'];
        $note2  = $post['note2'];
        
        $query = "insert into students values('$id', '$name', '$birthday',
                    '$class', '$files', '$postpone', '$pic',
                     '$eao_father', '$eao_mother', '$from_school', '$closest_point', 
                     '$fathers_phone', '$mothers_phone','$related','$related_phone','$avenu','$avenu_no','$house_no','$class_name','$fathers_job','$mothers_job','$total_postpone','$register_date','$note1','$note2')";
        $result = mysqli_query($con, $query);
        if ($result == 1) echo 'done';
        else echo"error";
        break;



    case 'update-student':
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $id             = $post['id'];
        $name           = $post['name'];
        $birthday       = $post['birthday'];
        $class          = $post['class'];
        $files          = $post['files'];
        $postpone       = $post['postpone'];
        $pic            = $post['pic'];
        $eao_father     = $post['eao_father'];
        $eao_mother     = $post['eao_mother'];
        $from_school    = $post['from_school'];
        $closest_point  = $post['closest_point'];
        $fathers_phone  = $post['fathers_phone'];
        $mothers_phone  = $post['mothers_phone'];
        $related  = $post['related'];
        $related_phone  = $post['related_phone'];
        $avenu  = $post['avenu'];
        $avenu_no  = $post['avenu_no'];
        $house_no  = $post['house_no'];
        $class_name  = $post['class_name'];
        $fathers_job  = $post['fathers_job'];
        $mothers_job  = $post['mothers_job'];
        $total_postpone  = $post['total_postpone'];
        $register_date  = $post['register_date'];
        $note1  = $post['note1'];
        $note2  = $post['note2'];


        $query = "update students set  name = '$name', birthday ='$birthday',
                    class = '$class', files = '$files', postpone = '$postpone', pic = '$pic',
                    eao_father = '$eao_father', eao_mother = '$eao_mother', from_school = '$from_school',
                     closest_point = '$closest_point', fathers_phone = '$fathers_phone', 
                     mothers_phone = '$mothers_phone', related = '$related', related_phone = '$related_phone', avenu = '$avenu', avenu_no = '$avenu_no', house_no = '$house_no', class_name = '$class_name', fathers_job = '$fathers_job', mothers_job = '$mothers_job',total_postpone = '$total_postpone' 
                     ,register_date = '$register_date' ,note1 = '$note1' ,note2 = '$note2' 
                    where id = '$id'";
        $result = mysqli_query($con, $query);
        if ($result == 1) echo 'done';
                else echo"error";

        break;


    case 'delete-student':
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $id         = $post['id'];
        $query = "delete from students where id = '$id'";
        $result = mysqli_query($con, $query);
        if ($result == 1) echo 'done';
        break;

    case 'get-students':
        $query = "select * from students ";

        $result = mysqli_query($con, $query);

        $data = [];
        $newdata = [];
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                                $information=array();
                                $id=$row["id"];
                $query2 = "select * from payments where student_id = '$id'";
                $result2 = mysqli_query($con, $query2);
                  while ($res2=mysqli_fetch_assoc($result2)) {
                        # code...
                        array_push($information, $res2);
                    }

                $row += array('payment_information' => $information );

                array_push($data, $row);
            }
        }
        print_r(json_encode($data));
        break;




                $start  = $_GET['start'];
            $end    = $_GET['end'];


        echo json_encode($information,JSON_PRETTY_PRINT)."\n";
        
        break;






    // for employee
    case 'add-employee':
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $name       = $post['name'];
        $birthday   = $post['birthday'];
        $salary     = '0';
        $pic        = $post['pic'];
        $achievement        = $post['achievement'];
        $collage        = $post['collage'];
        $institute       = $post['institute'];
        $other         = $post['other'];
        $department        = $post['department'];
        $phones        = $post['phones'];
        $address        = $post['address'];
        $closest_point       = $post['closest_point'];
        $marital_status        = $post['marital_status'];
        $experience        = $post['experience'];
        $workedIn        = $post['workedIn'];


        $phone2        = $post['phone2'];
        $locality        = $post['locality'];
        $alley       = $post['alley'];
        $house        = $post['house'];
        $partner_name        = $post['partner_name'];
        $partner_employee        = $post['partner_employee'];
        $partner_worker        = $post['partner_worker'];
        $partner_phone        = $post['partner_phone'];

        $query = "insert into employees values(null,'$name', '$birthday',  '$salary',
                    '$achievement','$collage',  '$institute', '$other', '$department',
                     '$phones', '$address', '$closest_point', '$marital_status', '$experience', 
                     '$workedIn', '$pic', '$phone2', '$locality', 
                     '$alley', '$house', '$partner_name', '$partner_employee', 
                     '$partner_worker', '$partner_phone')";
        $result = mysqli_query($con, $query);
        if ($result == 1) echo 'done';      
          else echo"error";

        break;



    case 'update-employee':
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $name       = $post['name'];
        $birthday   = $post['birthday'];
        $salary     = $post['salary'];
        $pic        = $post['pic'];
        $achievement        = $post['achievement'];
        $collage        = $post['collage'];
        $institute       = $post['institute'];
        $other         = $post['other'];
        $department        = $post['department'];
        $phones        = $post['phones'];
        $address        = $post['address'];
        $closest_point       = $post['closest_point'];
        $marital_status        = $post['marital_status'];
        $experience        = $post['experience'];
        $workedIn        = 0;



        $phone2        = $post['phone2'];
        $locality        = $post['locality'];
        $alley       = $post['alley'];
        $house        = $post['house'];
        $partner_name        = $post['partner_name'];
        $partner_employee        = $post['partner_employee'];
        $partner_worker        = $post['partner_worker'];
        $partner_phone        = $post['partner_phone'];
        $query = "update employees set name = '$name', birthday ='$birthday',
        achievement = '$achievement', salary = '$salary', pic = '$pic'
        , collage = '$collage', institute = '$institute', other = '$other'
        , other = '$other', department = '$department', phones = '$phones'
        , address = '$address', closest_point = '$closest_point', marital_status = '$marital_status'
        , experience = '$experience', workedIn = '$workedIn'
        , phone2 = '$phone2', locality = '$locality'
        , alley = '$alley', house = '$house'
        , partner_name = '$partner_name', partner_employee = '$partner_employee'
        , partner_worker = '$partner_worker', partner_phone = '$partner_phone'
         where id = '$id'";
        $result = mysqli_query($con, $query);
        if ($result == 1) echo 'done';
                else echo"error";

        break;



    // for employee
    case 'add-school':
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $employee_id         = $post['employee_id'];
        $name       = $post['name'];
        $date   = $post['date'];
        $special        = $post['special'];
      

        $query = "insert into schools (`name`,`date`,`employee_id`,`special`) values('$name', '$date',  '$employee_id',
                    '$special')";
        $result = mysqli_query($con, $query);
        if ($result == 1) echo 'done';      
          else echo"error";

        break;



    case 'update-school':
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $id       = $post['id'];
        $name       = $post['name'];
        $date   = $post['date'];
        $special        = $post['special'];
      

        $query = "update schools set name = '$name', date ='$date',special = '$special'
         where id = '$id'";
        $result = mysqli_query($con, $query);
        if ($result == 1) echo 'done';
                else echo"error";

        break;



    case 'delete-employee':
        
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $id         = $post['id'];
        $query = "delete from employees where id = '$id'";
        $result = mysqli_query($con, $query);
        if ($result == 1) echo 'done';
        break;


    case 'get-employee':
        $query = "select * from employees";
        $result = mysqli_query($con, $query);
        $data = [];
                $newdata = [];

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $information=array();
                $id=$row["id"];
                $query2 = "select * from schools where employee_id= '$id'";
                $result2 = mysqli_query($con, $query2);
                  while ($res2=mysqli_fetch_assoc($result2)) {
                        # code...
                        array_push($information, $res2);
                    }             
                     $row += array('schools_information' => $information );
                $information2=array();
            $query3 = "select * from salary where employee_id= '$id' ORDER by date DESC LIMIT 1";
            $result3 = mysqli_query($con, $query3);
                while ($res3 = mysqli_fetch_assoc($result3)) {
                        array_push($information2, $res3);
                }
                  $row += array('salary_information' => $information2 );
            
                array_push($data, $row);
            }

        }
        print_r(json_encode($data));
        break;

    case 'get-id':
        require './vendor/autoload.php';
        $id = rand(1000, 9999).rand(1000, 9999).rand(1000, 9999);
        $query = "select * from items where id = '$id'";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0)  $id = rand(1000, 9999).rand(1000, 9999).rand(1000, 9999);

        $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
        $file = fopen('barcode.jpg', 'w');
        fwrite($file, $generator->getBarcode($id, $generator::TYPE_CODE_128));
        fclose($file);
        echo $id;

        break;

    case 'print-barcode':
        require './vendor/autoload.php';
        $id = $_GET['id'];
        $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
        $file = fopen('barcode.jpg', 'w');
        fwrite($file, $generator->getBarcode($id, $generator::TYPE_CODE_128));
        fclose($file);
        break;


    case 'upload-file':
        if (isset($_POST['upload'])) {
            $dir                = 'uploads/';

            $file_uploaded      = $_FILES['file']['name'];
            $file_dir           = $dir.$file_uploaded;
            move_uploaded_file($_FILES['file']['tmp_name'], $file_dir);
            echo $file_dir;
        }
        //echo $file_dir;
        break;


        /* for payment */
    case 'add-payment':
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $student_id     = $post['student_id'];
        $amount         = $post['amount'];
        $query = "insert into payments values(null, '$student_id', '$amount',null)";
        $result = mysqli_query($con, $query);
        if ($result == 1) echo 'done';
        break;

    case 'get-payments':
        header("Content-type: json/aplication; charset=utf-8");
        $query = "select * from payments";
        $result = mysqli_query($con, $query);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($data, $row);
            }

        }
        print_r(json_encode($data));
        break;
        
        case 'get-payment-id':
        $student_id = $_POST[ 'student_id' ];
        $query = "select * from payments where student_id ='".$student_id."'";
        $result = mysqli_query($con, $query);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
 
                array_push($data, $row);
            }

        }
        print_r(json_encode($data));
        break;

    case 'delete-payment':
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $id         = $post['id'];
        $query = "delete from payments where id = '$id'";
        $result = mysqli_query($con, $query);
        if ($result == 1) echo 'done';
        break;

        /* setup class for payment */
    case 'get-classes':
        $query = "select * from classes";
        $result = mysqli_query($con, $query);
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($data, $row);
            }

        }
        print_r(json_encode($data));
        break;

    case 'update-class':
        $post = json_decode(file_get_contents('php://input'),true);
        if (!isset($post) || empty($post)) return;
        $id         = $post['id'];
        $amount      = $post['amount'];
        $divided   = $post['divided'];
        $query = "update classes set amount = '$amount', divided ='$divided' where id = '$id'";
        $result = mysqli_query($con, $query);
        if ($result == 1) echo 'done';
                else echo"error";

        break;

        /* to get the report of each student payment */

    case 'payments-report':
    $information=array();
                $start  = $_GET['start'];
            $end    = $_GET['end'];
        $query = "SELECT name,class,c1.total_postpone,amount,c1.class_name FROM payments LEFT JOIN students c1 ON student_id = c1.id WHERE datetime >= '$start' AND datetime <= '$end' or datetime like '$start%' or datetime like '$end%'";
        $result = mysqli_query($con, $query);

                while ($res=mysqli_fetch_array($result)) {
                        # code...
                        array_push($information, $res);
                    }
        echo json_encode($information,JSON_PRETTY_PRINT)."\n";
        
        break;
        
        case 'pay-salary': 
            $post = json_decode(file_get_contents('php://input'),true);
            if (!isset($post) || empty($post)) return;
            $eId         = $post['employee_id'];
            $deduction1    = $post['deduction1'];
            $deduction2    = $post['deduction2'];
            $deduction3    = $post['deduction3'];
            $deduction4    = $post['deduction4'];
            $date1    = $post['date1'];
            $date2    = $post['date2'];
            $date3    = $post['date3'];
            $date4    = $post['date4'];            
            $deduction5    = $post['deduction5'];
            $deduction6    = $post['deduction6'];
            $deduction7    = $post['deduction7'];
            $date5    = $post['date5'];
            $date6    = $post['date6'];
            $date7    = $post['date7'];
            $salary    = $post['salary'];
            $salarydate    = $post['salarydate'];
            $finalsalary    = $post['finalsalary'];
            $finaldate    = $post['finaldate'];
            $name    = $post['name'];

            $write1    = $post['write1'];
            $write2    = $post['write2'];
            $write3    = $post['write3'];
            $write4    = $post['write4'];
            $write5    = $post['write5'];
            $write6    = $post['write6'];
            $write7    = $post['write7'];
            $write8    = $post['write8'];
            $write9    = $post['write9'];

                       $date= 0;
          
                        $query = "INSERT INTO `salary` 
                        (`employee_id`, `deduction1`, `date1`, `deduction2`, `date2`, `deduction3`, `date3`, `deduction4`, `date4`, `deduction5`, `date5`, `deduction6`, `date6`, `deduction7`, `date7`, `salary`, `finalsalary`, `salarydate`, `finaldate`, `name`, `write1`, `write2`, `write3`, `write4`, `write5`, `write6`, `write7`, `write8`, `write9`) 
                        VALUES 
                        ('$eId','$deduction1','$date1','$deduction2','$date2','$deduction3','$date3','$deduction4','$date4','$deduction5','$date5','$deduction6','$date6','$deduction7','$date7','$salary','$finalsalary','$salarydate','$finaldate','$name','$write1','$write2','$write3','$write4','$write5','$write6','$write7','$write8','$write9')";
            $result = mysqli_query($con, $query);
            if ($result == 1) echo 'done';
            break;


        case 'get-all-salary':
            $query = "select * from salary";
            $result = mysqli_query($con, $query);
            $data = [];
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $row['details'] = explode('#', $row['details']);
                    array_push($data, $row);
                }

            }
            print_r(json_encode($data));
            break;


        case 'update-last-salary':
        $post = json_decode(file_get_contents('php://input'),true);
            if (!isset($post) || empty($post)) return;

             $id         = $post['employee_id'];
            $deduction1    = $post['deduction1'];
            $deduction2    = $post['deduction2'];
            $deduction3    = $post['deduction3'];
            $deduction4    = $post['deduction4'];
            $date1    = $post['date1'];
            $date2    = $post['date2'];
            $date3    = $post['date3'];
            $date4    = $post['date4'];            
            $deduction5    = $post['deduction5'];
            $deduction6    = $post['deduction6'];
            $deduction7    = $post['deduction7'];
            $date5    = $post['date5'];
            $date6    = $post['date6'];
            $date7    = $post['date7'];
            $salary    = $post['salary'];
            $salarydate    = $post['salarydate'];
            $finalsalary    = $post['finalsalary'];
            $finaldate    = $post['finaldate'];
            $name    = $post['name'];

            $write1    = $post['write1'];
            $write2    = $post['write2'];
            $write3    = $post['write3'];
            $write4    = $post['write4'];
            $write5    = $post['write5'];
            $write6    = $post['write6'];
            $write7    = $post['write7'];
            $write8    = $post['write8'];
            $write9    = $post['write9'];
        $query = "UPDATE `salary` SET `deduction1` = '$deduction1', `date1` = '$date1', `deduction2` = '$deduction2', `date2` = '$date2', `deduction3` = '$deduction3', `date3` = '$date3', `deduction4` = '$deduction4', `date4` = '$date4', `deduction5` = '$deduction5', `date5` = '$date5', `deduction6` = '$deduction6', `date6` = '$date6', `deduction7` = '$deduction7', `date7` = '$date7', `salary` = '$salary', `finalsalary` = '$finalsalary', `salarydate` = '$salarydate', `finaldate` = '$finaldate', `name` = '$name', `write1` = '$write1', `write2` = '$write2', `write3` = '$write3', `write4` = '$write4', `write5` = '$write5', `write6` = '$write6', `write7` = '$write7', `write8` = '$write8', `write9` = '$write9' where `salary`.`employee_id` = '$id' ORDER by `date` DESC LIMIT 1";
        $result = mysqli_query($con, $query);
        if ($result == 1) echo 'done';
                else echo"error";

        break;

        case 'get-salary':
            $eId = $_GET['employee_id'];
            $query = "select * from salary where employee_id= '$eId' ORDER by date DESC LIMIT 1";
            $result = mysqli_query($con, $query);
            $data = [];
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $row['details'] = explode('#', $row['details']);
                    array_push($data, $row);
                }
            }
            print_r(json_encode($data));
            break;

        case 'get-salary-report':
            $start  = $_GET['start'];
            $end    = $_GET['end'];
        $query = "SELECT * FROM salary WHERE date >= '$start' AND date <= '$end' or date like '$start%' or date like '$end%'";
            $result = mysqli_query($con, $query);
            $data = [];
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($data, $row);
                }

            }
            print_r(json_encode($data));
            break;
}
?> 