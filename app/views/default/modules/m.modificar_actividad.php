<?php foreach ($info as $datos):?>

<div class="section bgcolor noover">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message">
						<!--Nombre de la actividad -->
						<h1>Modificar actividad: <?php echo $datos['NOMACTIVIDAD']?></h1>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->

<section class="section">
	<div class="container">
	<h3>Nombre de la actividad:</h3>
                            <input type="text" name="nombre_act" class="form-control" placeholder="Nombre de la actividad" value="Actividad 1">
                            <h3>Descripcion de la actividad:</h3>
                            <textarea type="text" name="desc_act" class="form-control" placeholder="Descripcion de la actividad">Descripción de la actividad 1</textarea>
                            <h3>Seleccionar integrantes:</h3>
                            <select>
                              <option value="1">Luis Daniel Mendez Castellanos</option>
                              <option value="2">Keiry Yoseli Rodriguez Gonzalez</option>
                              <option value="3">Alexis Torres Acosta</option>
                              <option value="4">Fernando Miramontes Alvarez</option>
                              <option value="5">Omar Oswaldo Rivera Flores</option>
                            </select>
                            <h4>Integrantes a registrar en la actividad</h4>
                            <ul>
                                <li>Alexis Torres Acosta</li>
                                <li>Keiry Yoseli Rogriguez Gonzalez</li>
                            </ul>
                            <h4>Fecha de inicio:</h4>
                            <p><input type="date" id="start" name="trip-start" value="2019-12-02" min="2019-12-02" max="2020-12-31"></p>
                            <h4>Fecha de finalización:</h4>
                            <p><input type="date" id="start" name="trip-start" value="2019-12-02" min="2019-12-02" max="2020-12-31"></p>
                                <p><button type="submit" class="btn btn-default" role="link" onclick="window.location='mis_actividades.html'">Editar actividad</button></p>
                                <!--<p><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31"></p>-->
		<!--<p><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31"></p>-->
	</div><!-- end container -->
</section><?php endforeach;?>