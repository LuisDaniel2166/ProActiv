<!--<div class="section bgcolor noover">-->
            <!--<div class="container">-->
                <!--<div class="row">-->
                    <!--<div class="col-md-12">-->
                        <!--<div class="tagline-message">-->
                            <h3>Informe de proyecto <?php echo date('d/m/y');?></h3>
                        <!--</div>-->
                    <!--</div>--><!-- end col -->
                <!--</div>--><!-- end row -->
            <!--</div>--><!-- end container -->
        <!--</div>-->

        <!--<section class="section">-->
            <!--<div class="container">-->
                            <!--El contenido de la tabla varia segun lo mandado-->
                            <h2>Proyecto: <?php echo $tsArray['NOMPROY'];?></h2>
                            <h3>Informacion del proyecto</h3>
                            <table style="color:#2C2C2C;border-collapse: collapse;">
                              <tr>
                                <td><h4>Descripcion del proyecto</h4></td>
                                <td><h4>Fecha de inicio del proyecto</h4></td>
                                <td><h4>Fecha de finalización del proyecto</h4></td>
                              </tr>
                              <tr>
                                <td><h4><?php echo $tsArray['DESCPROY'];?></h4></td>
                                <td><h4><?php $date= new DateTime($tsArray['FEINIPRO']); echo date_format($date,'d/m/y');?></h4></td>
                                <td><h4><?php $date= new DateTime($tsArray['FEFINPRO']); echo date_format($date,'d/m/y');?></h4></td>
                              </tr>
                            </table>
                            <h3>Integrantes del proyecto:</h3>
                                <table style="color:#2C2C2C; border-collapse: separate;">
                                  <tr>
                                    <td><h4>Nombre del integrante</h4></td>
                                    <td><h4>Rol en el proyecto</h4></td>
                                  </tr>
                                  <?php foreach($tsArray2 as $data): ?>
                                  <tr>
                                    <td><h5 style="font-size: 120%;border: 2px solid black;" width="100%"><?php echo ($data['NOMUSUARIO'].' '.$data['APEPAT'].' '.$data['APEMAT']);?></h5></td>
                                    <td><h5 style="font-size: 120%;border: 2px solid black;"><?php if($data['USUROL']=='E'){echo 'Encargado';}else{echo 'Participante';} ?></h5></td>
                                  </tr>
                                  <?php endforeach; ?>
                                </table>
                            <h3>&nbsp;</h3>
                            <h3>Actividades el proyecto:</h3>
                            <?php foreach($tsArray3 as $data2): ?>
                            <h3>Actividad: <?php echo $data2['NOMACTIVIDAD'];?></h3>
                            <h3>Informacion de la actividad</h3>
                            <table style="color:#2C2C2C" class="table">
                              <tr>
                                <td><h4>Descripcion de la actividad</h4></td>
                                <td><h4>Fecha de inicio de la actividad</h4></td>
                                <td><h4>Fecha de finalización de la actividad</h4></td>
                              </tr>
                              <tr>
                                <td><h4><?php echo $data2['DESCACT'];?></h4></td>
                                <td><h4><?php $date= new DateTime($data2['FECINICIO']); echo date_format($date,'d/m/y');?></h4></td>
                                <td><h4><?php $date= new DateTime($data2['FECFIN']); echo date_format($date,'d/m/y');?></h4></td>
                              </tr>
                            </table>
                            <h3>Integrantes de la actividad:</h3>
                            <?php $tsArray4 = $genPDF->getIntAct($data2['IDACTIVIDAD'])?>
                                <h4>Nombre del integrante</h4>
                                <ul>
                                  <?php foreach ($tsArray4 as $data3):?>
                                    <li><h5 style="font-size: 105%"><?php echo ($data3['NOMUSUARIO'].' '.$data3['APEPAT'].' '.$data3['APEMAT']);?></h5></li>
                                  <?php endforeach; ?>
                                </ul>
                                <h5>&nbsp;</h5>
                            <?php endforeach;?>
            <!--</div>--><!-- end container -->
            <!--</section>-->
            <!--</div>-->