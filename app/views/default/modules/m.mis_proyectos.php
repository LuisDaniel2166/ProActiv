 <div class="section bgcolor noover">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message">
                            <h3>Proyectos activos en curso</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->

        <section class="section lb nopadtop noover">
            <div class="container">
                <div class="row">
                    
                    <?php //ldap_get_values_len(link_identifier, result_entry_identifier, attribute)ado de datos mediante PHP
                    foreach ($tsArray as $data): ?>
                    <div class="col-lg-4 col-md-12">
                        <div class="service-box m30">
                            <h3 style="font-weight: bold"><?php echo $data['NOMPROY']?></h3>
                            <p style="font-weight: bold; color: black;">Descripcion del proyecto:</p>
                            <p style="color:#2C2C2C"><?php echo $data['DESCPROY']?></p>
                            <p style="font-weight: bold; color: black;">Fecha de finalizacion:</p>
                            <p style="color:#2C2C2C"><?php $date= new DateTime($data['FEFINPRO']);
                                                            echo date_format($date,'d/m/Y'); ?></p>
                            <p><a href="index.php?action=visualizarProyecto&idProy=<?php echo $data['IDPROYECTO']?>"><button type="submit" class="btn btn-default">Ver proyecto</button></a></p>
                        </div>
                    </div><!-- end col -->
                    <?php endforeach; ?>

                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end section -->

        <section class="section">
            <div class="container">
                <div class="row">
                            <h3>Proyectos registrados</h3>
                            <p>Todos los proyectos en la que estas registrado</p>
                            
                                <table class="table" width="100%" heigth="70px">
                                  <tr>
                                    <td style="color:#2C2C2C">Nombre del proyecto</td>
                                    <td style="color:#2C2C2C">Descripcion del proyecto</td>
                                    <td style="color:#2C2C2C">Fecha de finalización</td>
                                    <td style="color:#2C2C2C">Estado</td>
                                    <td></td>
                                  </tr>
                                  <?php
                                  foreach ($tsArray2 as $data):?>
                                  <tr>
                                    <td style="color:#2C2C2C"><?php echo $data['NOMPROY']?></td>
                                    <td style="color:#2C2C2C"><?php echo $data['DESCPROY']?></td>
                                    <td style="color:#2C2C2C"><?php $date= new DateTime($data['FEFINPRO']);
                                                                    echo date_format($date,'d/m/Y'); ?></td>
                                    <td style="color:#2C2C2C"><?php if($data['ESTADO']=='A'){echo 'Activo';}
                                                                    else{echo 'Finalizado';}?></td>
                                    <td style="color:#2C2C2C"><p><a href="index.php?action=visualizarProyecto&idProy=<?php echo $data['IDPROYECTO']?>"><button type="submit" class="btn btn-default">Ver proyecto</button></a></p></td>
                                  </tr>
                                  <?php endforeach;?>
                                </table>
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
