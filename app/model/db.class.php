<?php
class database {
    private $conexion;
    //Funcion conectar a la base de datos
    public function conectar()
    {
        if(!isset($this->conexion))
        {
            //Formato de la conexion "Servidor","Usuario","contraseña"
            $this->conexion = (mysqli_connect("localhost","root","")) or die(mysqli_error());
            mysqli_select_db($this->conexion,"proactiv") or die(mysqli_error($this->conexion));
        }
        return $this->conexion;
    } 
    
    //Funcion desconectar
    public function disconnect()
    {
        mysqli_close($this->conexion);
    }

    //Funcion validarUsuario
    function validarUsuario ($user,$pass)
    {
        $link = $this->conectar(); 
        $usuario = mysqli_real_escape_string($link ,  $user);
        $password = mysqli_real_escape_string($link , $pass);
        $query = "SELECT * FROM `usuario` WHERE `USUARIO` = '".$usuario."' LIMIT 1";
        //$password = md5($password);
        $result = mysqli_query($link,$query);
        $dato = mysqli_num_rows($result);
        if ($dato==0)
        {
            return false;
            exit();
        } 
        $row = mysqli_fetch_array($result);
        if($row['CONTRASENA']!=$password)
        {
            return false;
            exit();
        }
        mysqli_close($link);
        return $row;
    }
}
?>