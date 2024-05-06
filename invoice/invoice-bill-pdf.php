<?php

$invupid=$_GET['invoiceupid'];
require_once '../dompdf/autoload.inc.php';
require_once '../conn.php';

use Dompdf\Dompdf; 

use Dompdf\Options; 

use Dompdf\FontMetrics; 

$options = new Options(); 
$options->set('isPhpEnabled', 'true'); 

$dompdf = new Dompdf($options); 


function number_to_word($n){
$a=$n;
$w="";
$crore=(int)($n/10000000);
$n=$n%10000000;
$w.=get_word($crore,"Crore ");
$lakh=(int)($n/100000);
$n=$n%100000;
$w.=get_word($lakh,"Lakh ");
$thousand=(int)($n/1000);
$n=$n%1000;
$w.=get_word($thousand,"Thousand  ");
$hundred=(int)($n/100);
$w.=get_word($hundred,"Hundred ");
$ten=$n%100;
$w.=get_word($ten,"");
$w.="Rupees ";
$v=explode(".",$a);
if(isset($v[1])){
if(strlen($v[1])==1)
{
$v[1]=$v[1]*10;
}
$w.=" and ".get_word($v[1]," Paisa");
}
return $w." Only";
}

function get_word($n,$txt){
$t="";
if($n<=19){
$t=words_array($n);
}else{
$a=$n-($n%10);
$b=$n%10;
$t=words_array($a)." ".words_array($b);
}
if($n==0){
$txt="";
}
return $t." ".$txt;
}

function words_array($num){
$n=[0=>"", 1=>"One", 2=>"Two", 3=>"Three", 4=>"Four", 5=>"Five", 6=>"Six", 7=>"Seven", 8=>"Eight", 9=>"Nine", 10=>"Ten", 11=>"Eleven", 12=>"Twelve", 13=>"Thirteen", 14=>"Fourteen", 15=>"Fifteen", 16=>"Sixteen", 17=>"Seventeen", 18=>"Eighteen", 19=>"Nineteen", 20=>"Twenty", 30=>"Thirty", 40=>"Forty", 50=>"Fifty", 60=>"Sixty", 70=>"Seventy", 80=>"Eighty", 90=>"Ninety", 100=>"Hundred",];
return $n[$num];
}



$selectcom="SELECT * FROM `account` WHERE id='1'";
$run_cim=mysqli_query($conn,$selectcom);
$rowcom=mysqli_fetch_array($run_cim);

$com_name=$rowcom['companyname'];
$address=$rowcom['address'];
$district=$rowcom['district'];
$pin_code=$rowcom['pincode'];
$state=$rowcom['state'];
$Phone=$rowcom['phoneno'];
$email_id=$rowcom['emailid'];
$gst_num=$rowcom['gstnumber'];



$ubank_name=$rowcom['bankname'];
$ua_c_no=$rowcom['bankno'];
$uifc_code=$rowcom['ifsccode'];
$logo=$rowcom['logo'];

$sql = "SELECT * FROM `invoice` WHERE id='$invupid'";  
$result = mysqli_query($conn, $sql);  
$row_inv = mysqli_fetch_array($result);

$uin_no=$row_inv['invoicenum'];
$uinv_date=$row_inv['invoicedate'];
$displaytype=$row_inv['type'];
$input = $uinv_date;
$date = strtotime($input);
$uinv_date=date('d-m-Y', $date);


$customercode=$row_inv['customer'];

$selectid="SELECT * FROM `customer` WHERE code='$customercode'";
$run_id=mysqli_query($conn,$selectid);
$row_customerid=mysqli_fetch_array($run_id); 

$ucom_nam=$row_customerid['name'];
$ugst_num=$row_customerid['gstno'];
$upin_code=$row_customerid['pincode'];
$ucus_phone=$row_customerid['phono'];
$ucompany_address=$row_customerid['address'];


$output='';

$allqty=0;
$granttotal=0;
$totalprice='';
$taxableamt=0;
$overalltaxtotal=0;


$partname=$row_inv['name'];
$part_hsn=$row_inv['hsn'];
$part_quan=$row_inv['qty'];
$part_price=$row_inv['sellingprice'];
$part_tax=$row_inv['gst'];



$str_partname =explode("@@@@",$partname);
$str_pro_hsn =explode("@@@@",$part_hsn);
$str_pro_quan =explode("@@@@",$part_quan);
$str_pro_tax =explode("@@@@",$part_tax);
$str_pro_price =explode("@@@@",$part_price);

$itemcount=count($str_partname);

for($i=0;$i<$itemcount;$i++)
{
	
	 $allqty=$allqty+$str_pro_quan[$i];  
	 $pricenew=$str_pro_price[$i];
	
	
		$salprice=$str_pro_quan[$i]*$pricenew;
		$num2=$str_pro_tax[$i]*$salprice;
		$gstval=$num2/100;

		$totalprice=$salprice+$gstval;      
		$j=$i+1;
	
	 $salprice=number_format($salprice,2);
		$salprice=str_replace(",","",$salprice);

		$gstval=number_format($gstval,2);
		$gstval=str_replace(",","",$gstval);

		$totalprice=number_format($totalprice,2);
		$totalprice=str_replace(",","",$totalprice);  

		$pricenew=number_format($pricenew,2);
		$pricenew=str_replace(",","",$pricenew);
	
	 $pricenew1=$str_pro_quan[$i]*$pricenew;
	
	 $taxableamt=$taxableamt+$pricenew1;
	
	 $distax=$str_pro_tax[$i]/2;
		$distaxamt=$gstval/2;

		$distaxamt=number_format($distaxamt,2);
		$distaxamt=str_replace(",","",$distaxamt);

	 $overalltaxtotal=$overalltaxtotal+$distaxamt;
	
		$granttotal=$granttotal+$totalprice;
	
	
	 $output .= '<tr class="productdisplay">
		<td class="textcenter marginnone" style="width:5%;"><p class="marginnone">'.$j.'</p></td>
		<td class="textleft marginnone" style="width:30%;"><p class="marginnone">&nbsp;&nbsp;'.$str_partname[$i].'</p></td>
		<td class="textcenter marginnone" style="width:10%;"><p class="marginnone">'.$str_pro_hsn[$i].'</p></td>
		<td class="textcenter marginnone" style="width:5%;"><p class="marginnone">'.$str_pro_quan[$i].'</p></td>
		<td class="textcenter  marginnone" style="width:6%;"><p class="marginnone">'.$pricenew.'</p></td>
		<td class="textcenter  marginnone" style="width:6%;"><p class="marginnone">'.$distax.' %<br>'.$distaxamt.'</p></td>
		<td class="textcenter  marginnone" style="width:6%;"><p class="marginnone">'.$distax.' %<br>'.$distaxamt.'</p></td>
		<td class="textcenter marginnone" style="width:11%;border-right:0px solid #5f5f5f ! important;"><p class="marginnone">'.$totalprice.'</p></td>
		</tr>';
	
	
}


$emptycount=15-$itemcount;
$y=$itemcount;

for($z=0;$z<$emptycount;$z++)
{
$y=$y+1;
$output .= '<tr class="productdisplay1 productdisplay">
<td class="textright" style="width:5%;"><p>'.$y.'</p></td>
<td class="textleft" style="width:30%;"><p></p></td>
<td class="textleft" style="width:6%;"><p></p></td>
<td class="textright" style="width:5%;"><p></p></td>
<td class="textright" style="width:6%;"><p></p></td>
<td class="textright" style="width:6%;"><p></p></td>
<td class="textright" style="width:6%;"><p></p></td>
<td class="textright borderrightnone" style="width:11%;border-right:0px solid #5f5f5f ! important;"><p></p></td>
</tr>';

}


$overalltaxtotal=number_format($overalltaxtotal,2);
$overalltaxtotal=str_replace(",","",$overalltaxtotal);



$labourname=$row_inv['labourname'];
$description=$row_inv['description'];
$cost=$row_inv['cost'];
$labourgst=$row_inv['labourgst'];



$str_cost =explode("@@@@",$cost);
$str_labourgst =explode("@@@@",$labourgst);

$itemcount=count($str_cost);

$labourcost=0;
$discount_amount=$row_inv['overalldiscount'];

for($i=0;$i<$itemcount;$i++)
{
	
      $price = $str_cost[$i];
      $tax = $str_labourgst[$i];

      $num2 = $tax * $price;
      $total2 = $num2 / 100;
      $distotal = $price + $total2;
    
      $distotal=number_format($distotal,2);
      $distotal=str_replace(",","",$distotal);
    
      $labourcost=$labourcost+$distotal;
	 
}


$granttotal=$granttotal+$labourcost;

$granttotal=$granttotal-$discount_amount; 


$labourcost=number_format($labourcost,2);
$labourcost=str_replace(",","",$labourcost);

$discount_amount=number_format($discount_amount,2);
$discount_amount=str_replace(",","",$discount_amount);


$granttotal=number_format($granttotal,2);
$granttotal=str_replace(",","",$granttotal);

$granttotalr=number_format($granttotal,0);
$granttotalr=str_replace(",","",$granttotalr);



$displayhtml='

<p class="textcenter marginnone taxinvoice">'.$displaytype.'</p>

<div class="border2 mb-1">
<table>
<tbody>
<tr>
  <th colspan="1" style="width:20%;"><img src="../assets/images/logo/'.$logo.'"  class="logo"></th>
   <th  colspan="5" class="textcenter" style="width:58%;">
   <h3 class="marginnone  comname">&nbsp;'.$com_name.'
   <p class="haddress marginnone">'.$address.',<br>'.$district.'-'.$pin_code.'
   '.$state.',<br><span class="emailphone">
   &nbsp;Phone : '.$Phone.',&nbsp;Email : '.$email_id.'
    </span></p></h3></th>
 <th colspan="1" style="width:22%;"><p class="gstdesign">GSTIN : '.$gst_num.'</p></th>     
</tr>
</tbody>
</table>
</div>



<table>
<tr>

<td style="width:60%;">

<div class="border2  mb-1">
<table>
<tbody>
<tr class="taxtax">
<td colspan="4">
<table class="borderhide">

		  <tr class="textleft">
    <th class="textleft" style="width:10%;"><p class="Buyer">To : </p></th>
    <th class="textleft" style="width:90%">
    <p class="marginnone todesign"><b>'.$ucom_nam.'&nbsp;</b></p>
    <p class="marginnone todesign"><b>'.$ucompany_address.'&nbsp;</b></p>
    <p class="marginnone todesign"><b>'.$upin_code.'&nbsp;</b></p>
    </th>
  </tr>
		
		<tr class="textleft">
    <th class="textleft" style="width:10%;"></th>
    <th class="textleft" style="width:90%;">
    <table class="borderhide">    
    <tr>
    <th class="textleft normaltext" style="width:35%;">Phone No.</th>
    <th class="textleft normaltext" style="width:2%;"> : </th>
    <th class="textleft normaltext" style="width:63%;">'.$ucus_phone.'</th>
    </tr>
    </table>
    </th>
  </tr>
		
		<tr class="textleft">
    <th class="textleft" style="width:10%;"></th>
    <th class="textleft" style="width:90%;">
    <table class="borderhide">    
    <tr>
    <th class="textleft normaltext" style="width:35%;">CU-GST</th>
    <th class="textleft normaltext" style="width:2%;"> : </th>
    <th class="textleft normaltext" style="width:63%;">'.$ugst_num.'</th>
    </tr>
    </table>
    </th>
  </tr>
		
 </table> 
</td>

				</table>
  </div>
</td>



<td style="width:40%;">
  <div class="border2  mb-1" style="padding:20px 10px;">
				<table>

     <tr class="textleft">
     <th class="textleft normaltext" style="width:40%;">Invoice No.</th>
     <th class="textleft normaltext" style="width:2%;">:</th>
     <th class="textleft normaltext" style="width:50%;">'.$uin_no.'</th>
  		 </tr>

     <tr>
    <th class="textleft normaltext" style="width:38%;">Date</th>
    <th class="textleft normaltext" style="width:2%;">:</th>
    <th class="textleft normaltext" style="width:60%;">'.$uinv_date.'</th>
    </tr>

   </table>
			</div>
			</td>




</tr>
</tbody>
</table>


<div class="border3 mb-1">
<table>

<tr class="productdisplay">
<th class="textcenter borderright borderbottom" style="width:3%;"><p>S.N0.</p></th>
<th class="textleft borderright borderbottom" style="width:25%;"><p>&nbsp;&nbsp;Description of Goods</p></th>
<th class="textcenter borderright borderbottom" style="width:5%;"><p>HSN</p></th>
<th class="textcenter borderright borderbottom" style="width:5%;"><p>Qty.</p></th>
<th class="textcenter borderright borderbottom" style="width:10%;"><p>Price</p></th>
<th class="textcenter borderright borderbottom" style="width:8%;"><p>CGST</p></th>
<th class="textcenter borderright borderbottom" style="width:8%;"><p>SGST</p></th>
<th class="textcenter borderrightnone borderbottom" style="width:11%;"><p>Total</p></th>
</tr>

'.$output.'

<tr class="productdisplay2">
<th class="textcenter bordertop borderright" style="width:5%;"></th>
<th class="textcenter bordertop borderright" style="width:30%;"><p>Sub Total</p></th>
<th class="textleft bordertop borderright" style="width:6%;"><p></p></th>
<th class="textcenter bordertop borderright" style="width:5%;"><p>'.$allqty.'</p></th>
<th class="textcenter bordertop borderright" style="width:6%;"><p>'.$taxableamt.'</p></th>
<th class="textcenter bordertop borderright" style="width:6%;"><p>'.$overalltaxtotal.'</p></th>
<th class="textcenter bordertop borderright" style="width:6%;"><p>'.$overalltaxtotal.'</p></th>
<th class="textcenter bordertop" style="width:11%;"><p>'.$granttotal.'</p></th>
</tr>


<tr class="productdisplay2">
<th class="textcenter bordertop borderright" style="width:5%;"></th>
<th colspan="6" class="textright bordertop borderright" style="width:30%;"><p>Labour Cost &nbsp;&nbsp;</p></th>

<th class="textcenter bordertop" style="width:11%;"><p>'.$labourcost.'</p></th>
</tr>


<tr class="productdisplay2">
<th class="textcenter bordertop borderright" style="width:5%;"></th>
<th colspan="6" class="textright bordertop borderright" style="width:30%;"><p>Discount Amount &nbsp;&nbsp;</p></th>

<th class="textcenter bordertop" style="width:11%;"><p>'.$discount_amount.'</p></th>
</tr>

<tr class="productdisplay2">
<th class="textcenter bordertop borderright" style="width:5%;"></th>
<th colspan="6" class="textright bordertop borderright" style="width:30%;"><p>Round Off &nbsp;&nbsp;</p></th>

<th class="textcenter bordertop" style="width:11%;"><p>'.$granttotalr.'</p></th>
</tr>

</table>
</div>


<div class="border3 mb-1 padding1">
<table>
<tr>
<td colspan="8" class="marginnone"><p class="amounttext marginnone"><b>&nbsp;&nbsp;&nbsp;(Rupees '.number_to_word($granttotalr).' only)</b></p></td>
</tr>
</table>
</div>



<div class="border3 mb-1 padding1">
&nbsp;&nbsp;&nbsp;<b><u>BANK A/C DETAILS</u></b>
<table>
<tr>
<td colspan="3" class="marginnone normaltext textleft">&nbsp;&nbsp;&nbsp;Bank : '.$ubank_name.'</td>
<td colspan="3" class="marginnone normaltext textcenter">&nbsp;&nbsp;&nbsp;
A/C NO : '.$ua_c_no.'</td>
<td colspan="2" class="marginnone normaltext textright">IFSC : '.$uifc_code.'&nbsp;&nbsp;</td>
</tr>
</table>
</div>


<table>
<tr>
<td style="width:50%;">

<div class="border2  mb-1">
<p class="marginnone">Received the above goods in good Condition
<br>
<br>
<br>
<br>
Customer Signature with seal</p>
</div>
</td>


<td style="width:50%;">
<div class="border2  mb-1">
<p class="marginnone footerdesign" style="padding-left:40px;">for <b>'.$com_name.'</b>
<br>
<br>
<br>
<br>
Authorised Signatory</p>
</div>
</td>

</tr>
</table>
<p class="textcenter marginnone">This is a computer generated invoice</p>











<style>
.tabletaxamountsection table tr th
{
font-size:12px;
}

.tabletaxamountsection table tr td
{
font-size:12px;
}

.todesign
{
font-size:15px;
}

.taxinvoice{
font-size:12px;
}
.emailphone
{
font-size:12px ! important;
}
.bankdesign{
margin-top:10px ! important;
}
table {
    font-family: times new roman;
    border-collapse: collapse;
    width: 100%;
    
}
.padding1
{
padding:2px;
}
.amounttext
{
font-size:12px ! important;
padding-left:20px;
}
.border2{
border: 1px solid #5f5f5f;
border-radius:10px;
padding:10px;
}
.border3{
border: 1px solid #5f5f5f;
border-radius:10px;
}
.borderleft
{
border-left: 1px solid #5f5f5f;
padding:10px 0px;
}
.borderbottom1
{
border-bottom:1px solid #5f5f5f ! important;
}
.borderright
{
border-right: 1px solid #5f5f5f;
padding:10px 0px;
}
.borderbottom
{
border-bottom: 1px solid #5f5f5f;
padding:10px 0px;
}
.bordertop
{
border-top: 1px solid #5f5f5f;
padding:10px 0px;
}
.borderdis td,.borderdis th {
    border: 1px solid #5f5f5f;
    text-align:center;
    font-weight:550;
    font-size:15px;
}
.normaltext{
margin:0px;
padding:0px;
font-size:14px;
font-weight:400;
}

.mb-1
{
margin-bottom:5px;
}
.marginnone
{
margin:0px;
padding:0px;
}
.cusaddress{
font-weight:300;
font-size:13px;
margin:0px;
padding:0px;
margin-top:-7px;
}
.gstdesign
{
font-size:11px;
font-weight:600;
margin:0px;
padding:0px;
text-align:right;
margin-top:-45px;
}
.textleft
{
text-align:left ! important;
}
.textright
{
text-align:right ! important;
}
.textcenter
{
text-align:center ! important;
}
.original
{
margin-bottom:120px;
}
.Buyer
{
margin-top:0px;
}
.logo
{
width:70px;
height:70px;
margin-left:5px;
}
.taxinvoice
{
font-weight: 800;
padding-bottom:20px;
}
.taxtax p span
{
margin-right:10px;
line-height:20px;
font-weight:600;
}
.borderhide
{
border: 0px solid red ! important;
}
.borderhide tr th
{
border: 0px solid red ! important;
}
.productdisplay th p
{
font-weight:600;
font-size:12px;
margin:0px;
padding:0px;
}
.productdisplay2 th p
{
font-weight:600;
font-size:14px;
margin:0px;
padding:0px;
}
.productdisplay1 td p
{
  color:#ffffff;
  font-weight:600;
}
.bordertop
{
border-top: 1px solid #5f5f5f  ! important;
}
.productdisplay td p
{
font-size:12px;
margin:0px;
padding:0px;
}
.productdisplay td
{
border-right: 1px solid #5f5f5f  ! important;
}
.companynamm
{
font-size:14px ! important;
}
.authorised
{
font-size:14px ! important;
}
.buyerborder
{
border-bottom:1px solid #5f5f5f;
}
.haddress
{
font-size:12px ! important;
font-weight:500;
}
.spacetaxamountsection
{
margin-top:8px ! important;
}
</style>

';

$dompdf->loadHtml($displayhtml);
    
$dompdf->setPaper('A4', ''); 
 

$dompdf->render(); 

$canvas = $dompdf->getCanvas(); 
 
$fontMetrics = new FontMetrics($canvas, $options); 
 

$w = $canvas->get_width(); 
$h = $canvas->get_height(); 

$font = $fontMetrics->getFont('times'); 
 $text = ""; 

$txtHeight = $fontMetrics->getFontHeight($font, 150); 
$textWidth = $fontMetrics->getTextWidth($text, $font, 40); 

$canvas->set_opacity(.2); 
 
$x = (($w-$textWidth)/2); 
$y = (($h-$txtHeight)/2); 
 

$canvas->text($x, $y, $text, $font, 40,$color = array(255,0,0), $word_space = 0.0, $char_space = 0.0, $angle = 20.0); 
 

$dompdf->stream('document.pdf', array("Attachment" => 0));




?>
