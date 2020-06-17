<?php
require_once "db.class.php";
class actividades extends database {
	function actvUsr($idUsuario, $modo, $idproyecto) {
		if ($modo == "normal") {
			$modo = 'N';
		} else {
			$modo = 'A';
		}
		if ($modo == 'N') {
			//Abrimos la conexion
			$link = $this -> conectar();
			//Guardamos el query a ejecutar
			$query = "SELECT * FROM actividad ac INNER JOIN usuario_actividad ua on (ac.IDACTIVIDAD=ua.IDACTIVIDAD) WHERE ua.IDUSUARIO=" . $idUsuario . " AND ac.IDPROYECTO=" . $idproyecto . " ORDER BY FECINICIO ASC";
			//Ejecutamos el query
			$result = mysqli_query($link, $query);
			//Guardamos el resultado en un arreglo
			while ($tsArray = mysqli_fetch_array($result)) {
				$data[] = $tsArray;
			}
			//Cerramos la conexion
			return $data;
			mysqli_close($link);
		}else {
			$link = $this -> conectar();
			$query = "SELECT * FROM actividad ac WHERE ac.IDPROYECTO=" . $idproyecto . " ORDER BY ac.FECINICIO ASC;";
			$result = mysqli_query($link, $query);
			while ($tsArray = mysqli_fetch_array($result)){
				$data[] = $tsArray;
			}
			return $data;
			mysqli_close($link);
		}
	}
	//Funcion para obtener la información de una actividad especifica
	function verActividad($idactv) {
		$link = $this -> conectar();
		$query = "SELECT * FROM actividad ac WHERE ac.IDACTIVIDAD=" . $idactv . ";";
		$result = mysqli_query($link, $query);	
		$datos[] = mysqli_fetch_assoc($result);
		return $datos;
		mysqli_close($link);	
		
	}
	//Funcion para obtener a los integrantes de la actividad
	function getNombres($idAct) {
		$link = $this -> conectar();
		$query = "SELECT DISTINCT CONCAT(NOMUSUARIO,' ',APEPAT,' ',APEMAT) AS NOMBRE FROM usuario us INNER JOIN usuario_actividad ua ON (us.IDUSUARIO=ua.IDUSUARIO) INNER JOIN actividad ac ON(ua.IDACTIVIDAD=ac.IDACTIVIDAD) WHERE ac.IDACTIVIDAD=" . $idAct . "";
		$res = mysqli_query($link, $query);
		if($Array = mysqli_fetch_array($res)){
			$datos[] = $Array;
			while ($Array = mysqli_fetch_array($res)) {
				$datos[] = $Array;
			}
		}else{
			$datos[]= Array('NOMBRE'=>"No hay participantes en esta actividad");
		}
		return $datos;
		mysqli_close($link);
	}
	//Función para modificar la información de una actividad
	function modActividad($datos,$idactividad){
		$link = $this -> conectar();
		$query = 'UPDATE actividad SET NOMACTIVIDAD = "'.$datos['NOMACTIVIDAD'].'",FECINICIO = "'.$datos['FECINICIO'].'",FECFIN = "'.$datos['FECFIN'].'", ESTADO = "'.$datos['ESTADO'].'", DESACT = "'.$datos['DESACT'].'" WHERE actividad.IDACTIVIDAD = "'.$idactividad.'"';
		if(mysqli_query($link, $query)){
			echo "Inserción exitosa";
		}else{
			echo "Error en la modificacion";
		}
		return $datos;
		mysqli_close($link);
	}
	function insActividad($datos,$idactividad){
		$link = $this -> conectar();
		$query = 'INSERT INTO actividad(NOMACTIVIDAD,FECINICIO,FECFIN,ESTADO,DESACT) VALUES("'.$datos['NOMACTIVIDAD'].'","'.$datos['FECINICIO'].'","'.$datos['FECFIN'].'","'.$datos['ESTADO'].'","'.$datos['DESACT'].'")';
		if(mysqli_query($link, $query)){
			echo "Inserción exitosa";
		}else{
			echo "Error en la modificacion";
		}
		return $datos;
		mysqli_close($link);
	}
}
?>