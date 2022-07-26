<?php
/*
 * ZarinPal Advanced Class
 *
 * version 	: 1.0
 * link 	: https://vrl.ir/zpc
 *
 * author 	: milad maldar
 * e-mail 	: miladworkshop@gmail.com
 * website 	: https://miladworkshop.ir
*/

require_once("zarinpal_function.php");
include('./inc/functions.php');

$order_id=	$_GET['order_id_for_verify'];

if($_GET['Status'] == 'OK') {
    $MerchantID = 'XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX';
    $Amount = $_GET['Amount']; //Amount will be based on Toman
    $Authority = $_GET['Authority'];
    $ZarinGate 		= false;
    $SandBox 		= false;

    $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

    $result = $client->PaymentVerification(
        [
            'MerchantID' => $MerchantID,
            'Authority' => $Authority,
            'Amount' => $Amount,
        ]);

}
$zp 	= new zarinpal();
$result = $zp->verify($MerchantID, $Amount, $SandBox, $ZarinGate);

if (isset($result["Status"]) && $result["Status"] == 100)
{
	// Success
	echo "تراکنش با موفقیت انجام شد";
	echo "<br />مبلغ : ". $result["Amount"];
	echo "<br />کد پیگیری : ". $result["RefID"];
	echo "<br />Authority : ". $result["Authority"];
    $RefID  = $result["RefID"];
    if(isset($conn)){
        mysqli_query($conn,"UPDATE order_tbl SET `order_is_verified`='true', `refid`='$RefID' WHERE `order_id`='$order_id' ");
    }
} else {
	// error
	echo "پرداخت ناموفق";
	echo "<br />کد خطا : ". $result["Status"];
	echo "<br />تفسیر و علت خطا : ". $result["Message"];
}