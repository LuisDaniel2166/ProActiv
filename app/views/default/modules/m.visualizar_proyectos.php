<div class="section bgcolor noover">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message">
                            <h3>Visualizar proyectos</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->

        <section class="section">
            <div class="container">
                            <!--El contenido de la tabla varia segun lo mandado-->
                            <p><h3>Proyectos registrados En la base de datos</h3></p>
                                <table class="table" width="100%" heigth="90px">
                                  <tr>
                                  <td style="color:#2C2C2C">Nombre del proyecto</td>
                                    <td style="color:#2C2C2C">Descripcion del proyecto</td>
                                    <td style="color:#2C2C2C">Fecha de finalización</td>
                                    <td style="color:#2C2C2C">Estado</td>
                                    <td></td>
                                  </tr>
                                  <?php
                                  foreach ($tsArray as $data):?>
                                  <tr>
                                    <td style="color:#2C2C2C"><?php echo $data['NOMPROY']?></td>
                                    <td style="color:#2C2C2C"><?php echo $data['DESCPROY']?></td>
                                    <td style="color:#2C2C2C"><?php $date= new DateTime($data['FEFINPRO']);
                                                                    echo date_format($date,'d/m/Y'); ?></td>
                                    <td style="color:#2C2C2C"><?php if($data['ESTADO']=='A'){echo 'Activo';}
                                                                    else{echo 'Finalizado';}?></td>
                                    <td style="color:#2C2C2C"><a href="index.php?action=visualizarProyecto&idProy=<?php echo $data['IDPROYECTO']?>"><button type="submit" class="btn btn-default">Ver proyecto</button></a></p></td>
                                  </tr>
                                  <?php endforeach;?>
                                </table>        
            </div><!-- end container -->
        </section>
