<?php
include 'config.php';
if (!isset($_SESSION['token'])) {
    # code...
        echo '<script type="text/javascript">window.location.href = "login.php";</script>';

}
?>
<!DOCTYPE html>
<html style="    background: linear-gradient(135deg, #172a74, #21a9af);
 height: 100%;">

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

<body style="    background: linear-gradient(135deg, #172a74, #21a9af);
 height: 100%;">
    <div style="    background: linear-gradient(135deg, #172a74, #21a9af);
 height: 100%;">
        <div class="header-blue" style="    background: linear-gradient(135deg, #172a74, #21a9af);
 height: 100%;">
      <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a data-bs-hover-animate="pulse" style="font-size: 35px;margin: 0px 20px 0px 10px;color: #20a1ab;" class="far fa-arrow-alt-circle-left" href="minimall.php"></a>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                      <a class="btn btn-light action-button" role="button" data-bs-hover-animate="pulse" href="logout.php">Log Out</a></div>
                </div>
            </nav>
            <div class="container text-right hero" style="margin-top: 10px;">
                <div class="row text-right" style="direction: rtl;" direction="rtl;">       
                    <div class="col text-right" direction="rtl;">                         
                        <div class="float-left image-holder" data-bs-hover-animate="pulse" style="background-image: url(&quot;assets/img/purchase.png&quot;);width: 607px;height: 600px;padding: 0 0 20px;background-size: cover;background-color: #e8ba61;"></div>
                        <div class="text-right" style="width: 607px;height: 381px;text-align: center;padding: 0 0 20px;color: rgb(244,71,107);">                        

                            <div class="form-group text-center float-left" style="width: 507px;margin-top: 58px;max-width: 461px;/*width: 90%;*/height: 600px;margin: 0 auto;background-color: #ffffff;padding: 40px;border-radius: 4px;color: #505e6c;box-shadow: 1px 1px 5px rgba(0,0,0,0.1);"><span data-toggle="modal" data-target="#exampleModa1" style="    position: absolute;right: 78px;font-size: 31px;top: 5px; cursor: pointer;" class="icon ion-android-add-circle"data-bs-hover-animate="pulse" ></span> 
                                <div class="bounce animated" style="text-align: center;padding: 0 0 20px;font-size: 100px;color: rgb(244,71,107);height: 88px;margin-bottom: 44px;"><i class="fab fa-wpforms bounce animated" style="text-align: center;padding: 0 0 20px;font-size: 100px;color: rgb(244,71,107);"></i></div><input type="text" class="amount" name="amount" placeholder="مبلغ الوصل" data-bs-hover-animate="pulse"
                                    style="background: #f7f9fc;border: none;border-bottom: 1px solid #dfe7f1;border-radius: 0;box-shadow: none;outline: none;margin-bottom: 10px;color: inherit;text-indent: 8px;height: 42px;width: 271px;padding: 10px;text-align: right;">
                                <input
                                    type="text"  class="shipping"  name="shipping" placeholder="الشحن الى المخازن" data-bs-hover-animate="pulse" style="background: #f7f9fc;border: none;border-bottom: 1px solid #dfe7f1;border-radius: 0;box-shadow: none;outline: none;margin-bottom: 10px;color: inherit;text-indent: 8px;height: 42px;width: 271px;padding: 10px;text-align: right;"><input  class="commission"  type="text" name="commission" placeholder="العمولة" data-bs-hover-animate="pulse" style="background: #f7f9fc;border: none;border-bottom: 1px solid #dfe7f1;border-radius: 0;box-shadow: none;outline: none;margin-bottom: 10px;color: inherit;text-indent: 8px;height: 42px;width: 271px;padding: 10px;text-align: right;">
                                    <input
                                        type="text"  class="extra_tax"  name="extra_tax" placeholder=" ضريبة اضافية " data-bs-hover-animate="pulse" style="background: #f7f9fc;border: none;border-bottom: 1px solid #dfe7f1;border-radius: 0;box-shadow: none;outline: none;margin-bottom: 10px;color: inherit;text-indent: 8px;height: 42px;width: 271px;padding: 10px;text-align: right;"><input type="text"  class="amount_paid"  name="amount_paid" placeholder="المبلغ المسدد  " data-bs-hover-animate="pulse" style="background: #f7f9fc;border: none;border-bottom: 1px solid #dfe7f1;border-radius: 0;box-shadow: none;outline: none;margin-bottom: 10px;color: inherit;text-indent: 8px;height: 42px;width: 271px;padding: 10px;text-align: right;">
                                       <div style="height: 62px;" class="form-group">
                                          <label style="font-size: 13.9px" for="inputState">في حال ظهور اي تكاليف اضافية  <br >اوتعذر شراء مادة معينة هل نستمر بالشراء ؟</label>
                                          <select  name="continue" data-bs-hover-animate="pulse" style="width: 271px;margin-left: auto; margin-right: auto;" id="inputState" class="continue form-control">
                                            <option selected>هل نستمر بالشراء</option>
                                            <option class="cont1"  value="1">نعم</option>
                                            <option  class="cont2" value="0">كلا</option>
                                          </select>
                                        </div>
    <button  onclick="adduser()"  class="btn btn-primary btn-block" type="submit" data-bs-hover-animate="pulse" style="background: #f4476b;border: none;border-radius: 4px;padding: 11px;margin-right: auto;margin-left: auto;width: 271px;box-shadow: none;margin-top: 32px;text-shadow: none;outline: none !important;cursor: pointer;">اضف</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






<!-- Modal -->
<div class="modal fade" id="exampleModa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="max-width: 650px;" class="modal-dialog" role="document">
    <div  class="modal-content">
      <div style="width: 650px;" class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Items</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="htmlrow modal-body" style="direction: rtl; text-align: right; width: 100%;">



         </div>
      <div class="modal-footer">
    <span style="
    font-size: 30px;
    float: left;
    position: absolute;
    left: 26px;
    color: #327b74;"
    class="icon ion-android-add-circle" data-bs-hover-animate="pulse" onclick="addanother()"></span>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>

<script type="text/javascript">
    var token;
    var oldbalance=0;
    var newbalance=0;
    var amount;
    var shipping;
    var commission;
    var extra_tax;
    var amount_paid;
    var cont;
    token = "<?php echo $_SESSION['token'];?>";
     var   id = "<?php echo $_GET['id'];?>";
$('#myform').submit(function () {
 return false;
});
    function adduser() {
        // body...
        clear_item();
        if ($('.amount').val()=="") {
            amount=0;
        }else
        amount = $('.amount').val();
        if ($('.shipping').val()=="") {
            shipping=0;
        }else
        shipping = $('.shipping').val();
        if ($('.commission').val()=="") {
            commission=0;
        }else
        commission = $('.commission').val();
        if ($('.extra_tax').val()=="") {
            extra_tax=0;
        }else
        extra_tax = $('.extra_tax').val();
        if ($('.amount_paid').val()=="") {
            amount_paid=0;
        }else
        amount_paid = $('.amount_paid').val();
        cont = $('.continue').val();
        console.log(token);
        newbalance=parseInt(amount)+parseInt(commission)+parseInt(extra_tax)+parseInt(shipping);
        newbalance-=parseInt(amount_paid);
        console.log("newbalance="+newbalance);
        newbalance=newbalance-oldbalance;
        console.log("after="+newbalance);
        $.get( "api.php?action=get_balance&client_id=1&token="+token, function( data ) {
        var obj = $.parseJSON(data);
        oldbalancet=parseInt(obj["balance"]);
        console.log("balanceinDb="+oldbalancet);

        newbalance+=oldbalancet;
        update_balance();
        });
        check();

    }
          function update_balance() {
            // body...           
        $.get( "api.php?action=update_balance&balance="+newbalance+"&client_id=1&token="+token, function( data ) {
        var obj = $.parseJSON(data);

        });
                }
   var billid;
    function check() {
        // body...
            $.get( "api.php?action=update_bill&bill_id="+id+"&amount="+amount+"&shipping="+shipping+"&commission="+commission+"&extra_tax="+extra_tax+"&amount_paid="+amount_paid+"&continue="+cont+"&token="+token, function( data ) {
        var obj = $.parseJSON(data);

  if (obj['access']!="0") {
        $(".alert").css("display", "none");

      console.log(obj);
    billid=obj['id'];
          console.log(billid);
          additem();
        alert("Success .");
            window.location.href = "printbill.php?id="+id;

//   location.reload();
setInterval(function(){ location.reload(); }, 7000);


  }
  else{
          console.log(obj);
          alert("Check Your Information !!");

  }

});
           
    }

        var total = [];
        var item = [];
        var row=1;
        var htmlrow='<div>    <div class="form-row">    <div class="form-group col-md-5">          <label for="inputCity">ملاحظات</label>     <input name="notes'+row+'" type="text" class="notes'+row+' form-control" id="inputCity">    </div>    <div class="form-group col-md-2">     <label for="inputZip">الكمية</label>        <input  type="text" class="quantity'+row+' form-control" id="inputZip">    </div>    <div class="form-group col-md-4">      <label for="inputZip">الرابط</label>     <input  type="text" class="url'+row+' form-control" id="inputZip">    </div>  </div>        </div>';
            $(".htmlrow").html(htmlrow);
            var s;
    function addanother() {
        // body...
//         cars = ["Saab", "Volvo", "BMW"];
    row++;
    htmlrow ='<div>    <div class="form-row">    <div class="form-group col-md-3">        <label for="inputCity">ملاحظات</label>      <input name="notes'+row+'" type="text" class="notes'+row+' form-control" id="inputCity">    </div>    <div class="form-group col-md-3">      <label for="inputZip">الكمية</label>        <input  type="text" class="quantity'+row+' form-control" id="inputZip">    </div>    <div class="form-group col-md-5">     <label for="inputZip">الرابط</label>      <input  type="text" class="url'+row+' form-control" id="inputZip">    </div>  </div>        </div>'
   
    $( ".htmlrow" ).append( htmlrow );

        }

        function additem() {
            // body...
            var url;
            var quantity;
            var notes;

            for (var i =1; i <row+1; i++) {
                url=$(".url"+i).val();
                quantity=$(".quantity"+i).val();
                notes=$(".notes"+i).val();
                if (url!="" & quantity!="") {
                    $.get( "api.php?action=add_item&url="+url+"&notes="+notes+"&quantity="+quantity+"&bill_id="+id+"&token="+token, function( data ) {
        var obj = $.parseJSON(data);
        });
                }
               

            }
        }
        
       $.get( "api.php?action=get_bill&bill_id="+id+"&token="+token, function( data ) {
        var obj = $.parseJSON(data);
        console.log(obj);
        $(".amount").val(obj[0]['amount']);
        $(".amount_paid").val(obj[0]['amount_paid']);
        $(".commission").val(obj[0]['commission']);
        $(".extra_tax").val(obj[0]['extra_tax']);
        $(".shipping").val(obj[0]['shipping']);
        if (obj[0]['continue']=="1") {$('.cont1').attr("selected", "");}
        else $('.cont2').attr("selected", "");
        oldbalance=parseInt(obj[0]['amount'])+parseInt(obj[0]['commission'])+parseInt(obj[0]['extra_tax'])+parseInt(obj[0]['shipping']);
        oldbalance-=parseInt(obj[0]['amount_paid']);
        console.log("oldbalance="+oldbalance);
                    
        });

       $.get( "api.php?action=get_items&bill_id="+id+"&token="+token, function( data ) {
        var obj = $.parseJSON(data);
        console.log(obj);
        htmlrow="";
        row=0;

         for(var i=0;i<Object.keys(obj).length-1;i++){
                   row++;

            htmlrow +='<div>    <div class="form-row">    <div class="form-group col-md-3">      <label for="inputCity">الملاحضات</label>    <input value="'+obj[row-1]['notes']+'" name="notes'+row+'" type="text" class="notes'+row+' form-control" id="inputCity">    </div>    <div class="form-group col-md-3">   <label for="inputZip">الكمية</label>       <input value="'+obj[row-1]['quantity']+'"  type="text" class="quantity'+row+' form-control" id="inputZip">    </div>    <div class="form-group col-md-5">     <label for="inputZip">الرابط</label>      <input value="'+obj[row-1]['url']+'"  type="text" class="url'+row+' form-control" id="inputZip"></div></div></div>';
                }  

                  $( ".htmlrow" ).html(htmlrow);
                       console.log("row="+row);


        });

       function clear_item(){
            $.get( "api.php?action=delete_items&&bill_id="+id+"&token="+token, function( data ) {

        });
       }

       console.log("row="+row);
</script>
</html>