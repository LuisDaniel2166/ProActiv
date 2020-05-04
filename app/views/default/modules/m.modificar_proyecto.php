<div class="section bgcolor noover">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message">
                            <h3>Editar proyecto</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->

        <section class="section">
            <div class="container">
                            <h3>Nombre del proyecto:</h3>
                            <input type="text" name="nombre_act" class="form-control" placeholder="Nombre de la actividad" value="Actividad 1">
                            <h3>Descripcion del proyecto:</h3>
                            <textarea type="text" class="form-control" placeholder="Descripcion de la actividad">Descripcion de la actividad 1</textarea>
                            <h3>Seleccionar integrantes:</h3>
                            <h4>Integrantes a registrar en la actividad</h4>
                            <!--Integrantes del proyecto-->
            <h3>Integrantes del proyecto:</h3>
            <div id="nomusuario">
            <?php
            function generar_tabla(){
             foreach($tsArray2 as $data): ?>
                <ul>
                    <li><h5 style="color:#2C2C2C"><?php echo $data['NOMUSUARIO'].' '.$data['APEPAT'].' '.$data['APEMAT'];?></h5> </li>
                </ul>
            <?php endforeach;?>
            }
            </div>
     <form action="functioncalling.php">
            <input type="text" name="txt" />
            <input type="submit" name="insert" value="insert" onclick="generar_tabla()" />
            </form>
  

                               
     <?php   
     $conexion= mysqli_connect('localhost', 'root', '', 'proactiv')       
        ?>
        <br>        
        <table border ="2"> 
            <tr>
                <td>nomusuario</td>
                <td>apepat</td>
                <td>apemat</td>
                
            </tr>
         <?Php
            $sql ="select nomusuario,apepat,apemat from usuario";
            $result = mysqli_query($conexion,$sql);            
            while($mostrar = mysqli_fetch_array($result)){
         ?>
            
            <tr>
                <td><?php echo $mostrar['nomusuario']?></td>
                <td><?php echo $mostrar['apepat']?></td>
                <td><?php echo $mostrar['apemat']?></td>
            </tr>
            
        <?php        
            }
        ?>
                            <select>
                              <option value="1">Luis Daniel Mendez Castellanos</option>
                              <option value="2">Keiry Yoseli Rodriguez Gonzalez</option>
                              <option value="3">Alexis Torres Acosta</option>
                              <option value="4">Fernando Miramontes Alvarez</option>
                              <option value="5">Omar Oswaldo Rivera Flores</option>
                            </select>
                            <h4>Integrantes a registrar en la actividad</h4>
                            
                            
                            
                            <h5>Marcar el checkbox para definir a los encargados del proyecto</h5>
                            <ul>
                                <li>Alexis Torres Acosta <input type="checkbox" id="cbox1" value="first_checkbox"></li>
                                <li>Keiry Yoseli Rogriguez Gonzalez <input type="checkbox" id="cbox1" value="first_checkbox"></li>
                            </ul>
                            <h4>Fecha de inicio:</h4>
                            <p><input type="date" id="start" name="trip-start" value="2019-12-02" min="2019-12-02" max="2020-12-31"></p>
                            <h4>Fecha de finalización:</h4>
                            <p><input type="date" id="start" name="trip-start" value="2019-12-02" min="2019-12-02" max="2020-12-31"></p>
                                <p><button type="submit" class="btn btn-default" role="link" onclick="window.location='mis_actividades.html'">Editar actividad</button></p>
                                <!--<p><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31"></p>-->
            
            
            
            
            
            </div><!-- end container -->
        </section>
        
