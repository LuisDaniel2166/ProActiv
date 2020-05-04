
<div class="section bgcolor noover">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message">
                            <h3>Visualizar Usuarios</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->

<section class="section">
            <div class="container">
                <!--<form method="post" action="index.php?action=maneUsus">  -->
                            <p><h3>Usuarios registrados</h3></p>
                                <table class="table" width="100%" heigth="90px">
                                  <tr>
                                    <td>Nombre</td>
                                    <td>Usuario</td>
                                    <td></td>
                                    <td></td>
                                  </tr>                
                                      <?php
                                      $a=0;
                foreach ($tsArray as $data):?>  
                                  <tr>
                                    <td><?php echo $data['NOMUSUARIO'].' '.$data['APEPAT'].' '.$data['APEMAT'];?></td>
                                    <td><?php echo $data['USUARIO']; ?></td>
                                <!--  <input hidden="true" id="idusu" value=""></input>-->
                                    <td><a href="index.php?action=maneUsus&idusu=<?php include "app/model/mcript.php"; 
                                    echo urlencode($encriptar($data['IDUSUARIO']));?>"><button type="submit" class="btn btn-default" role="link" >Ver informacion</button></a></td>
                                    <td><a href="index.php?action=editPer&idusu2=<?php include "app/model/mcript.php"; 
                                    echo urlencode($encriptar($data['IDUSUARIO']));?>"><button type="submit" class="btn btn-default" role="link" >Editar informacion</button></a></td>
                                  </tr>
              <?php endforeach;?>                
                                  </table>  
               <!-- </form>-->

                                  
            </div><!-- end container -->
        </section>
        