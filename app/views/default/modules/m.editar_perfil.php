<div class="section bgcolor noover">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message">
                            <h3>Editar informacion</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->
<section class="section">
            <div class="container">
                <form method="post" action="index.php?action=eper">
                <?php
                foreach ($tsArray as $data):?>
                            <h3>Nombre:</h3>
                            <input type="text" name="nom" class="form-control" placeholder="Nombre completo" value="<?php echo $data['NOMUSUARIO'];?>">
                            <h3>Apellido Paterno:</h3>
                            <input type="text" name="ap" class="form-control" placeholder="Apellido paterno" value="<?php echo $data['APEPAT'];?>">
                            <h3>Apellido Materno:</h3>
                            <input type="text" name="am" class="form-control" placeholder="Apellido materno" value="<?php echo $data['APEMAT'];?>">
                            <h3>Fecha de nacimiento:</h3>
                            <input type="date" name="nac"  placeholder="Edad" value="<?php echo $data['FECNAC'];?>">
                            <h3>Sexo:</h3>
                            <select name="gen">
                                <option value="H">Masculino</option>
                                <option value="M" <?php if($data['SEXO'] == 'M') {echo 'selected=true';}?> >Femenino</option>
                            </select>
                            <h3>Nombre de usuario:</h3>
                            <input type="text" name="nomus" class="form-control" placeholder="Nombre de usuario" value=<?php echo $data['USUARIO']; ?>>
                             <h3>Telefono:</h3>
                            <input type="text" name="tel" class="form-control" placeholder="Telefono" value=<?php echo $data['TELEFONO']; ?>>
                            <h3>Correo:</h3>
                            <input type="text" name="correo" class="form-control" placeholder="Correo" value=<?php echo $data['CORREO']; ?>>
                            <h3>Contraseña:</h3>
                            <input type="password" name="pass" class="form-control" placeholder="Contraseña" value="<?php echo $data['CONTRASENA']; ?>" >
                            <h3>Permisos:</h3>
                             <select name="tip">
	                            	<option value="A">Administrador</option>
	                              	<option value="N"<?php  if($data['TYPEUSR'] == 'N') {echo 'selected=true';}?>>Estandar</option>
	                        </select>       
                            <input  name="id" class="form-control" type="hidden" value=<?php echo $data['IDUSUARIO']; ?>>
    
                            <br/>
                            <br/>
                            <p><button type="submit" class="btn btn-default" role="link">Editar información</button></p>
                               <?php endforeach;?>
               
                </form>
            </div><!-- end container -->
        </section>

