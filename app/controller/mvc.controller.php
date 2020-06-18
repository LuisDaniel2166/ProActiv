<?php
require 'app/model/db.class.php';
require 'app/model/proyectos.class.php';
require 'app/model/Usuarios.class.php';
require 'app/model/fpdf/fpdf.php';
require 'app/model/actividades.class.php';
session_start();
class mvc_controller {

  //Mostrar pagina principal
  function principal(){
  //Carga de archivos  
  $pagina = $this->load_page('app/views/default/page.php');
  $styles = $this->load_page('app/views/default/sections/s.styles.php');
  $localjs = $this->load_page('app/views/default/sections/s.js_index.php');
  if($_SESSION['TYPEUSR']!='A'){
    $navbar = $this->load_page('app/views/default/sections/s.navbar.php');
  }
  else{
    $navbar = $this->load_page('app/views/default/sections/s.navbar_a.php');
  }
  $footer = $this->load_page('app/views/default/sections/s.footer.php');
  //Modificar contenido
  $pagina = $this->replace_content('/\#TITULO\#/ms' ,'Proyectos' , $pagina);
  $pagina = $this->replace_content('/\#STYLES\#/ms' ,$styles , $pagina);
  $pagina = $this->replace_content('/\#LOCALJS\#/ms' ,$localjs , $pagina);
  $pagina = $this->replace_content('/\#NAVBAR\#/ms' ,$navbar , $pagina);
  $pagina = $this->replace_content('/\#FOOTER\#/ms' ,$footer , $pagina);
  $misProy = new proyectos();
  ob_start();
    //Recibimos los valores de las funciones
    $tsArray = $misProy->proyAct($_SESSION['ID_USUARIO']);
    $tsArray2 = $misProy->proyUsr($_SESSION['ID_USUARIO'],'N');
    if($tsArray2!=''){
      //Llamanos al archivo
      include 'app/views/default/modules/m.mis_proyectos.php';
      //Limpiamos el buffer
      $table = ob_get_clean();
      //Reemplazamos el contenido con el buffer
      $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$table, $pagina);
    }
    else{
      $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,'<h1>No tienes proyectos registrados</h1>' , $pagina);
    }
  return $pagina;
 }

 function load_template($titulo=''){
  $pagina = $this->load_page('app/views/default/page.php');
  $styles = $this->load_page('app/views/default/sections/s.styles.php');
  $localjs = $this->load_page('app/views/default/sections/s.js_index.php');
  if($_SESSION['TYPEUSR']!='A'){
    $navbar = $this->load_page('app/views/default/sections/s.navbar.php');
  }
  else{
    $navbar = $this->load_page('app/views/default/sections/s.navbar_a.php');
  }
  $footer = $this->load_page('app/views/default/sections/s.footer.php');
  $pagina = $this->replace_content('/\#TITULO\#/ms' , $titulo, $pagina);
  $pagina = $this->replace_content('/\#STYLES\#/ms' ,$styles , $pagina);
  $pagina = $this->replace_content('/\#LOCALJS\#/ms' ,$localjs , $pagina);
  $pagina = $this->replace_content('/\#NAVBAR\#/ms' ,$navbar , $pagina);
  $pagina = $this->replace_content('/\#FOOTER\#/ms' ,$footer , $pagina);
  return $pagina;
 }

 function load_pdf($titulo=''){
  $pagina = $this->load_page('app/views/default/modules/m.page_pdf.php');
  $styles = $this->load_page('app/views/default/sections/s.styles.php');
  $localjs = $this->load_page('app/views/default/sections/s.js_index.php');
  $pagina = $this->replace_content('/\#TITULO\#/ms' , $titulo, $pagina);
  $pagina = $this->replace_content('/\#STYLES\#/ms' ,$styles , $pagina);
  $pagina = $this->replace_content('/\#LOCALJS\#/ms' ,$localjs , $pagina);
  return $pagina;
 }

 function login($error="Usuario o contraseña erroneo"){
  $pagina = $this->load_page('app/views/default/login.php');
  if (isset($error))
  {
  $error_login = $this->load_page('app/views/default/sections/s.error_login.php');
  $error_login = $this->replace_content('/\#ERROR\#/ms' ,$error, $error_login);
  $pagina = $this->replace_content('/\#ERROR_LOGIN\#/ms' ,$error_login , $pagina);
  }
  else
  {
   $pagina = $this->replace_content('/\#ERROR_LOGIN\#/ms' ,"" , $pagina); 
  }
  return $pagina;
 }

//Funcion visualizar proyectos
 function visualizar_proyectos(){
  $visProy = new proyectos();
  $seguridad = new seguridad;
  $seguridad->set_session_form('visualizar_proyecto');
  $pagina=$this->load_template('Visualizar Proyectos');
  ob_start();
    $tsArray = $visProy->proyUsr($_SESSION['ID_USUARIO'],'A');
    if($tsArray!=''){
      include 'app/views/default/modules/m.visualizar_proyectos.php'; 
      $table = ob_get_clean();
      $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$table, $pagina); 
    }
    else{
      $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,'<h1>No hay proyectos en la base de datos</h1>' , $pagina);
    }
    $this->view_page($pagina);
 }

 //Funcion visualizar proyecto
 function visualizar_proyecto($idProyecto){
  $visProy = new proyectos();
  $seguridad = new seguridad;
  $seguridad->set_session_form('visualizar_proyecto');
  $pagina=$this->load_template('Visualizar Proyecto');
  ob_start();
    $tsArray = $visProy->getInfPro($idProyecto);
    $tsArray2 = $visProy->getIntPro($idProyecto);
    $tsArray3 = $visProy->getActInf($idProyecto);
    if($tsArray!='' ){
      include 'app/views/default/modules/m.visualizar_proyecto.php'; 
      $table = ob_get_clean();
      $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$table, $pagina);
    }
    else{
      $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,'<h1>No hay informacion del proyecto solicitado (Error)</h1>' , $pagina);
    }
    $this->view_page($pagina);
 }

 function visualizar_actividad($idAct){
  $visActv = new actividades();
  $seguridad = new seguridad;
  $seguridad->set_session_form('actividad');
  $pagina=$this->load_template('Actividad');
  ob_start();
    $tsArray = $visActv->getInfAct($idAct);
    $tsArray2 = $visActv->getIntAct($idAct);
    if($tsArray !=''){
      include 'app/views/default/modules/m.visualizar_actividad.php';  
      $table = ob_get_clean();
      $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$table, $pagina);
    }
    else{
      $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,'<h1>No hay informacion de la actividad solicitada (Error)</h1>' , $pagina);
    }
    $this->view_page($pagina);
 }

 function crear_proyecto(){
  $seguridad= new seguridad;
  $seguridad->set_session_form('crear_proyecto');
  $pagina=$this->load_template('crear_proyecto');
  ob_start();
  include 'app/views/default/modules/m.crear_proyecto.php';
  $datos = ob_get_clean();
  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$datos, $pagina); 
  $this->view_page($pagina); 
 }

 function crearProy($Bdatos){
  $crearProy=new proyectos();
   if($crearProy->crearProyecto($Bdatos,$_SESSION['ID_USUARIO'])==false){
     echo'<script type="text/javascript">
      alert("El proyecto que gusta agregar ya existe");
      window.location.href="index.php?action=crearProyecto";
      </script>';   
   }
   else{
    echo'<script type="text/javascript">
      alert("Proyecto creado con exito");
      window.location.href="index.php?";
      </script>';    
   }
 }

 function modificar_proyecto($idProyecto){
  $modProy = new proyectos();
  $usuarios = new Usuarios();
  $seguridad = new seguridad;
  $seguridad->set_session_form('modificar_proyecto');
  $pagina=$this->load_template('Modificar Proyecto');
  ob_start();
    $tsArray = $modProy->getInfPro($idProyecto);
    $tsArray2 = $usuarios->Usu();
    if($tsArray!='' && $tsArray2!=''){
      include 'app/views/default/modules/m.modificar_proyecto.php'; 
      $datos = ob_get_clean();
      $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$datos, $pagina); 
    }
    else{
      $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,'<h1>error al mostrar el proyecto</h1>' , $pagina);
    }
    $this->view_page($pagina);
 }

 //funcion generar pdf
 function generarInforme_pdf($idProyecto=''){
  $genPDF = new proyectos();
  $seguridad = new seguridad;
  $seguridad->set_session_form('Generar_informe');
  $tsArray = $genPDF->getInfPro($idProyecto);
  $tsArray2 = $genPDF->getIntPro($idProyecto);
  $tsArray3 = $genPDF->getActInf($idProyecto);
      $pdf = new FPDF('P','mm','Letter');
      $pdf->AddPage();
      //Descripcion del proyecto
      $pdf->SetFont('Arial','B',16);
      $pdf->Cell(0,20,'Informe de proyecto '.date('d/m/y'),0,1,'C');
      $pdf->Cell(60,10,'Nombre del proyecto: ',0,0,'L');
      $pdf->SetFont('Arial','',14);
      $pdf->Cell(0,10,$tsArray['NOMPROY'],0,1,'L');
      $pdf->SetFont('Arial','B',16);
      $pdf->Cell(0,10,'Descripcion del proyecto: ',0,1,'L');
      $pdf->SetFont('Arial','',14);
      $pdf->Cell(0,5,$tsArray['DESCPROY'],0,1,'L');
      $pdf->Cell(0,5,'',0,1,'L');
      //tabla de fechas del proyecto
      $pdf->SetFont('Arial','B',14);
      $pdf->Cell(70,7,'Fecha de inicio del proyecto',1,0,'C');
      $pdf->Cell(70,7,'Fecha de fin del proyecto',1,0,'C');
      $pdf->Cell(56,7,'Estado',1,1,'C');
      $pdf->SetFont('Arial','',12);
      $pdf->Cell(70,7,date_format(new DateTime($tsArray['FEINIPRO']),'d/m/y'),1,0,'C');
      $pdf->Cell(70,7,date_format(new DateTime($tsArray['FEFINPRO']),'d/m/y'),1,0,'C');
      if($tsArray['ESTADO']=='A'){$estado='Activo';}else{$estado='Finalizado';}
      $pdf->Cell(56,7,$estado,1,1,'C');
      $pdf->Cell(0,10,'',0,1,'L');
      //Integrantes del proyecto
      $pdf->SetFont('Arial','B',16);
      $pdf->Cell(0,10,'Integrantes del proyecto',0,1,'L');
      if($tsArray2!=''){
      $pdf->SetFont('Arial','B',14);
      $pdf->Cell(110,7,'Nombre completo del integrante',1,0,'C');
      $pdf->Cell(86,7,'Rol del integrante',1,1,'C');
      $pdf->SetFont('Arial','',12);
      foreach ($tsArray2 as $data):
        $pdf->Cell(110,7,$data['NOMUSUARIO'].' '.$data['APEPAT'].' '.$data['APEMAT'],1,0,'C');
        if($data['USUROL']=='E'){$rol='Encargado';}else{$rol='Participante';}
        $pdf->Cell(86,7,$rol,1,1,'C');
      endforeach;
      }
      else{
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,20,'No hay usuarios registrados en este proyecto',0,1,'C');
      }
      
      $pdf->Cell(0,10,'',0,1,'L');
      //Seccion de actividades
      $pdf->SetFont('Arial','B',16);
      $pdf->Cell(0,10,'Actividades asociadas al proyecto',0,1,'L');
      if($tsArray3!=''){
        $contador=0;
        foreach ($tsArray3 as $data2):
          $contador++;
          $pdf->SetFont('Arial','B',16);
          $pdf->Cell(70,10,'Nombre de la actividad '.$contador.': ',0,0,'L');
          $pdf->SetFont('Arial','',14);
          $pdf->Cell(0,10,$data2['NOMACTIVIDAD'],0,1,'L');
          $pdf->SetFont('Arial','B',16);
          $pdf->Cell(0,10,'Descripcion de la actividad: ',0,1,'L');
          $pdf->SetFont('Arial','',14);
          $pdf->Cell(0,5,$data2['DESCACT'],0,1,'L');
          $pdf->Cell(0,5,'',0,1,'L');
          //tabla de fechas de actividad
          $pdf->SetFont('Arial','B',14);
          $pdf->Cell(98,7,'Fecha de inicio de la actividad',1,0,'C');
          $pdf->Cell(98,7,'Fecha de finalizacion de la actividad',1,1,'C');
          $pdf->SetFont('Arial','',12);
          $pdf->Cell(98,7,date_format(new DateTime($data2['FECINICIO']),'d/m/y'),1,0,'C');
          $pdf->Cell(98,7,date_format(new DateTime($data2['FECFIN']),'d/m/y'),1,1,'C');
          $pdf->Cell(0,10,'',0,1,'L');
          //Seccion integrantes de la actividad
          $tsArray4 = $genPDF->getIntAct($data2['IDACTIVIDAD']);
          $pdf->SetFont('Arial','B',16);
          $pdf->Cell(0,10,'Integrantes de la actividad',0,1,'L');
          if($tsArray4!=''){
            $pdf->SetFont('Arial','B',14);
            $pdf->Cell(196,7,'Nombre completo del integrante',1,1,'C');
            $pdf->SetFont('Arial','',12);
            foreach ($tsArray4 as $data3):
              $pdf->Cell(196,7,'* '.$data3['NOMUSUARIO'].' '.$data3['APEPAT'].' '.$data3['APEMAT'],1,1,'C');
            endforeach;
          }
          
          $pdf->Cell(0,10,'',0,1,'L');
        endforeach;        
      }
      else{
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,20,'No hay actividades registradas en este proyecto',0,1,'C');
      }
      
      $pdf->Output('','Informe de proyecto '.date('d/m/y'),true);
      //$this->view_page($pagina);
 }

 function mi_perfil($sesion,$tipo){
  $visusu=new Usuarios();
  $seguridad= new seguridad;
  if($sesion==""){
      $sesion=$_SESSION['ID_USUARIO'];
  }
  $seguridad->set_session_form('mi_perfil');
  $pagina=$this->load_template('Mi perfil');
  ob_start();
  $tsArray=$visusu->infUsu($sesion);
  if($tipo==0){
  include 'app/views/default/modules/m.mi_perfil.php';
  }
  else{
      include 'app/views/default/modules/m.editar_perfil.php';
  }
  $datos = ob_get_clean();
  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$datos, $pagina); 
  $this->view_page($pagina);
}



function perfiles(){
  $visusu=new Usuarios();
  $seguridad= new seguridad;
  $seguridad->set_session_form('visualizar_usuarios');
  $pagina=$this->load_template('Visualizar_Usuarios');
  ob_start();
  $tsArray=$visusu->Usu();
  include 'app/views/default/modules/m.Visualizar_usuarios.php';
  $datos = ob_get_clean();
  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$datos, $pagina); 
  $this->view_page($pagina);
}

function vaUsu(){
  $seguridad= new seguridad;
  $seguridad->set_session_form('agregar_usuarios');
  $pagina=$this->load_template('Agregar_Usuarios');
  ob_start();
  include 'app/views/default/modules/m.AgregarPerfil.php';
  $datos = ob_get_clean();
  $pagina = $this->replace_content('/\#CONTENIDO\#/ms' ,$datos, $pagina); 
  $this->view_page($pagina); 
}
function aUsu($Bdatos){
 $usu=new Usuarios();
  if($usu->agreUsu($Bdatos)==false){
    echo'<script type="text/javascript">
     alert("El usuario ya existe intente con uno nuevo");
     window.location.href="index.php?action=vaUsu";
     </script>';   
  }
  else{
   echo'<script type="text/javascript">
     alert("Usuario agregado con exito");
     window.location.href="index.php?action=vaUsu";
     </script>';     
  }
}

function FmodProy($Bdatos,$Datos1,$Datos2){
 $FmodProy=new Proyectos();
  if($FmodProy->MODPROYDATOS($Bdatos,$Datos1,$Datos2)==false){
    echo'<script type="text/javascript">
     alert("Error al actualizar el proyecto");
     window.location.href="index.php?action=vaUsu";
     </script>';   
  }
  else{
   echo'<script type="text/javascript">
     alert("El proyecto se ha ejecutado correctamente");
     window.location.href="index.php?";
     </script>';     
  }
}

//
function editP($Bdatos){
 $usu=new Usuarios();
 include "app/model/mcript.php"; 
 if($usu->updUsu($Bdatos)==true){
     echo'<script type="text/javascript">
     alert("Actualizacion exitosa");
     window.location.href="index.php?action=visUsu"
     </script>'; 
 }
 else{
     echo'<script type="text/javascript">
     alert("Error en el update nombre de usuario ya en uso o no se modifico al usuario");
     window.location.href="index.php?action=visUsu"
     </script>'; 
     echo $Bdatos['contraseña'];
 }
}



 function login_action($user,$pass){
  $validar= new database;
  if ($row_usuario=$validar->validarUsuario($user,$pass)){
    $_SESSION['ID_USUARIO']= $row_usuario['IDUSUARIO'];
    $_SESSION['NOMBRE']= $row_usuario['NOMUSUARIO'];
    $_SESSION['USUARIO']= $row_usuario['USUARIO'];
    $_SESSION['CONTRASENA']= $row_usuario['CONTRASENA'];
    $_SESSION['TYPEUSR']= $row_usuario['TYPEUSR'];
    $_SESSION['hora_session']= time();
    return $this->principal();
  }else{
  return $this->login();
  }
 }
 //cerrar sesion
 function logout(){
  unset($_SESSION['ID_USUARIO']);
  unset($_SESSION['NOMBRE']);
  unset($_SESSION['USUARIO']);
  unset($_SESSION['CLAVE']);
  unset($_SESSION['NIVEL_RESPONSABILIDAD']);
  unset($_SESSION['EMAIL']);
  unset($_SESSION['hora_session']);
  session_destroy();
  return $this->login(NULL);
 }

 /* METODO QUE CARGA UNA PAGINA DE LA SECCION VIEW Y LA MANTIENE EN MEMORIA
 INPUT
 $page | direccion de la pagina 
 OUTPUT
 STRING | devuelve un string con el codigo html cargado
 */
 private function load_page($page)
 {
  return file_get_contents($page);
 }

 /*Funcion para ver la pagina*/
 private function view_page($html)
 {
  echo $html;
 }
 private function replace_content($in='/\#CONTENIDO\#/ms', $out,$pagina)
 {
   return preg_replace($in, $out, $pagina);
 }
}
?>