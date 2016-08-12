<?php
	function connect(){
		$mysql = mysqli_connect('localhost','root','C0d1ng4fUn','dawfinal');
		return $mysql;
	}

	function disconnect($mysql){
		mysqli_close($mysql);
	}

	function showquery($query,$mysql){
		$res=$mysql->query($query);
		if(mysqli_num_rows($res)>0){
			while ($row=mysqli_fetch_array($res, MYSQLI_BOTH)) {
				$table[]=$row;
			}		
			return $table;	
		}else{
			return false;
		}
		
	}

	function dropdown($name,$query,$mysql){
		$res=$mysql->query($query);
		$select='<select name="'.$name.'">';

		while($row=mysqli_fetch_array($res,MYSQLI_BOTH)){
			$select.='<option value="'.$row[0].'">'.$row[1].'</option>';
		}
		$select.='</select>';
		return $select;
	}

	function runquery($query,$mysql){
		$res=$mysql->query($query);
		if($res){
			$mensaje=1;
		}else{
			$mensaje=0;
		}
		return $mensaje;
	}
	
	function returnpsswd($email){
		$mysql = connect();
		$query = "select password from usuarios where email = '".$email."'";
		$res = $mysql->query($query);
		$holi = mysqli_fetch_array($res, MYSQLI_BOTH);
		return $holi[0];
	}	
?>
