<?php
	$QualityOfBread = $_POST['QualityOfBread'];
	$QualityOfBuns = $_POST['QualityOfBuns'];
	$NameSurname = $_POST['NameSurname'];
	
	//Database connection

	$conn = new mysqli('localhost','root','','assessment');
	if($conn->connect_error){
		die('connection Failed : '$conn->connect_error);
	}
	else{
		$stmt = $conn->prepare("inset into registration(QualityOfBread, QualityOfBuns, NameSurname)
		values(?, ?,?)");
		$stmt->bind_param("2items", $QualityOfBread, $QualityOfBuns, $NameSurname);
		$stmt->execute();
		$conn->close();
	}
	//Contacting email
	if((isset($_POST['QualityOfBread']) && !empty($_POST['QualityOfBread']))
		(isset($_POST['QualityOfBuns']) && !empty($_POST['QualityOfBuns']))
		(isset($_POST['NameSurname']) && !empty($_POST['NameSurname']))){
			$QualityOfBread = $_POST['QualityOfBread'];
			$QualityOfBuns = $_POST['QualityOfBuns'];
			$NameSurname = $_POST['NameSurname'];
			$message = $_POST['message'];
			
			$to = "mangenadougals59@gmail.com";
			$headers = "From : " - $NameSurname;
			
			if( mail($to, $QualityOfBread, $QualityOfBuns, $NameSurname)){
				echo "E-mail sent successfully!
			}
			
		}
?>