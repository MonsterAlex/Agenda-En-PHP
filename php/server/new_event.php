<?php
  
    require('conector.php');
    session_start();

    if (isset($_SESSION['username'])) 
    {
        $con = new ConectorBD();
        if ($con->initConexion('agenda')=="OK") 
        {
            $data['Descripcion']='"'.$_POST['titulo'].'"';
            $data['Fecha_Inicio']='"'.$_POST['start_date'].'"';
            $data['Fecha_Fin']='"'.$_POST['end_date'].'"';
            $data['Hora_Inicio']='"'.$_POST['start_hour'].'"';
            $data['Hora_Fin']='"'.$_POST['end_hour'].'"';
            $data['usuario_id']='"'.$_SESSION['username'].'"';
    
            if ($_POST['Completo']=="true") 
            {
                $data['Completo']=1;
            }
            else 
            {
                $data['Completo']=0;
            }

            if ($con->insertData('evento',$data)) 
            {
                $response['msg']="OK";
            }
            else 
            {
                $response['msg']= "No se pudo añadir el registro";
            }
        }
        else 
        {
            $response['msg'] = "No se ha podido establecer conexión con la base de datos";
        }
    }
    else
    {
        $response['msg'] = "No se ha iniciado sesión";
    }
    echo json_encode($response);

 ?> 