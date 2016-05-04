<?php
include(APPPATH.'libraries/curl.php');
Class Rest extends Curl
{
	function __construct($config)
	{
		$this->data['']=$config;
	}
		/*---------------------- Start function for insert data ------------------------*/
	  function post($method,$data1,$data2=false)
	  {
		 $username= $this->data['']['http_user'];
		 $password= $this->data['']['http_pass'];
		 $host= $this->data['']['server'];
		 $url = $url = "$host/restAPI/rest_post";
		 $param1= json_encode($data1);
		 $param2= json_encode($data2);
		 $response=$this->restCurl($username,$password,$method,$url,$param1,$param2);
		/*  $json=json_decode($response);
		 if($json->DatabaseName)
		 {
			 $this->cloneDB('post',$json->DatabaseName);
		 }
		 else
		 {
			 echo 'error';die;
		 } */
	  }
	  /*---------------------- End function for insert data ------------------------*/
	  
	  /*---------------------- Start function for fetch data ------------------------*/
	  function get($method=false,$param=false)
	  {		
			$username= $this->data['']['http_user'];
			$password= $this->data['']['http_pass'];
			$host= $this->data['']['server'];
			//$apiKey= $this->data['']['api_key'];
			if($param)
			{
				$url = "$host/RestAPI/rest/$apiKey/$param";
			}
			else
			{
				$url = "$host/RestAPI/rest/$apiKey";
			}
		  $this->restCurl($username,$password,$method,$url);return;
	  }
	   /*---------------------- End function for fetch data ------------------------*/
	  
	   /*---------------------- Start function for delete data ------------------------*/
	  function delete($method,$param)
	  {	
		$username= $this->data['']['http_user'];
		$password= $this->data['']['http_pass'];
		$host= $this->data['']['server'];
		//$apiKey= $this->data['']['api_key'];
	 	$url = "$host/RestAPI/rest/$apiKey/$param";
	    $this->restCurl($username,$password,$method,$url);return;
	  }
	   /*---------------------- End function for fetch data ------------------------*/
	   
	   
	    /*---------------------- Start function for clone data ------------------------*/
	  function cloneDB($method,$param)
	  {	
		$username= $this->data['']['http_user'];
		$password= $this->data['']['http_pass'];
		$host= $this->data['']['server'];
	//	$apiKey= $this->data['']['api_key'];
	 	$url = "$host/restAPI/rest/$apiKey/$param";
	    $this->restCurl($username,$password,$method,$url);return;
	  }
	   /*---------------------- End function for fetch data ------------------------*/
}