<?php 



	include_once('util.php');
	$mysql=connect();
	$cuenta=$_POST['cuenta'];
	$password=$_POST['password'];
	$query="SELECT nombre,email FROM usuarios WHERE email='".$cuenta."' AND password='".$password."'";
	$result=showquery($query,$mysql);
	
	if(isset($result) && $result!=""){
		session_start();
		$_SESSION['name']=$result[0]['nombre'];
		$_SESSION['email']=$result[0]['email'];
		echo $result;
	}else{
		echo "no";
	}
	disconnect($mysql);

?>
