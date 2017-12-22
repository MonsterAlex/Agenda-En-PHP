<?php

    class ConectorBD
    {
        private $host = 'localhost';
        private $user = 'root';
        private $password = '123456';
        private $conexion;
        private $nombre_db='agenda';

        function initConexion(){
            $this->conexion = new mysqli($this->host, $this->user, $this->password,$this->nombre_db);
            
            if ($this->conexion->connect_error) 
            {
                return "Error:" . $this->conexion->connect_error;
            }
            else 
            {
                return "OK";
            }
        }

        function datosUsuario($correo,$password)
        {
            $sql="SELECT * FROM usuarios WHERE correo='$correo' and password='$password'";
            return $this->ejecutarQuery($sql);
        }

        function obtenerEventos($id)
        {
            $sql="SELECT Descripcion,Fecha_Inicio,Fecha_Fin FROM evento WHERE usuario_id='".$id."'";
            return $this->ejecutarQuery($sql);
        }

        function eliminarEvento($evento,$usuario)
        {
            $sql="DELETE FROM evento WHERE id='".$evento."' AND usuario_id='".$usuario."'";
            return $this->ejecutarQuery($sql);
        }

        function newTable($nombre_tbl, $campos)
        {
            $sql = 'CREATE TABLE '.$nombre_tbl.' (';
            $length_array = count($campos);
            $i = 1;
            
            foreach ($campos as $key => $value) 
            {
                $sql .= $key.' '.$value;
                if ($i!= $length_array) 
                {
                    $sql .= ', ';
                }
                else 
                {
                    $sql .= ');';
                }
                $i++;
            }
            return $this->ejecutarQuery($sql);
        }

        function ejecutarQuery($query)
        {
            return $this->conexion->query($query);
        }

        function cerrarConexion()
        {
            $this->conexion->close();
        }

        function nuevaRestriccion($tabla, $restriccion)
        {
            $sql = 'ALTER TABLE '.$tabla.' '.$restriccion;
            return $this->ejecutarQuery($sql);
        }

        function nuevaRelacion($from_tbl, $to_tbl, $from_field, $to_field)
        {
            $sql = 'ALTER TABLE '.$from_tbl.' ADD FOREIGN KEY ('.$from_field.') REFERENCES '.$to_tbl.'('.$to_field.');';
            return $this->ejecutarQuery($sql);
        }

        function insertUser($tabla, $nombre, $apellido, $correo, $password, $fecnac)
        {
            $sql = "INSERT INTO $tabla (nombre, apellido, correo, password, fecnac) VALUES ('$nombre','$apellido','$correo','$password','$fecnac')"; 

            return $this->ejecutarQuery($sql);
        }
        
        function insertData($tabla, $data){
            $sql = 'INSERT INTO '.$tabla.' (';
            $i = 1;
            foreach ($data as $key => $value) {
                $sql .= $key;
                if ($i<count($data)) 
                {
                    $sql .= ', ';
                }
                else $sql .= ')';
                    $i++;
            }
            $sql .= ' VALUES (';
            $i = 1;
            foreach ($data as $key => $value) {
                $sql .= $value;
                if ($i<count($data)) 
                {
                    $sql .= ', ';
                }
                else $sql .= ');';
                    $i++;
            }
            return $this->ejecutarQuery($sql);
        }

        function getConexion()
        {
            return $this->conexion;
        }

        function actualizarRegistro($tabla, $data, $condicion)
        {
            $sql = 'UPDATE '.$tabla.' SET ';
            $i=1;
            
            foreach ($data as $key => $value) 
            {
                $sql .= $key.'='.$value;
                
                if ($i<sizeof($data)) 
                {
                    $sql .= ', ';
                }
                else $sql .= ' WHERE '.$condicion.';';
                $i++;
            }
            return $this->ejecutarQuery($sql);
        }
    }

 ?>