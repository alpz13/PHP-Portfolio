<?php
include_once('util.php');

	$email=$_POST['username'];
	$pass=$_POST['passwd'];
	$nombre=$_POST['nombre'];
	$accion = $_POST['accion'];
	if($accion=='registro'){
		$query="SELECT COUNT(*) cuantos FROM usuarios WHERE email='".$email."'";
	
		$mysql=connect();
		$res=showquery($query,$mysql);

		if(isset($res) && $res!=""){
			if($res[0]['cuantos']!=0){
				echo "repetido";
			}else{
				$query="INSERT INTO usuarios VALUES('".$email."','".$nombre."', '".$pass."')";
				$result=runquery($query,$mysql);
				if($reult==1){
					echo "ok";				
				}else{
					echo "error al insertar";
				}
			}	
		}
	}
	else if ($accion=='actualizar'){
		$mysql=connect();
		$query = "Select count(*) cuantos from usuarios where email ='".$email."'";
		$res = showquery($query,$mysql);
		if(isset($res) && $res!=""){
			if($res[0]['cuantos']!=0){
				$query = "Update usuarios set email='".$email."', nombre='".$nombre."', password='".$pass."' where email='".$email."'";
				$result = runquery($query, $mysql);
				if($result ==1 ){
					echo "ok2";
				}else{
					echo "error al actualizar";
				}
			}
			else{
				$query="INSERT INTO usuarios VALUES('".$email."','".$nombre."', '".$pass."')";
				$result=runquery($query,$mysql);
				if($result==1){
					echo "ok2";				
				}else{
					echo "error al actualizar";
				}
			}
		}
	}
	disconnect($mysql);
?>
