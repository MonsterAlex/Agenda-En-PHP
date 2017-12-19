<?php
    session_start();

    require('conector.php');
    
    $con = new ConectorBD();

    $passw=$_POST["password"];
    $email=$_POST["username"];

    if ($con->initConexion()=='OK')
    {
        $resul=$con->datosUsuario($email);

        while ($rows = $resul->fetch_array()) 
        {
		 
            if(password_verify($passw,$rows["password"])) 
            {
                $_SESSION['id'] = $rows["id"];

                $php_response=array("msg"=>"OK","data"=>"2");   
            }
            else
            {
                $php_response=array("msg"=>"El Usuario ingresado no existe","data"=>"2"); 
            }
            echo json_encode($php_response,JSON_FORCE_OBJECT);
        }
        $con->cerrarConexion();
    }

 ?>