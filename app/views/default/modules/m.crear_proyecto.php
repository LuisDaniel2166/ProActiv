<div class="section bgcolor noover">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message">
                            <h3>Crear proyecto</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->

        <section class="section">
            <div class="container">
            <form method="post" action="index.php?action=crearProy">
                            <h3>Nombre del proyecto:</h3>
                            <input type="text" name="nombre_proy" class="form-control" placeholder="Nombre de la actividad" required="true">
                            <h3>Descripcion del proyecto:</h3>
                            <input type="text" name="desc_proy" class="form-control" placeholder="Descripcion de la actividad">
                            <h4>Fecha de inicio:</h4>
                            <p><input type="date" name="fec_ini" value="2020-06-18" min="2020-06-18" max="2021-12-31" required="true"></p>
                            <h4>Fecha de finalización:</h4>
                            <p><input type="date"  name="fec_fin" value="2020-06-19" min="2020-06-19" max="2021-12-31" required="true"></p>
                            <p><button type="submit" class="btn btn-default" role="link" >Guardar actividad</button></p>
                            </form>                
            </div><!-- end container -->
        </section>