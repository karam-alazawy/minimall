<?php 
header("Access-Control-Allow-Origin: *");

require 'TCPDF/tcpdf.php';

require 'config.php';
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
      /*  $image_file = 'logo.png';
        $this->Image($image_file, 10, 10, 50, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
         $this->SetFont('aefurat', 'B', 14);
        // Title
        $this->Cell(0, 15, 'ميني مول للنقل و التسوق الالكتروني', 0, true, 'R', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 15, 'بغداد شارع الصناعة مقابل الجامعة التكنلوجية', 0, false, 'R', 0, '', 0, false, 'M', 'M');*/
       
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
$pdf=new MYPDF(PDF_PAGE_ORIENTATION,PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF_8',false);
$pdf->SetCreator("Minimull");
$pdf->SetAuthor("Minimull");
$pdf->SetTitle("Minimull");

$pdf->SetHeaderData(PDF_HEADER_LOGO,PDF_HEADER_LOGO_WIDTH,PDF_HEADER_TITLE,PDF_HEADER_STRING);
$pdf->SetHeaderFont(array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
$pdf->SetFooterFont(array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_RIGHT);

$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE,PDF_MARGIN_BOTTOM);

$pdf->SetImageScale(PDF_IMAGE_SCALE_RATIO);

$lg=array();

$lg['a_meta_charset']='UTF_8';
$lg['a_meta_dir']='rtl';
$lg['a_meta_language']='ar';
$lg['w_page']='page';
$pdf->AddPage();
$pdf->SetLanguageArray($lg);
$pdf->SetFont('aefurat','',14);
$pdf->SetRTL(true);


$pdf->Ln(0);
        if (isset($_GET['id']) and !empty($_GET['id'])) {
            # code...
            $bill_id=$_GET['id'];
        
        $resu= mysqli_query($conn,"SELECT * FROM `bill` WHERE id='$bill_id'");
         $res=mysqli_fetch_array($resu);  

         $client_id=$res['client_id'];
         $resu2= mysqli_query($conn,"SELECT * FROM `client` WHERE id='$client_id'");
         $res2=mysqli_fetch_array($resu2);  
        $client_id=$res['client_id'];

         $resu3= mysqli_query($conn,"SELECT * FROM `items` WHERE bill_id='$bill_id'");
                            
        }

    
$total_amount=intval($res['total_amount'])+intval($res['commission']);
$tbl = '
<table cellspacing="0" cellpadding="0" >
    <tr rowspan="2">
        <td align="left">
            <img  src="assets/img/forma.png" />
        </td>
    </tr>
</table>
<br />
<br />
<table cellspacing="0" cellpadding="1" >
    <tr>
        <th>اسم الزبون :</th>
        <td colspan="3">'.$res2['name'].'</td>
        <td rowspan="5" colspan="3">
            في حال ظهور اي تكاليف اضافية  خلال اتمام عملية الشراء يقوم المكتب باجراء اللازم بموافقة صاحب الوصل  في حال احتواء الوصل على اكثر من مادة وتعذر شراء مادة معينة هل نستمر بالشراء :';
         if($res['continue']==1)
                $tbl.='<span color="red">  نعم   </span>';
            else
                $tbl.='<span color="red"> كلا   </span>';
       $tbl.='</td>
    </tr>
    <tr>
        <th>تاريخ الوصل :</th>
        <td>'.$res['date_added'].'</td>
    </tr>
    <tr>
        <th>رقم الوصل :</th>
        <td>('.$res['id'].')</td>
    </tr>
    <tr>
        <th>رقم الهاتف :</th>
        <td colspan="3">'.$res2['phone'].'</td>
    </tr>
    <tr>
        <th > البريد الالكتروني : </th>
        <td align="right" colspan="3">'.$res2['email'].'</td>
    </tr>   
</table>
<br /><br />
<br /><br />';
$pdf->SetFont('aefurat','',10);
$tbl=$tbl.'<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td align="center" colspan="2" color="red">Total price with tax&com</td>
        <td align="center">Tax</td>
        <td align="center">com</td>
        <td align="center">Shipping</td>
        <td align="center" colspan="2">Price With web</td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td align="center" colspan="2" rowspan="4">'.$total_amount.' $</td>';
       
            $tbl=$tbl.'<td align="center" rowspan="4">'.$res['extra_tax'].' $</td>';
        $tbl=$tbl.'<td align="center" rowspan="4">'.$res['commission'].' $</td>
        <td align="center" rowspan="4">'.$res['shipping'].'</td>
        <td align="center" rowspan="4" colspan="2">'.$res['amount'].' $</td>
        <td rowspan="4" align="left" colspan="4">';
        while ($res3=mysqli_fetch_array($resu3)) { 
            $tbl.=$res3['notes'].'<br />';
        }
        $tbl.='</td>
    </tr>
    <tr>
        <td colspan="2"></td><td></td><td></td><td></td><td colspan="2"></td><td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="2"></td><td></td><td></td><td></td><td colspan="2"></td><td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="2"></td><td></td><td></td><td></td><td colspan="2"></td><td colspan="4"></td>
    </tr>
    <tr>
        <td align="center" color="red" colspan="2">'.$res['total_amount'].' $</td>
        <td colspan="3" align="center" color="red"><b>Final Price</b></td>
        <td colspan="2" align="center">paid : '.$res['amount_paid'].'$</td>
        <td colspan="4" align="center" color="blue"><b>Total Price with out tax</b></td>
    </tr>';
             $resu3= mysqli_query($conn,"SELECT * FROM `items` WHERE bill_id='$bill_id'");

        while ($res3=mysqli_fetch_array($resu3)) { 
         $tbl.='<tr><td align="left" colspan="3">'.$res3['quantity'].' عدد</td>'; 
        $tbl.='<td align="left" colspan="8"><a  href="'.$res3['url'].'" target="_blank">'.$res3['url'].'</a></td></tr>';
    }
        
    $tbl.='
</table>
<br /><br />
<br /><br />
<br /><br />

<table>
    <tr>
        <td align="center"><b>اسم وتوقيع الزبون</b><br />
</td>
        <td align="center"><b>اسم وتوقيع البائع</b><br />
</td>
    </tr>
    <tr>

        <td align="center" rowspan="3">
            '.$res2['name'].'
        </td>
        <td align="center" rowspan="2">ميني مول</td>
    </tr>
    <tr><td></td></tr>
    
</table>
<br />
<br />
<br /><br />
<br /><br />
<br />

<table cellspacing="0" cellpadding="0" >
    <tr rowspan="4">
        
        <td align="left">
            <img  src="assets/img/forma-footer.png" />
        </td>
    </tr>
</table>

';

$pdf->writeHTML($tbl, false, false, false, false, '');
ob_end_clean();
$outfile='voucherNo'.$voucher_id.' '.date("F j, Y, g:i a").'.pdf';

$pdf->Output($outfile,'I');

?>