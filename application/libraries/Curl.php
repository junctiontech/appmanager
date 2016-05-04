<?php 
class Curl
{
	function restCurl($username,$password,$method,$url=false,$param=false,$param2=false)
	{	echo 'curl';die;
	  if($param=='')
   	  {
		$param='';
	  }
	  $ch = curl_init(); // create curl handle
	  $url = $url;
	  curl_setopt($ch,CURLOPT_URL,$url);
	  curl_setopt($ch,CURLOPT_POST, true);
	  curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query(array( 'OrganizationData'=>$param,'ApplicationData'=>$param2 )));
	  curl_setopt($ch, CURLOPT_USERPWD, $username . ':' . $password);
	  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
	  curl_setopt($ch, CURLOPT_FRESH_CONNECT, true); 
	  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
	  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,600); //timeout in seconds
	  curl_setopt($ch,CURLOPT_TIMEOUT,600 ); // same for here. Timeout in seconds.
	  $response = curl_exec($ch);
	  curl_close ($ch); //close curl handle
	  echo  $response;
	  return;
	}
	
}