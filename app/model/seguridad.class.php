<?php
class seguridad {
    function restringir_session()
    {
      $inactive = 1200; 
      $session_life = time()-$_SESSION['hora_session'];
      if($session_life > $inactive&&$_SESSION['hora_session']!='')
      { 
        session_unset();
        session_destroy();
        $error = "Mucho tiempo sin usar el sistema.";
        return $error;
      }
      else
      {
        $_SESSION['hora_session']= time();
        return FALSE;
      } 
    }

    function set_session_form($pag_form)
    {
      $_SESSION['PAG_FORM']=$pag_form;
    }


    function verify_session_form($pag_form)
    {
      if ($_SESSION['PAG_FORM']==$pag_form)
      {
        unset($_SESSION['PAG_FORM']);
        return True;
      }
      else
      {
        return FALSE;
      }
    }
  }  
?>