<?php

    include('conector.php');
    
    $data['Nombre'] = "'".$_POST['Nombre']."'";
    $data['Apellidos'] = "'".$_POST['Apellidos']."'";
    $data['Correo'] = "'".$_POST['Correo']."'";
    $data['Contrasena'] = "'".password_hash($_POST['Contrasena'], PASSWORD_DEFAULT)."'";
    $data['Fecha_Nacimiento'] = "'".$_POST['Fecha_Nacimiento']."'";

    $con = new ConectorBD('localhost','root','123456');
    $response['conexion'] = $con->initConexion('agenda');

    if ($response['conexion']=='OK') 
    {
        if($con->insertData('usuarios', $data))
        {
            $response['msg']="Se a Registrado con Exito el usuario";
        }
        else 
        {
            $response['msg']= "Hubo un error y los datos no han sido guardados";
        }
    }
    else 
    {
        $response['msg']= "No se pudo conectar a la base de datos";
    }

    echo json_encode($response);


 ?>
