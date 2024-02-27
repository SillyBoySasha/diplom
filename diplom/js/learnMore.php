<?php


$num_res=0;
$name=clean($_POST["fio"]);
$email=clean($_POST["email"]);
$phone=clean($_POST["phone"]);
$comment=clean($_POST["comment"]);


if(!empty($name) && !empty($email) && !empty($phone) && !empty($comment)){
	$connection = new mysqli("localhost","root","","ugk");
	$result_n=$connection->query("SELECT * from Requests WHERE Email = '$email'");
	$name_res=$result_n->num_rows;
	if($name_res>0) {
		echo "<script>
		alert(\"Почта уже используется.\");
		history.pushState({}, '', 'http://diplom/index.html');
		location.reload();
		</script>";
	}else{
		if(filter_var($email,FILTER_VALIDATE_EMAIL)){
			$id_prep="SELECT COUNT(*) as total FROM `Requests`";

			$res = mysqli_query($connection,$id_prep);
			$row = mysqli_fetch_assoc($res);
			$id = $row['total']+1;
			$stmt=$connection->prepare("INSERT INTO `Requests` (`id`, `FIO`, `Email`, `Phone`, `Comment`) VALUES (?,?,?,?,?)");
			$stmt->bind_param("issss",$id,$name,$email,$phone,$comment);
			if($stmt->execute()){
				header("Location: http://diplom/index.html");
			}else{
				echo "<script>
				alert(\"Ошибка сервера, попробуйте позже\");
				history.pushState({}, '', 'http://diplom/index.html');
				location.reload();
				</script>";
			}


			
			$stmt->close();
			$connection->close();
		}else{
			echo "<script>
			alert(\"Не корректная почта.\");
			history.pushState({}, '', 'http://diplom/index.html');
			location.reload();
			</script>";
		}
	}
}else{
	echo "<script>
	alert(\"Заполните все поля.\");
	history.pushState({}, '', 'http://diplom/index.html');
	location.reload();
	</script>";
}






function clean($value = "") 
{ 
	$value = trim($value); 
	$value = stripslashes($value); 
	return $value; 
} 
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

?>