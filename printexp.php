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


$pdf->Ln(2);
        if (isset($_GET['id']) and !empty($_GET['id'])) {
            # code...
            $id=$_GET['id'];
        
        $resu= mysqli_query($conn,"SELECT * FROM `client_receipts` WHERE id='$id'");
         $res=mysqli_fetch_array($resu);  

            $client_id=$res['client_id'];
         $resu2= mysqli_query($conn,"SELECT * FROM `client` WHERE id='$client_id'");
         $res2=mysqli_fetch_array($resu2);                   
        }

    

$tbl = '
<table cellspacing="0" cellpadding="0" >
    <tr rowspan="4">
        
        <td align="left">
            <img  src="assets/img/forma.png" />
        </td>
    </tr>
</table>
<br />
<br />
  <p align="center">وصل استلام مبلغ من ميني مول</p>
    <br /><br />
    <br /><br />
    <br /><br />
    <table cellspacing="0" cellpadding="1" >
        <tr>
            <td align="right">
                <table  cellspacing="0" cellpadding="1" >
                    <tr>
                        <td align="center">التاريخ</td>
                    </tr>
                    <tr>
                        <td align="center">'.$res['date_added'].'</td>
                    </tr>
                </table>
            </td>
            <td align="center">
                <table  cellspacing="0" cellpadding="1" >
                    <tr>
                        <td align="center">القيمة</td>
                    </tr>
                    <tr>
                        <td align="center">'.$res['price'].'$</td>
                    </tr>
                </table>
            </td>
            <td align="left">
                <table  cellspacing="0" cellpadding="1" >
                    <tr>
                        <td align="center">رقم الوصل</td>
                    </tr>
                    <tr>
                        <td align="center">'.$id.'</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br /></br /><br />
    <br /></br /><br />
    <table cellspacing="0" cellpadding="1" >
        <tr>
            <td colspan="2">سلمنا الى السادة </td>
            <td colspan="4">'.$res2['name'].' </td>            
        </tr>
        <tr>
            <td colspan="2">مبلغ قدره</td>
            <td colspan="4">'.$res['price'].'$</td>            
        </tr>
        <tr>
            <td colspan="2">وذلك عن </td>
            <td colspan="4">'.$res['notes'].'</td>            
        </tr>
       
    </table>

    <br /></br /><br />
    <br /></br /><br />
    <p align="right" >اسم المستلم وتوقيعه

    <br /><br /><br />
</p>
<br /><br />
<br /><br /><br />
<br /><br /><br />


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