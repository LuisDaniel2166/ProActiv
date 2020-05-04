<div class="section bgcolor noover">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message">
                            <h3>Mi perfil</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->

<section class="section">
            <div class="container">
                <?php
                foreach ($tsArray as $data):?>
                            <h3>Nombre:</h3>
                            <h4><?php echo $data['NOMUSUARIO'].' '.$data['APEPAT'].' '.$data['APEMAT'];?></h4>
                            <h3>Fecha de nacimiento</h3>
                            <h4><?php $date= new DateTime($data['FECNAC']);
                                                            echo date_format($date,'d/m/Y');?></h4>
                            <h3>Sexo:</h3>
                            <h4>
                                <?php
                                if($data['SEXO'] == 'H') {
                                        echo 'Hombre';
                                    } else {
                                        echo 'Mujer';
                                    }
                                    ?>
                            </h4>
                            <h3>Usuario de acceso:</h3>
                            <h4><?php echo $data['USUARIO']; ?></h4>
                            <h3>Telefono</h3>
                            <h4><?php echo $data['TELEFONO']; ?></h4>
                            <h3>Correo</h3>
                            <h4><?php echo $data['CORREO']; ?></h4>
                            <h3>Contraseña:</h3>
                            <h4>****************</h4>
               <?php endforeach;?>
                            <p><a href="index.php?action=editPer&idusu2=<?php include "app/model/mcript.php"; 
                                    echo urlencode($encriptar($data['IDUSUARIO']));?>">
                                    <button type="submit" class="btn btn-default">Editar mis datos</button></a></p>
                                
                                <!--<p><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31"></p>-->
            </div><!-- end container -->
        </section>



