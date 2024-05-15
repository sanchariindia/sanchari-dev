<?php
include_once("MysqliDb.php");
include_once("variable.php");

function msg($msg){  
    $rs = '<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4 style="font-size:13px;"><i class="icon fa fa-check"></i> Alert! '.$msg.'.</h4>
    </div>';
	return $rs;
}

function ErrorMsg($msg){ 
	$rs = '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4 style="font-size:13px;"><i class="icon fa fa-ban"></i> Alert! '.$msg.'.</h4>
    </div>';
	return $rs;
}

function viewProductAvailableQty($db,$productItem){
	$product = $db->rawQueryOne("SELECT SUM(`qty`)as cnt FROM `stock` where status=1 and product_item_id='".$productItem."' group by `product_item_id` order by product_item_id ");
	$item = $db->rawqueryOne("SELECT SUM(`qty`)as cnt FROM `order_item` where `product_item_id`='".$productItem."' and status=1 ");
	
	return $product['cnt']-$item['cnt'];	
}

function send_sms($mobile,$msg){	
	$apiKey = 'f3WKjX8p80CaWHtdchCNcA';
	$url = "http://88.99.209.80/http-tokenkeyapi.php?authentic-key=3133666573747368696e653733371570034962&senderid=FESTSN&route=2&number=".$mobile."&message=".$msg;
	$url = str_replace(" ", '%20', $url);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	$ret = curl_exec($ch);
	return $ret;
}

function resize($newWidth, $targetFile, $originalFile) {
    $info = getimagesize($originalFile);
    $mime = $info['mime'];
    switch ($mime) {
            case 'image/jpeg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;

            case 'image/png':
                    $image_create_func = 'imagecreatefrompng';
                    $image_save_func = 'imagepng';
                    $new_image_ext = 'png';
                    break;

            case 'image/gif':
                    $image_create_func = 'imagecreatefromgif';
                    $image_save_func = 'imagegif';
                    $new_image_ext = 'gif';
                    break;

            default: 
                    throw new Exception('Unknown image type.');
    }

    $img = $image_create_func($originalFile);
    list($width, $height) = getimagesize($originalFile);

    $newHeight = ($height / $width) * $newWidth;
    $tmp = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    if (file_exists($targetFile)) {
            unlink($targetFile);
    }
    $image_save_func($tmp, "$targetFile.$new_image_ext");
}

function getDiscount($db){
	$db->where('status',1);
	$r=$db->getOne('discount');
	return $r;
}

function SMSBalance()
{	
//	$apiKey = 'haC33rhngkmNJLUUgzOc9g';
//	$senderId = 'SSISCH';
//	$url = "http://182.18.143.25/api/mt/GetBalance?User=pockmart&Password=@pockmart";
//	$url = str_replace(" ", '%20', $url);
//	$ch = curl_init();
//	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//	curl_setopt($ch, CURLOPT_URL, $url);
//	$ret = curl_exec($ch);
//	$res = json_decode($ret);
//	return $res->Balance;
}


function sendSMS($mobile,$msg){	
	$apiKey = 'haC33rhngkmNJLUUgzOc9g';
	$senderId = 'PKMART';
	$url = "http://mysms.msg24.in/api/mt/SendSMS?user=pockmart&password=@pockmart&senderid=".$senderId."&channel=trans&DCS=0&flashsms=0&number=".$mobile."&text=".$msg."&route=08";
	$url = str_replace(" ", '%20', $url);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	$ret = curl_exec($ch);
	//print_r($ret);
	//die;
	return $ret;
}

function sendSmsHindi($mobile,$msg){	
	$apiKey = 'haC33rhngkmNJLUUgzOc9g';
	$senderId = 'PKMART';
	$url = "http://mysms.msg24.in/api/mt/SendSMS?user=pockmart&password=@pockmart&senderid=".$senderId."&channel=trans&DCS=8&flashsms=0&number=".$mobile."&text=".$msg."&route=08";
	$url = str_replace(" ", '%20', $url);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	$ret = curl_exec($ch);
	return $ret;
}


function getOrderByid($db,$orderId){
	$db->where('id',$orderId);
	$r=$db->getOne('tbl_order');
	
	$db->where("order_id",$r['id']);
	$rss = $db->get('order_item');

	foreach($rss as $s){
//		$db->where("id",$s['product_item_id']);
//		$item = $db->getOne('product_item');

		$db->where("id",$s['product_id']);
		$p = $db->getOne('product');

		$db->where("id",$p['category_id']);
		$cat = $db->getOne('category');
	
		$order[]= array("product_name"=>$p['product_name'],"price"=>$s['price'],"quantity"=>$s['qty'],"size"=>$s['size'],'category_name'=>$cat['category_name']);
	}
	
		//$tax = array(array("tax_name"=>strtoupper("cgst"),"tax_value"=>$r['cgst'],"tax_amount"=>$r['gst_amount']),array("tax_name"=>strtoupper("sgst"),"tax_value"=>$r['sgst'],"tax_amount"=>$r['sgst_amount']),array("tax_name"=>strtoupper("gst"),"tax_value"=>$r["gst"],"tax_amount"=>$r['gst_amount']));
		
		$array = array("order_id"=>$r['id'],'receiver_name'=>$r['receiver_name'],'receiver_address'=>$r['receiver_address'],'receiver_phone'=>$r['receiver_phone'],"date"=>$r['date'],"payment_id"=>$r['payment_id'],"payment_state"=>$r['payment_state'],"sub_amount"=>$r['sub_amount'],"payment_amount"=>$r['payment_amount'],"discount_name"=>$r['discount_name'],"discount_amount"=>$r['discount_amount'],"discount_type"=>$r['discount_type'],"discount_amount_calculated"=>$r['discount_amount_calculated'],"details"=>$order);
		return $array;
}



function getFieldValue($db,$table,$wh_field,$wh_field_val,$field){
	$db->where($wh_field,$wh_field_val);
	$rs = $db->getOne($table);
	return $rs[$field];
	}

function getDataByid($db,$tbltable,$field,$value){
	$db->where("status",1);
	$db->where($field,$value);
	return $db->get($tbltable);	
}

function getVendors($db,$tblAdmin){
	$db->where("role",2);
	$db->where("status",1);
	return $db->get($tblAdmin);	
}


function changeDateFormate($date){
	return $newDate = date("d-m-Y", strtotime($date));
}

function changeDateFormateSql($date){
	return $newDate = date("Y-m-d", strtotime($date));
}

function getToken($qtd){
$Caracteres = 'abcdefghijklmnopqrstuvwxyz0123456789';
$QuantidadeCaracteres = strlen($Caracteres);
$QuantidadeCaracteres--;
$Hash=NULL;
    for($x=1;$x<=$qtd;$x++){
        $Posicao = rand(0,$QuantidadeCaracteres);
        $Hash .= substr($Caracteres,$Posicao,1);
    }
return $Hash;
} 

function getTimeInterval($datetime2){

		$date_time1 = new DateTime();
		$date_time2 = new DateTime($datetime2);
		$interval = $date_time1->diff($date_time2);
		$minute = $intervals = $date_time1->diff($date_time2)->i;
		$hour =  $intervals = $date_time1->diff($date_time2)->h;
		return ($hour*60)+$minute;	
}





function convert_number_to_words($number) {
    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
       2                   => 'two',

       3                   => 'three',
        4                   => 'four',
       5                   => 'five',

        6                   => 'six',

        7                   => 'seven',

        8                   => 'eight',

        9                   => 'nine',

        10                  => 'ten',

        11                  => 'eleven',

        12                  => 'twelve',

        13                  => 'thirteen',

        14                  => 'fourteen',

        15                  => 'fifteen',

        16                  => 'sixteen',

        17                  => 'seventeen',

        18                  => 'eighteen',

        19                  => 'nineteen',

        20                  => 'twenty',

        30                  => 'thirty',

        40                  => 'fourty',

        50                  => 'fifty',

        60                  => 'sixty',

        70                  => 'seventy',

        80                  => 'eighty',

        90                  => 'ninety',

        100                 => 'hundred',

        1000                => 'thousand',

        1000000             => 'million',

        1000000000          => 'billion',

        1000000000000       => 'trillion',

        1000000000000000    => 'quadrillion',

        1000000000000000000 => 'quintillion'

    );

    if (!is_numeric($number)) {

        return false;

    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {

        // overflow

        trigger_error(

            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,

            E_USER_WARNING

        );

        return false;

    }





   if ($number < 0) {

        return $negative . convert_number_to_words(abs($number));

    }





   $string = $fraction = null;

    if (strpos($number, '.') !== false) {

        list($number, $fraction) = explode('.', $number);

    }

    switch (true) {

        case $number < 21:

            $string = $dictionary[$number];

           break;

        case $number < 100:

            $tens   = ((int) ($number / 10)) * 10;

            $units  = $number % 10;

            $string = $dictionary[$tens];

            if ($units) {

                $string .= $hyphen . $dictionary[$units];

            }

            break;

        case $number < 1000:

            $hundreds  = $number / 100;

            $remainder = $number % 100;

            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];

            if ($remainder) {

                $string .= $conjunction . convert_number_to_words($remainder);

            }

            break;

        default:

            $baseUnit = pow(1000, floor(log($number, 1000)));

            $numBaseUnits = (int) ($number / $baseUnit);

            $remainder = $number % $baseUnit;

            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];

            if ($remainder) {

                $string .= $remainder < 100 ? $conjunction : $separator;

                $string .= convert_number_to_words($remainder);

            }

            break;

    }



    if (null !== $fraction && is_numeric($fraction)) {

        $string .= $decimal;

        $words = array();

        foreach (str_split((string) $fraction) as $number) {

            $words[] = $dictionary[$number];

        }

        $string .= implode(' ', $words);

    }

    return $string;

}

function sendFCMessage($device_id,$bodymsg,$title){
    //echo "Outside::".$device_id.",".$bodymsg.",".$title;
    $msg = array
          (
                'body'  => $bodymsg,
                'title' => $title
          );
    $fields = array
            (
                'to'        => $device_id,
                'notification'  => $msg
            );
    $headers = array
            (
                'Authorization: key=' . "AAAAF6nN_7w:APA91bH713HNfVX-YUS11RlDR1SjHiihp5m1FgEjUyHAramJGTIq39cdXRZfYGXt20FN2rLUStVBEuL5_yDBxFqutZ97XCQxAGyhEMCBKoJD6X0fc0h5D9yJK8u1x5JJsP8p9jpWPrjQ",
                'Content-Type: application/json'
            );
    #Send Reponse To FireBase Server
            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
            curl_setopt( $ch,CURLOPT_POST, true );
            curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
            $result = curl_exec($ch );
            curl_close( $ch );
    #Echo Result Of FireBase Server
    echo $result;   
    //return true;
}

