<?php

    require('conector.php');

    $con = new ConectorBD();

    if($con->initConexion('agenda')=="OK")
    {
        $data['nombre']='"Miranda"';
        $data['apellido']='"Reyes"';

        $hash = password_hash('123456', PASSWORD_DEFAULT);

        $data['username']= '"MirandaR@gmail.com"';
        $data['password']= '"'.$hash.'"';
        $data['fecnac']='"1995-11-07"';

        if($con->insertData('usuarios', $data))
        {
            echo " El Usuario se a registrado con exito ";
        }
        else
            echo " Se a Producido un Error al intentar registrar usuario ";
            
        //////
        $data['nombre']='"Luck"';
        $data['apellido']='"Skywalker"';

        $hash = password_hash('12345', PASSWORD_DEFAULT);

        $data['username']= '"SkyLu@gmail.com"';
        $data['password']= '"'.$hash.'"';
        $data['fecnac']='"1977-01-12"';

        if($con->insertData('usuarios', $data))
        {
            echo " El Usuario se a registrado con exito ";
        }
        else
            echo " Se a Producido un Error al intentar registrar usuario ";
        /////
        $data['nombre']='"Mariano"';
        $data['apellido']='"Matamoros"';

        $hash = password_hash('532110', PASSWORD_DEFAULT);

        $data['username']= '"MataMo@gmail"';
        $data['password']= '"'.$hash.'"';
        $data['fecnac']='"1990-12-12"';

        if($con->insertData('usuarios', $data))
        {
            echo " El Usuario se a registrado con exito ";
        }
        else
            echo " Se a Producido un Error al intentar registrar usuario ";
    }
    

 ?>