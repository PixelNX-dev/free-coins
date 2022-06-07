<?php
function sendUserEmailMandrill($to='', $subject = '', $body = ''){
    $tos[] = array(
    'email' => $to,
    'name' => '',
    'type' => 'to'
    );
    $message = array(
    'html' => $body,	
    'subject' => $subject,
    'from_email' => 'support@song.digital',
    'from_name' => 'Payola',
    'to' =>$tos,
    ); 	   
    $POSTFIELDS = array(
    'key' => 'NtSxVXvKNB_5JQOjv5bFTw',
    'message' => $message
    );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://mandrillapp.com/api/1.0/messages/send.json');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POSTFIELDS));

    $headers = array();
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    curl_close($ch);
}

function generateString($len=8){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $len; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString;
}

function getImageExtension($imgName='a.jpg'){
    $temp = explode('.',$imgName);
    $temp = array_reverse($temp);
    return '.'.$temp[0];
}

function slugify($text){
	
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    if (empty($text)) {
      return 'n-a';
    }
    return $text;
  }
  
?>