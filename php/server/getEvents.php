<?php
  
    require('conector.php');
    session_start();

    if (isset($_SESSION['username'])) 
    {
        $con = new ConectorBD();
        if ($con->initConexion('agenda')=="OK") 
        {
            $resultado = $con->consultar(['evento'], ['*'], 'WHERE usuario_id ="'.$_SESSION['username'].'"');
            if ($resultado) 
            {
                $i=0;
                while ($fila = $resultado->fetch_assoc()) 
                {
                    $response['evento'][$i]['id']=$fila['id'];
                    $response['evento'][$i]['title']=$fila['Descripcion'];
                    
                    if ($fila['Completo']==1) 
                    {
                        $response['evento'][$i]['Completo']=true;
                        $response['evento'][$i]['start']=$fila['Fecha_Inicio'];
                        $response['evento'][$i]['end']=$fila['Fecha_Fin'];
                    }
                    else 
                    {
                        $response['evento'][$i]['Completo']=false;
                        $response['evento'][$i]['start']=$fila['Fecha_Inicio']." ".$fila['Hora_Inicio'];
                        $response['evento'][$i]['end']=$fila['Fecha_Fin']." ".$fila['Hora_Fin'];
                    }
                    $i++;
                }
                $response['msg'] = "OK";
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