<?php

    require('conector.php');

    $con = new ConectorBD();

    if ($con->initConexion()=='OK')
    {
        $nombre = "Alejandro";
        $apellido = "Reyes";
        $correo = "MonsterAlex@gmail.com";
        $password = "123456";
        $fecnac = "1994/08/21";
        

        if ($con->insertData('usuarios', $nombre, $apellido, $correo, $password, $fecnac)) 
        {
            echo "Se han registrado los datos correctamente";
        }
        else 
            echo "Se ha producido un error en la actualización";

        $nombre = "Asuna";
        $apellido = "Yuki";
        $correo = "yukiA@gmail.com";
        $password = "1234";
        $fecnac = "1995/11/22";

        if ($con->insertData('usuarios', $nombre, $apellido, $correo, $password, $fecnac)) 
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

        if ($con->insertData('usuarios', $nombre, $apellido, $correo, $password, $fecnac)) 
        {
            echo "Se han registrado los datos correctamente";
        }
        else 
            echo "Se ha producido un error en la actualización";

        $con->cerrarConexion();
    }
    else 
    {
        echo "Se presentó un error en la conexión";
    }
   
 ?>