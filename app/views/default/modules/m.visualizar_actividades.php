<div class="section bgcolor noover">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message">
                            <h3>Visualizar actividades</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->

        <section class="section">
            <div class="container">
                            <!--El contenido de la tabla varia segun lo mandado-->
                            <p><h3>Actividades registradas en el proyecto</h3></p>
                                <table class="table" width="100%" heigth="90px">
                                  <tr>
                                  <td style="color:#2C2C2C">Nombre de la actividad</td>
                                    <td style="color:#2C2C2C">Descripcion</td>
                                    <td style="color:#2C2C2C">Fecha de inicio</td>
                                    <td style="color:#2C2C2C">Fecha de finalización</td>
                                    <td style="color:#2C2C2C">Estado</td>
                                    <td></td>
                                  </tr>
                                  <?php
                                  foreach ($tsArray as $data):?>
                                  <tr>
                                    <td style="color:#2C2C2C"><?php echo $data['NOMACTIVIDAD']?></td>
                                    <td style="color:#2C2C2C"><?php echo $data['DESCACT']?></td>
                                    <td style="color:#2C2C2C"><?php $date= new DateTime($data['FECINICIO']);
                                                                    echo date_format($date,'d/m/Y'); ?></td>
                                    <td style="color:#2C2C2C"><?php $date= new DateTime($data['FECFIN']);
                                                                    echo date_format($date,'d/m/Y'); ?></td>                                
                                    <td style="color:#2C2C2C"><?php if($data['ESTADO']=='A'){echo 'Activo';}
                                                                    else{echo 'Finalizado';}?></td>
                                    <td style="color:#2C2C2C"><p><button type="submit" onclick="window.location='index.php?action=verActv&act=<?php echo $data['IDACTIVIDAD']?>'" class="btn btn-default">Ver actividad</button></p></td>
                                    <input type="hidden"/>
                                  </tr>
                                  <?php endforeach;?>
                                </table>        
            </div><!-- end container -->
        </section>
