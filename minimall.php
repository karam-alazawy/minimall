<?php
include 'config.php';
if (!isset($_SESSION['token'])) {
    # code...
        echo '<script type="text/javascript">window.location.href = "login.php";</script>';

}
//background: linear-gradient(135deg, #7b4397 , #dc2430);

?>
<!DOCTYPE html>

<html style="height: 100%;">

    <link href="assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
                <link type="text/css" href="assets/css/bootstrap-timepicker.min.css" />

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>MiniMall</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Header-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a data-bs-hover-animate="pulse" style="font-size: 35px;margin: 0px 20px 0px 10px;color: #20a1ab;" class="far fa-arrow-alt-circle-left" href="index.php"></a>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                      <a class="btn btn-light action-button" role="button" data-bs-hover-animate="pulse" href="logout.php">Log Out</a></div>
                </div>
            </nav>

<body style="    background: linear-gradient(135deg, #172a74, #21a9af);
 height: 100%;">
     <div class="features-boxed" style="background: linear-gradient(135deg, #172a74, #21a9af);height: 100%;">
        <div class="container" style="direction: rtl;">
            <div class="intro">
                <h2 class="text-center" style="    color: white;">MiniMall</h2>
            </div>
            <div class="row justify-content-center features">
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <a data-toggle="modal" data-target="#exampleModal" class="learn-more" style="color: initial;text-decoration: initial;">
                        <div data-bs-hover-animate="pulse" class="box"><i class="fa ion-person-add bounce animated icon"></i>
                            <h3  class="name">الزبائن</h3>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <a href="minimall.php" data-toggle="modal" data-target="#exampleModa13"  class="learn-more" style="color: initial;text-decoration: initial;">
                        <div data-bs-hover-animate="pulse" class="box"><i class="fas fa-money-bill-wave bounce animated icon"></i>
                            <h3 class="name">وصولات الشراء</h3></div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <a data-toggle="modal" data-target="#exampleModa11" href="master.php" class="learn-more" style="color: initial;text-decoration: initial;">
                        <div data-bs-hover-animate="pulse" class="box"><i class="fas fa-pencil-alt bounce animated icon"></i>
                            <h3 class="name">التقارير</h3>
                        </div>
                    </a>
                </div>


                  <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <a data-toggle="modal" data-target="#exampleModa17" href="master.php" class="learn-more" style="color: initial;text-decoration: initial;">
                        <div data-bs-hover-animate="pulse" class="box"><i class="fab fa-wpforms bounce animated icon"></i>
                            <h3 class="name">المصروفات</h3>
                        </div>
                    </a>
                </div>



              <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <a data-toggle="modal" data-target="#exampleModa22" href="master.php" class="learn-more" style="color: initial;text-decoration: initial;">
                        <div data-bs-hover-animate="pulse" class="box"><i class="fas fa-print bounce animated icon"></i>
                            <h3 class="name">طباعة</h3>
                        </div>
                    </a>
                </div>
                

                
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>

</html>

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModa13" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
        <div class="row">
  <div class="col-6" style="text-align: right; margin-left: auto;
    margin-right: auto;">
    <div class="list-group" ><a  href="addclient.php">
      <a  data-toggle="modal" data-target="#exampleModa2"  class="list-group-item list-group-item-action " id="list-home-list"  aria-controls="home">اضافة وصل  شراء</a></a>
      <a  data-toggle="modal" data-target="#exampleModa14"  class="list-group-item list-group-item-action " id="list-home-list"  aria-controls="home">استعراض وتعديل  وصولات الشراء </a></a>


    </div>
  </div>
 
</div>      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
        <div class="row">
  <div class="col-6" style="text-align: right; margin-left: auto;
    margin-right: auto;">
    <div class="list-group" ><a  href="addclient.php">
      <a href="addclient.php" class="list-group-item list-group-item-action " id="list-home-list"  aria-controls="home">اضافة زبون</a></a>    
      <a  data-toggle="modal" data-target="#exampleModa7"  class="list-group-item list-group-item-action " id="list-home-list"  aria-controls="home">وصل استلام وقبض </a></a>
      <a  data-toggle="modal" data-target="#exampleModa9"  class="list-group-item list-group-item-action " id="list-home-list"  aria-controls="home">وصل  قبض </a></a>
      <a  data-toggle="modal" data-target="#exampleModa4"   class="list-group-item list-group-item-action" id="list-profile-list" href="#list-profile" role="tab" aria-controls="profile">كشف حساب</a>

    </div>
  </div>
 
</div>      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search for Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
            <div  class="form-group text-center" style="float: right;width: 327px;"><input id='name' class="form-control d-xl-flex align-items-xl-start" type="text"  name="text" placeholder="اسم الزبون" data-bs-hover-animate="pulse" style="    direction: rtl; text-align: right; width: 290px;filter: blur(0px);"></div>
            <div class="form-group" style="width: 100px;"><button onclick="search()" class="btn btn-primary btn-block" onsubmit="event.preventDefault()" data-toggle="modal" data-target="#exampleModa3"  type="submit" data-bs-hover-animate="pulse">Search</button></div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModa3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
           <table class="table" style="direction: rtl; text-align: right;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">الاسم</th>
      <th scope="col">رقم الهاتف</th>
      <th scope="col">اختيار</th>
    </tr>
  </thead>
  <tbody class="table-body-1">

    
  </tbody>
</table>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="exampleModa4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search for Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
            <div  class="form-group text-center" style="float: right;width: 327px;"><input id='name2' class="form-control d-xl-flex align-items-xl-start" type="text"  name="text" placeholder="اسم الزبون"  data-bs-hover-animate="pulse" style="    direction: rtl;
          text-align: right; width: 290px;filter: blur(0px);"></div>
            <div class="form-group" style="width: 100px;"><button onclick="search2()" class="btn btn-primary btn-block" onsubmit="event.preventDefault()" data-toggle="modal" data-target="#exampleModa5"  type="submit" data-bs-hover-animate="pulse">Search</button></div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModa5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
           <table class="table" style="direction: rtl; text-align: right;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">الاسم</th>
      <th scope="col">رقم الهاتف</th>
      <th scope="col">اختيار</th>
    </tr>
  </thead>
  <tbody class="table-body-2">
    
    
  </tbody>
</table>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<!-- Modal -->
<div class="modal fade" id="exampleModa6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="max-width: 1220px;" class="modal-dialog" role="document">
    <div style="width: 1220px;" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">كشف حساب</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
        <table class="table tablekashf" style="direction: rtl; text-align: right;">
  <thead>
    <tr>
      <th scope="col">الاسم</th>
      <th scope="col">رقم الهاتف</th>
      <th scope="col">نوع الوصل</th>
      <th scope="col">مبلغ الوصل</th>
      <th scope="col">العمولة</th>
      <th scope="col">مبلغ المسدد</th>
      <th scope="col">الديون </th>
      <th scope="col">تاريخ الوصل </th>
      <th scope="col">رقم الوصل  </th>
      <th scope="col"> اختيار </th>
    </tr>
  </thead>
  <tbody class="table-body-7">
    
    
  </tbody>
</table>
<button onclick="export_excel('tablekashf')" data-bs-hover-animate="pulse" type="button" class="btn btn-light">استخراج اكسل</button>

         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="exampleModa7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search for Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
            <div  class="form-group text-center" style="float: right;width: 327px;"><input id='name3' class="form-control d-xl-flex align-items-xl-start" type="text"  name="text" placeholder="اسم الزبون"  data-bs-hover-animate="pulse" style="    direction: rtl;
              text-align: right; width: 290px;filter: blur(0px);"></div>
            <div class="form-group" style="width: 100px;"><button onclick="search3()" class="btn btn-primary btn-block" onsubmit="event.preventDefault()" data-toggle="modal" data-target="#exampleModa8"  type="submit" data-bs-hover-animate="pulse">Search</button></div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModa8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Clients</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
           <table class="table" style="direction: rtl; text-align: right;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">الاسم</th>
      <th scope="col">رقم الهاتف</th>
      <th scope="col">اختيار</th>
    </tr>
  </thead>
  <tbody class="table-body-3">
    
    
  </tbody>
</table>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>







<div class="modal fade" id="exampleModa9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search for Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
            <div  class="form-group text-center" style="float: right;width: 327px;"><input value="" id='name4' class="form-control d-xl-flex align-items-xl-start" type="text"  name="text" placeholder="اسم الزبون" data-bs-hover-animate="pulse" style="    direction: rtl;
              text-align: right; width: 290px;filter: blur(0px);"></div>
            <div class="form-group" style="width: 100px;"><button onclick="search4()" class="btn btn-primary btn-block" onsubmit="event.preventDefault()" data-toggle="modal" data-target="#exampleModa10"  type="submit" data-bs-hover-animate="pulse">Search</button></div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModa10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Clients</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
           <table class="table" style="direction: rtl; text-align: right;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">الاسم</th>
      <th scope="col">رقم الهاتف</th>
      <th scope="col">اختيار</th>
    </tr>
  </thead>
  <tbody class="table-body-4">
    
    
  </tbody>
</table>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div  style="direction: rtl;"  class="modal fade" id="exampleModa11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">حدد التاريخ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
             <div class="col-9">
                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <label style="margin: 5px;">من     </label>
                    <input name="date" placeholder="0000-00-00" class="datefrom form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                 </div>
                  <div style="    margin-top: 30px;    margin-bottom: 30px;" class="col-9">
                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <label style="margin: 5px;">الى     </label>
                    <input name="date" placeholder="0000-00-00" class="dateto form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                 </div>

                  <div  class="col-9">
                            <div style="float: left;" class="form-group" style="width: 100px;"><button data-toggle="modal" data-target="#exampleModa12" onclick="reports()" class="btn btn-primary btn-block" onsubmit="event.preventDefault()" type="submit" data-bs-hover-animate="pulse">Search</button></div>
                 </div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModa12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 1240px;" role="document">
    <div class="modal-content" style="width: 1226px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reports</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
       
        <label data-bs-hover-animate="pulse"  style="cursor: pointer;color: firebrick;float: right;" data-toggle="modal" data-target="#exampleModa21" style="margin: 10px; float: right;">التقارير النهائية</label>
       

        <table style="direction: rtl; text-align: right;"table-striped dir="rtl" id="table" class="table table2excel" data-tableName="Test Table 1">
  <thead>
    <tr>
      <th data-bs-hover-animate="pulse" scope="col">#</th>
      <th scope="col" data-bs-hover-animate="pulse">الاسم</th>
      <th scope="col">رقم الهاتف</th>
      <th scope="col">رقم الوصل</th>
      <th scope="col">مبلغ الوصل</th>
      <th scope="col">العمولة </th>
      <th scope="col">المبلغ المسدد </th>
      <th scope="col">الديون </th>
      <th scope="col">تاريخ الوصل </th>
      <th scope="col">تعديل </th>
    </tr>
  </thead>
  <tbody style="font-family: auto;" class="table-body-5">
    
    
  </tbody></table>                
<button onclick="export_excel('table2excel')" data-bs-hover-animate="pulse" type="button" class="btn btn-light">استخراج اكسل</button>


         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>  
    </div>
  </div>
</div>






<div class="modal fade" id="exampleModa14" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search for Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
            <div  class="form-group text-center" style="float: right;width: 327px;"><input id='name5' class="form-control d-xl-flex align-items-xl-start" type="text"  name="text" placeholder="اسم الزبون"  data-bs-hover-animate="pulse" style="text-align: right; width: 290px;filter: blur(0px);"></div>
            <div class="form-group" style="width: 100px;"><button onclick="search5()" class="btn btn-primary btn-block" onsubmit="event.preventDefault()" data-toggle="modal" data-target="#exampleModa15"  type="submit" data-bs-hover-animate="pulse">Search</button></div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModa15" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Clients</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
           <table class="table" style="direction: rtl; text-align: right;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">الاسم</th>
      <th scope="col">رقم الهاتف</th>
      <th scope="col">اختيار</th>
    </tr>
  </thead>
  <tbody class="table-body-6">
    
    
  </tbody>
</table>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>






<!-- Modal -->
<div class="modal fade" id="exampleModa16" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">تقارير وصولات الشراء</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
           <table class="table" style="direction: rtl; text-align: right;">
  <thead>
    <tr>
      <th scope="col">رقم الوصل</th>
      <th scope="col">مبلغ  الوصل</th>
      <th scope="col">العمولة</th>
      <th scope="col">المبلغ المسدد</th>
      <th scope="col">اختيار</th>
    </tr>
  </thead>
  <tbody class="table-body-7">
    
    
  </tbody>
</table>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>







<!-- Modal -->
<div class="modal fade" id="exampleModa17" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Client</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
        <div class="row">
  <div class="col-6" style="text-align: right; margin-left: auto;
    margin-right: auto;">
    <div class="list-group" ><a  href="addclient.php">
      <a  href="add_exp.php"  class="list-group-item list-group-item-action " id="list-home-list"  aria-controls="home">اضافة</a></a>
      <a  data-toggle="modal" data-target="#exampleModa19"  class="list-group-item list-group-item-action " id="list-home-list"  aria-controls="home">تقارير الصرفيات</a></a>


    </div>
  </div>
 
</div>      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div  style="direction: rtl;"  class="modal fade" id="exampleModa19" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">حدد التاريخ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
             <div class="col-9">
                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <label style="margin: 5px;">من     </label>
                    <input name="date" placeholder="0000-00-00" class="datefrom2 form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                 </div>
                  <div style="    margin-top: 30px;    margin-bottom: 30px;" class="col-9">
                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <label style="margin: 5px;">الى     </label>
                    <input name="date" placeholder="0000-00-00" class="dateto2 form-control" size="16" type="text" value="" readonly>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
                 </div>

                  <div  class="col-9">
                            <div style="float: left;" class="form-group" style="width: 100px;"><button data-toggle="modal" data-target="#exampleModa20" onclick="exp_reports()" class="btn btn-primary btn-block" onsubmit="event.preventDefault()" type="submit" data-bs-hover-animate="pulse">Search</button></div>
                 </div>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModa20" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 1240px;" role="document">
    <div class="modal-content" style="width: 1226px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reports</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
                <label style="margin: 10px; float: right;">مجموع الصرفيات  <span class="sarfiat">0</span>  </label>
        <table style="direction: rtl; text-align: right;"table-striped dir="rtl" id="table" class="table table2excel2" data-tableName="Test Table 1">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">السعر</th>
      <th scope="col">الملاحضات</th>
      <th scope="col">تاريخ الصرف</th>
     
    </tr>
  </thead>
  <tbody style="font-family: auto;" class="table-body-8">
    
    
  </tbody></table>                
<button onclick="export_excel('table2excel2')" data-bs-hover-animate="pulse" type="button" class="btn btn-light">استخراج اكسل</button>


         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>  
    </div>
  </div>
</div>








<!-- Modal -->
<div class="modal fade" id="exampleModa21" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 1240px;" role="document">
    <div class="modal-content" style="width: 1226px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reports</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
        <table style="direction: rtl; text-align: right;"table-striped dir="rtl" id="table" class="table table2excel3" data-tableName="Test Table 1">
  <thead>
    <tr>
      <th scope="col">الديون الكلية  </th>
      <th scope="col">الارباح الكلية </th>
      <th scope="col">المبالغ الكلية   </th>
     
    </tr>
  </thead>
  <tbody style="font-family: auto;" class="table-body-8">
    
    <tr>
                                <th><span class="deon">0</span></th>
                                <th><span class="arbah">0</span></th>
                                <th><span class="allmoney">0</span></th>
                             
                    </tr>
    
  </tbody></table>         

<button onclick="export_excel('table2excel3')" data-bs-hover-animate="pulse" type="button" class="btn btn-light">استخراج اكسل</button>


         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>  
    </div>
  </div>
</div>





<!-- Modal -->
<div class="modal fade" id="exampleModa22" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Print</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="width: 100%;">
        <div style="direction: rtl;
    width: 100%;
    text-align: right;">
                   <span>رقم الوصل:</span>
                   <input id='printid' class="form-control d-xl-flex align-items-xl-start" type="text"  name="text" placeholder="323234" data-bs-hover-animate="pulse" style=" text-align: right; width: 290px;filter: blur(0px);">
</div>
        <div class="row" >
  <div class="col-6" style="text-align: right; margin-left: auto;
    margin-right: auto;">
    <div style="margin-top: 10px;
    width: 250px;" class="list-group" ><a  href="addclient.php">
      <a onclick="print(1)" class="list-group-item list-group-item-action " id="list-home-list"  aria-controls="home">طباعة وصل شراء </a></a>
      <a onclick="print(2)" class="list-group-item list-group-item-action " id="list-home-list"  aria-controls="home">وصل دفع </a></a>   
         <a onclick="print(3)" class="list-group-item list-group-item-action " id="list-home-list"  aria-controls="home">وصل قبض </a></a>


    </div>
  </div>
 
</div>      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

      <script src="assets/js/main.js"></script>
   <script type="text/javascript" src="assets/js/bootstrap-timepicker.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script src="assets/js/jquery.table2excel.js"></script>
<script type="text/javascript">

     var name_of_client;
     var token = "<?php echo $_SESSION['token'];?>";
     var detials="";
    function search() {
        // body...
         detials="";
         name_of_client= $('#name').val();
         token = "<?php echo $_SESSION['token'];?>";
         search_in_api();

    }
    function search_in_api() {
        // body...
        detials="";
        $.get( "api.php?action=search_for_client&client_name="+name_of_client+"&token="+token, function( data ) {
        var obj = $.parseJSON(data);

     if (obj['access']!="0") {
        for(var i=0;i<Object.keys(obj).length-1;i++){
        detials+=`<tr>
                                <th>`+obj[i]['id']+`</th>
                                <th>`+obj[i]['name']+`</th>
                                <th>`+obj[i]['phone']+`</th>
                                <th><a class="icon ion-android-add" href="add-purchase.php?id=`+obj[i]['id']+`"></a></th>
                              
                    </tr>`
              console.log(obj[i]['name']);
                }

    $(".table-body-1").html(detials);
      console.log(obj);
  }
  else{
    $(".alert").css("display", "initial");
  }

});
    }


        function search2() {
        // body...
         detials="";
         name_of_client= $('#name2').val();
                 token = "<?php echo $_SESSION['token'];?>";
         search_in_api2();

    }
    function search_in_api2() {
        // body...
    detials="";
        $.get( "api.php?action=search_for_client&client_name="+name_of_client+"&token="+token, function( data ) {
        var obj = $.parseJSON(data);


  if (obj['access']!="0") {
    
     for(var i=0;i<Object.keys(obj).length-1;i++){
        detials+=`<tr>
                                <th>`+obj[i]['id']+`</th>
                                <th>`+obj[i]['name']+`</th>
                                <th>`+obj[i]['phone']+`</th>
                                <th><a onclick="kashf(`+obj[i]['id']+`)" data-toggle="modal" data-target="#exampleModa6"  class="icon ion-android-add" 
                                for="`+obj[i]['id']+`"></a></th>
                              
                    </tr>`
              console.log(obj[i]['name']);


                }

    $(".table-body-2").html(detials);
      console.log(obj);
  }
  else{
    $(".alert").css("display", "initial");
  }

});
    }



        function search3() {
        // body...
                 detials="";
         name_of_client= $('#name3').val();
                 token = "<?php echo $_SESSION['token'];?>";
         search_in_api3();

    }
    function search_in_api3() {
        // body...
        detials="";
        $.get( "api.php?action=search_for_client&client_name="+name_of_client+"&token="+token, function( data ) {
        var obj = $.parseJSON(data);


  if (obj['access']!="0") {
    
     for(var i=0;i<Object.keys(obj).length-1;i++){
        detials+=`<tr>
                                <th>`+obj[i]['id']+`</th>
                                <th>`+obj[i]['name']+`</th>
                                <th>`+obj[i]['phone']+`</th>
                                <th><a href="addreceipt.php?id=`+obj[i]['id']+`"  class="icon ion-android-add" 
                                for="`+obj[i]['id']+`"></a></th>
                              
                    </tr>`
              console.log(obj[i]['name']);


                }

    $(".table-body-3").html(detials);
      console.log(obj);
  }
  else{
    $(".alert").css("display", "initial");
  }

});
    }



        function search4() {
        // body...
                 detials="";
         name_of_client= $('#name4').val();
                 token = "<?php echo $_SESSION['token'];?>";
         search_in_api4();

    }
 function search_in_api4() {
        // body...
                          detials="";
        $.get( "api.php?action=search_for_client&client_name="+name_of_client+"&token="+token, function( data ) {
        var obj = $.parseJSON(data);


  if (obj['access']!="0") {
    
     for(var i=0;i<Object.keys(obj).length-1;i++){
        detials+=`<tr>
                                <th>`+obj[i]['id']+`</th>
                                <th>`+obj[i]['name']+`</th>
                                <th>`+obj[i]['phone']+`</th>
                                <th><a href="addrefund.php?id=`+obj[i]['id']+`"  class="icon ion-android-add" 
                                for="`+obj[i]['id']+`"></a></th>
                              
                    </tr>`
              console.log(obj[i]['name']);


                }

    $(".table-body-4").html(detials);
      console.log(obj);
  }
  else{
    $(".alert").css("display", "initial");
  }

});
    }

        function search5() {
        // body...
                 detials="";

         name_of_client= $('#name5').val();
                 token = "<?php echo $_SESSION['token'];?>";
         search_in_api5();

    }
    function search_in_api5() {
                          detials="";
        // body...
        $.get( "api.php?action=search_for_client&client_name="+name_of_client+"&token="+token, function( data ) {
        var obj = $.parseJSON(data);


  if (obj['access']!="0") {
    
     for(var i=0;i<Object.keys(obj).length-1;i++){
        detials+=`<tr>
                                <th>`+obj[i]['id']+`</th>
                                <th>`+obj[i]['name']+`</th>
                                <th>`+obj[i]['phone']+`</th>
                                <th><a onclick="getid(`+obj[i]['id']+`)" data-toggle="modal" data-target="#exampleModa16"  class="icon ion-android-add" 
                                for="`+obj[i]['id']+`"></a></th>

                              
                    </tr>`
              console.log(obj[i]['name']);


                }

    $(".table-body-6").html(detials);
      console.log(obj);
  }
  else{
    $(".alert").css("display", "initial");
  }

});
    }
    var id;
    function getid(x) {
        // body...
        id=x;
        console.log(id);
        get_bill();
    }


    function kashf(x) {
        // body...
        id=x;
        console.log(id);
        get_client_receipts();
    }

function get_bill() {
    detials="";
        // body...
        $.get( "api.php?action=get_client_bills&client_id="+id+"&token="+token, function( data ) {
            console.log("id="+id);
        var obj = $.parseJSON(data);


  if (obj['access']!="0") {
    
     for(var i=0;i<Object.keys(obj).length-1;i++){
        detials+=`<tr>
                                <th>`+obj[i]['id']+`</th>
                                <th>`+obj[i]['amount']+`</th>
                                <th>`+obj[i]['commission']+`</th>
                                <th>`+obj[i]['amount_paid']+`</th>
                                <th><a href="edit-purchase.php?id=`+obj[i]['id']+`"  class="icon ion-android-add" 
                                for="`+obj[i]['id']+`"></a></th>
                              
                    </tr>`
              console.log(obj[i]['name']);
                }

    $(".table-body-7").html(detials);
      console.log(obj);
  }
  else{
    $(".alert").css("display", "initial");
  }

});
    }

    var amount_paid=0;
    var type="";
    var url="";
    var deon=0;
    var current_deon=0;
     function check_receipt_deon(x,y,z,m) {
            // body...
            switch(x){
                case "1":
                deon=current_deon-parseInt(y);
                 current_deon=deon;
                break;
                case "2":
                deon=current_deon+parseInt(y);
                current_deon=deon;
                break;
                case "3":
                deon=current_deon+(parseInt(y)+parseInt(z))-parseInt(m);
                current_deon=deon;
                break;
            }
        }


        function check_receipt_type(x) {
            // body...
            switch(x){
                case "1":
                type="وصل دفع";
                url="edit-receipt.php?id=";
                break;
                case "2":
                type="وصل  قبض";
                url="edit-refund.php?id=";
                break;
                case "3":
                type="وصل شراء";
                url="edit-purchase.php?id=";

                break;
            }
        }

function get_client_receipts() {
    detials="";

     amount_paid=0;
     type="";
     url="";
     deon=0;
     current_deon=0;
        // body...
        $.get( "api.php?action=get_client_receipts&client_id="+id+"&token="+token, function( data ) {
        console.log("id="+id);
        var obj = $.parseJSON(data);


  if (obj['access']!="0") {
    
     for(var i=0;i<Object.keys(obj).length-1;i++){
        check_receipt_type(obj[i]['type']);
        check_receipt_deon(obj[i]['type'],obj[i]['total_amount'],obj[i]['commission'],obj[i]['amount_paid']);
        detials+=`<tr>
                                <th>`+obj[i]['client_information'][0]['name']+`</th>
                                <th>`+obj[i]['client_information'][0]['phone']+`</th>
                                <th>`+type+`</th>
                                <th>`+obj[i]['total_amount']+`</th>
                                <th>`+obj[i]['commission']+`</th>
                                <th>`+obj[i]['amount_paid']+`</th>
                                <th>`+deon+`</th>
                                <th>`+obj[i]['date_added']+`</th> 
                                <th>`+obj[i]['id']+`</th>
                                <th><a href="`+url+obj[i]['id']+`"  class="icon ion-android-add" 
                                for="`+obj[i]['id']+`"></a></th>
                              
                    </tr>`
              console.log(obj[i]['name']);
                }

    $(".table-body-7").html(detials);
      console.log(obj);
  }
  else{
    $(".alert").css("display", "initial");
  }

});
    }

        $('.form_date').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 3,
        minView: 2,
        forceParse: 0
    });

        var datefrom;
        var dateto;
        var detials="";
        var allmoney=0;
        var alldeon=0;
        var allarbah=0;
        var c="";
        function reports() {
            // body...
            alld();
             datefrom= $('.datefrom').val();
             dateto= $('.dateto').val();
             $.get( "api.php?action=get-reports&start="+datefrom+"&end="+dateto+"&token="+token, function( data ) {
            var obj = $.parseJSON(data);
                  console.log(obj);
                  detials="";
                   allmoney=0;
                   alldeon=0;
                   allarbah=0;
                   c="";
  if (obj['access']!="0") {
    
     for(var i=0;i<Object.keys(obj).length;i++){
        allarbah+=parseInt(obj[i]['commission']);
        var d=(parseInt(obj[i]['commission'])+parseInt(obj[i]['amount'])+parseInt(obj[i]['extra_tax'])+parseInt(obj[i]['shipping']))-parseInt(obj[i]['amount_paid']);
        if (d==0) {
            c="لا توجد ديون";
        }else c=d;
          
        alldeon=debt;
        allmoney+=parseInt(obj[i]['amount_paid']);
        detials+=`<tr  >
                                <th>`+obj[i]['client_id']+`</th>
                                <th>`+obj[i]['name']+`</th>
                                <th>`+obj[i]['phone']+`</th>
                                <th>`+obj[i]['id']+`</th>
                                <th>`+obj[i]['total_amount']+`</th>
                                <th>`+obj[i]['commission']+`</th>
                                
                                <th>`+obj[i]['amount_paid']+`</th>
                                <th>`+c+`</th>
                                <th>`+obj[i]['date_added']+`</th>
                                <th><a href="edit-purchase.php?id=`+obj[i]['id']+`"  class="icon ion-android-add" 
                                for="`+obj[i]['id']+`"></a></th>
                              
                    </tr>`
              console.log(obj[i]['name']);


                }


    $(".arbah").html(allarbah);
    $(".deon").html(alldeon);
    $(".allmoney").html(allmoney);
    $(".table-body-5").html(detials);
      console.log(obj);
  }
  else{
    $(".alert").css("display", "initial");
  }


          });

        }
        var debt=0;
        function alld(){
          $.get( "api.php?action=get-debt&token="+token, function( data ) {
            var obj = $.parseJSON(data);
            console.log(obj);
             debt= parseInt(obj['debt']);
            });

        }                  

             var sarfiat=0;
                function exp_reports() {
            // body...
             datefrom= $('.datefrom2').val();
             dateto= $('.dateto2').val();
              sarfiat=0;
             $.get( "api.php?action=get-exp-reports&start="+datefrom+"&end="+dateto+"&token="+token, function( data ) {
            var obj = $.parseJSON(data);
                  console.log(obj);
                  detials="";

  if (obj['access']!="0") {
    
     for(var i=0;i<Object.keys(obj).length;i++){
                    sarfiat+=parseInt(obj[i]['price']);
        detials+=`<tr>
                                <th>`+obj[i]['id']+`</th>
                                <th>`+obj[i]['price']+`</th>
                                <th>`+obj[i]['notes']+`</th>
                                <th>`+obj[i]['date_added']+`</th>
                                
                              
                    </tr>`
              console.log(obj[i]['name']);


                }

    $(".sarfiat").html(sarfiat);
    $(".table-body-8").html(detials);
      console.log(obj);
  }
  else{
    $(".alert").css("display", "initial");
  }


          });

        }
        
       
        function export_excel(tableid){
           var table = $('.'+tableid);
                    if(table && table.length){
                        var preserveColors = (table.hasClass('table2excel_with_colors') ? true : false);
                        $(table).table2excel({
                            exclude: ".noExl",
                            name: "Excel Document Name",
                            filename: "myFileName" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
                            fileext: ".xls",
                            exclude_img: true,
                            exclude_links: true,
                            exclude_inputs: true,
                            preserveColors: preserveColors
                        });
                    }
        }

        function print(x) {
          // body...
          console.log(x);
          print_id=parseInt($('#printid').val());
          console.log(print_id);
          switch(x){
            case 1:
            console.log("bill");
            window.location.href = "printbill.php?id="+print_id;
            break;

            case 2:
            console.log("rec");
            window.location.href = "printreceipt.php?id="+print_id;

            break;

            case 3:
            console.log("ref");
            window.location.href = "printexp.php?id="+print_id;

            break;
          }
        }
</script>



    <!--====== Javascripts & Jquery ======-->
    <?php
    function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
    return $d && $d->format($format) === $date;

}

mysqli_close($conn);
    ?>
