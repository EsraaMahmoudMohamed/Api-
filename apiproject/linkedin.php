
<?php

$url='https://www.linkedin.com/oauth/v2/accessToken';

$arrayapi=array('grant_type'=>urlencode('authorization_code'),
	'code'=>$_GET['code'],
	'redirect_uri'=>urlencode('http://apiproj.com/linkedin.php'),
	'client_id'=>urlencode('78z0ebmhlpwa0u'),
	'client_secret'=>urlencode('pt9cnhdPYqQIF2Of'));

$field_string="";
foreach($arrayapi as $key=>$value)
{

	$field_string=$field_string.$key.'='.$value.'&';

}
$field_string=rtrim($field_string,'&');



$ch=curl_init();

curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$field_string);
$tokenResult=curl_exec($ch);
$tokenResult=json_decode($tokenResult,true);
curl_close($ch);
//-------------------------------
// echo $tokenResult;

// $ch=curl_init();
// curl_setopt($ch,CURLOPT_HTTPHEADER,array('authorization:Bearer'.$tokenResult['access_token'],'connection:Keep-Alive' ));
// $result=curl_exec($ch);

// echo $result;
// curl_close($ch);
//-------------------------------------------

//--------------------
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL,'https://api.linkedin.com/v1/people/~:(firstName,num_connections,picture-url,id,email-address)?format=json' );

curl_setopt($ch,CURLOPT_HTTPHEADER,array('Authorization: Bearer '.$tokenResult['access_token'],'Connection: Keep-Alive' ));
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $result=curl_exec($ch);
 
 $result=json_decode($result,true);
$email=$result['emailAddress'];
$name=$result['firstName'];
header("Location:linkedincheck.php?name=".$name."&email=".$email."");

print_r($result);
curl_close($ch);

// header("location:welcom.php");

?>
