	<?php
	session_start();
	$dirUpld = $_SESSION["principal"]."/".$_SESSION["usrID"];
	
	if($_FILES['archivo']['error'] == 0 && $_FILES['archivo']['size'] < 8388608){
		
		if(!file_exists($dirUpld)) mkdir($dirUpld);

		$up_file = $dirUpld ."/". basename($_FILES['archivo']['name']);

		if(move_uploaded_file($_FILES['archivo']['tmp_name'], $up_file)){
			
			$_SESSION["MSG_ERR"] = "<br>El archivo fue cargado correctamente.";
			$file_info_path = pathinfo(basename($_FILES['archivo']['name']));

			$error_info = "";

			if($file_info = fopen($dirUpld."/".$file_info_path["filename"].".txt", "w")){
				fwrite($file_info, "<span style=\"font-weight: bold; font-size: 1.5rem; color: #cd171e\">Fecha de subida: </span>".date("d-m-Y"));
				fwrite($file_info, "<br><span style=\"font-weight: bold; font-size: 1.5rem; color: #cd171e\">Subido por: </span>".$_SESSION["usrActual"]);
				if(!empty($_POST["descripcion"])) fwrite($file_info, "<br><span style=\"font-weight: bold; font-size: 1.5rem; color: #cd171e\">Descripción:<br></span>".$_POST["descripcion"]);
				fclose($file_info);
			}
			else $_SESSION["MSG_ERR"] = "No fue posible crear el archivo de descripción.";
			
		}
		else $_SESSION["MSG_ERR"] = "<br>Error: No fue posible guardar el archivo.";
	}
	else $_SESSION["MSG_ERR"] = "<br>Error: No fue posible cargar el archivo. El tamaño de los archivos no debe exceder 8MB. ERROR " . $_FILES['archivo']['error'];

	header("Location: upload.php")
?>
