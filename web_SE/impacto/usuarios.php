<?php

	session_start();

	$usr = array(
		"d5469feb2ec835449389d84cf2db09c0b4d545a9dea564189a50332de5cf0eec" => array(
							"pass" => "e3629744e911ffbe5ceb6dc4a569d269cee0d6bc9a3123091d62b42086d2be2f",
							"nombre" => "Hector Beltran"
							),

		"30c402fa0fc6120f0966495db6de994ff6101a3b15427d10ccad6b0cb526d28f" => array(
							"pass" => "5d3e03ed41e36d55f461f05bbed80ac8ca31ad27f568f7a101715e12e44c4fab",
							"nombre" => "Jesus Serrano"
							),
		"8f68e8779e83450f02a9c769555468014b4c5bd8838c98734c5b5de74070888b" => array(
							"pass" => "53fbe28b9e4a9d6ea8fac7ef0dc227824fcdfc9133d863d62627f3563a9a5acf",
							"nombre" => "Veronica Flores"
							),
		"50d6aa3907b2b5ec0425d30e74bf925c00e547571acaafb83c1d37a2f948ef51" => array(
							"pass" => "5c02d2419bfc5cff23b671a93bba4eded6ad65a3a213439d7c7b6624e1e91826",
							"nombre" => "Eugenio Almanza"
							),
		"2fa026f9b33c2575815d482bf7e46506cca9ae0d429b6d18ed49134b3de2c26a" => array(
							"pass" => "e426b2fd052a42514f96aedf74f031f0daaaf5681ba2e6220cfdbe48dd9092f1",
							"nombre" => "Azucena Escobedo"
							)
	);

	$usrActual = "";
	$idUsr = "";

	if(strlen($_POST["usuario"])*strlen($_POST["pass"])){
		$usuario = hash("sha256", $_POST["usuario"]);
		$passw = hash("sha256", $_POST["pass"]);

		if($usr[$usuario]["pass"] == $passw){
			$usrActual = $usr[$usuario]["nombre"];
			$idUsr = $_POST["usuario"];
			$_SESSION["usrActual"] = $usrActual;
			$_SESSION["usrID"] = $idUsr;
			$_SESSION["principal"] = "archivos";
			header("Location: misArchivos.php");
		}
		else{
			$_SESSION["MSG_ERR"] = "<br><br>El usuario o contraseña que ingreso son incorrectos.";
			header("Location: index.php");
		}
	}
	else{
		$_SESSION["MSG_ERR"] = "<br><br>Por favor ingrese su usuario y su contraseña.";
		header("Location: index.php");
	}

?>