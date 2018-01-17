<?php
    require('conector.php');
    session_start();

    if (isset($_SESSION['username'])) 
    {
        $con = new ConectorBD();
        if ($con->initConexion('agenda')=="OK") 
        {
            $resultado = $con->consultar(['evento'], ['*'], 'WHERE fk_usuario ="'.$_SESSION['username'].'"');
            if ($resultado) 
            {
                $i=0;
                while ($fila = $resultado->fetch_assoc()) 
                {
                    $response['evento'][$i]['id']=$fila['id'];
                    $response['evento'][$i]['title']=$fila['titulo'];
                    if ($fila['allDay']==0) 
                    {
                        $response['evento'][$i]['allDay']=true;
                        $response['evento'][$i]['start']=$fila['start_date'];
                        $response['evento'][$i]['end']=$fila['end_date'];
                    }
                    else 
                    {
                        $response['evento'][$i]['allDay']=false;
                        $response['evento'][$i]['start']=$fila['start_date']." ".$fila['start_hour'];
                        $response['evento'][$i]['end']=$fila['end_date']." ".$fila['end_hour'];
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