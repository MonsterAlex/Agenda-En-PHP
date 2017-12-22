<?php

    require('conector.php');

    $con = new ConectorBD();

    if ($con->initConexion()=='OK')
    {
        $nombre = "Esme";
        $apellido = "Gonzales";
        $correo = "esme@gmail.com";
        $password = "123";
        $fecnac = "1995/11/22";
        /*$pass_encriptada = htmlspecialchars($password);*/
        /*$pass_encriptada = password_hash($password,PASSWORD_DEFAULT);*/

        if ($con->insertUser('usuarios', $nombre, $apellido, $correo, $password, $fecnac)) 
        {
            echo "Se han registrado los datos correctamente";
        }
        else 
            echo "Se ha producido un error en la actualización";

        /*$nombre = "Asuna";
        $apellido = "Yuki";
        $correo = "yukiA@gmail.com";
        $password = "1234";
        $fecnac = "1995/11/22";

        if ($con->insertUser('usuarios', $nombre, $apellido, $correo, $password, $fecnac)) 
        {
            echo "Se han registrado los datos correctamente";
        }
        else 
            echo "Se ha producido un error en la actualización";

        $nombres = "Angela";
        $apellido = "Sigler";
        $correo = "Mercy@gmail.com";
        $password = "12345";
        $fecnac = "1980/08/21";

        if ($con->insertUser('usuarios', $nombre, $apellido, $correo, $password, $fecnac)) 
        {
            echo "Se han registrado los datos correctamente";
        }
        else 
            echo "Se ha producido un error en la actualización";*/

        $con->cerrarConexion();
    }
    else 
    {
        echo "Se presentó un error en la conexión";
    }
   
 ?>