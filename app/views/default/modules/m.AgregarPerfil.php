  <div class="section bgcolor noover">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message">
                            <h3>Agregar usuario</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section --> 

<section class="section">
            <div class="container">
                <form method="post" action="index.php?action=aUsu">
                            <h3>Nombre:</h3>
                            <input type="text" name="nom" class="form-control" placeholder="Nombre completo" required="true">
                            <h3>Apellido Paterno:</h3>
                            <input type="text" name="ap" class="form-control" placeholder="Apellido paterno">
                            <h3>Apellido Materno:</h3>
                            <input type="text" name="am" class="form-control" placeholder="Apellido materno" >
                            <h3>Fecha de nacimiento:</h3>
                            <input type="date" name="nac"  placeholder="Edad" required="true">
                            <h3>Sexo:</h3>
                            <select name="gen">
                            	<option value="H">Masculino</option>
                              	<option value="M">Femenino</option>
                            </select>
                            <h3>Nombre de usuario:</h3>
                            <input type="text" name="nomus" class="form-control" placeholder="Nombre de usuario" required="true">
                            <h3>Teléfono:</h3>
                            <input type="text" name="tel" class="form-control" placeholder="Telefono">
                            <h3>Correo Electrónico:</h3>
                            <input type="text" name="correo" class="form-control" placeholder="Correo electronico">
                            <h3>Contraseña:</h3>
                            <input type="password" name="pass" class="form-control" placeholder="Contraseña" required="true" >
                            <h3>Permisos:</h3>
                            <p>
                                <select name="tip">
	                            	<option value="A">Administrador</option>
	                              	<option value="N">Estándar</option>
	                        </select>
                            </p>
                            <p><button type="submit" class="btn btn-default" role="link">Agregar usuario</button></p>
                </form>
       
                
                                <!--<p><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31"></p>-->
            </div><!-- end container -->
        </section>