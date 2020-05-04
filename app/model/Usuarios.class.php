<?php
require_once "db.class.php";
class Usuarios extends database{
    //Funcion Informacion usuario
    function infUsu($idUsuario){
        //Abrimos la conexion
        $link = $this->conectar();
        //Guardamos el query a ejecutar
        $query = 'select * from usuario where IDUSUARIO='.$idUsuario;
        //Ejecutamos el query
        $result = mysqli_query($link,$query);
        //Guardamos el resultado en un arreglo
        while ( $tsArray = mysqli_fetch_array($result) ){
            $data[] = $tsArray;   
        }
        //Cerramos la conexion
        return $data;
        mysqli_close($link);
    }
    //funcion todos los usuarios
    function Usu(){
        //Abrimos la conexion
        $link = $this->conectar();
        //Guardamos el query a ejecutar
        $query = 'select * from usuario';
        //Ejecutamos el query
        $result = mysqli_query($link,$query);
        //Guardamos el resultado en un arreglo
        while ( $tsArray = mysqli_fetch_array($result) ){
            $data[] = $tsArray;   
        }
        //Cerramos la conexion
        return $data;
        mysqli_close($link);
    }
    function comprobar($dato){
        
    }
    function agreUsu($datos){
        //Abrimos la conexion
        $link = $this->conectar();
        //comprobar que no exista
        $query='select * from usuario where NOMUSUARIO="'.$datos['nomus'].'"';
        $result = mysqli_query($link,$query); 
          if(mysqli_num_rows($result)>=1){
            return false;
        }
        //Guardamos el query a ejecutar
        $query = 'insert into usuario values(null,"'.$datos['nombre'].'","'.$datos['ap'].'","'
         .$datos['am'].'","'.$datos['nac'].'","'.$datos['gen'].'","'.$datos['tel'].'","'
          .$datos['correo'].'","'.$datos['nomus'].'","'.$datos['contraseña'].'","'
                .$datos['tip'].'"'.')';
        //Ejecutamos el query
        mysqli_query($link,$query);
        return true;
        mysqli_close($link);
    }
    function updUsu($datos){  
        //Abrimos la conexion
        $link = $this->conectar();
        $query='select * from USUARIO where NOMUSUARIO="'.$datos['nomus'].'"';
        $result = mysqli_query($link,$query);
        $query2='select * FROM USUARIO WHERE IDUSUARIO="'.$datos['id'].'"'; 
        $result2 = mysqli_query($link,$query2);
        if(mysqli_fetch_assoc($result)!=mysqli_fetch_assoc($result2)){
          if(mysqli_num_rows($result)>=1){
            return false;
            }
        }

        $query='update usuario set NOMUSUARIO="'.$datos['nombre'].'",APEPAT="'.$datos['ap'].
          '",APEMAT="'.$datos['am'].'",FECNAC="'.$datos['nac'].'",SEXO="'.$datos['gen']. 
         '",TELEFONO="'.$datos['tel'].'",CORREO="'.$datos['correo'].'",USUARIO="'.$datos['nomus'].
         '",CONTRASENA="'.$datos['contraseña'].'",TYPEUSR="'.$datos['tip'].
           '"WHERE IDUSUARIO="'.$datos['id'].'"';  
        mysqli_query($link,$query);
        if(mysqli_affected_rows($link)==1){
            return true;
        }
        else{
            return false;
        }
    }
}

?>

