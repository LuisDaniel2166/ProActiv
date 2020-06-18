<div class="section bgcolor noover">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tagline-message">
                    <h3>Crear Actividad</h3>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

<section class="section">
    <div class="container">
    <form method="post" action="index.php?action=crearActividad">
                    <input  type="hidden" name="idProyecto" value="<?php echo $id[1];?>" class="form-control">
                    <h3>Nombre de la actividad:</h3>
                    <input type="text" name="nombre_act" class="form-control" placeholder="Nombre de la actividad" required="true">
                    <h3>Descripción de la actividad:</h3>
                    <input type="text" name="desc_act" class="form-control" placeholder="Descripción de la actividad">
                    <?php $date = date("Y-m-d");?>
                    <h4>Fecha de inicio:</h4>
                    <p><input type="date" id="start" name="fec_ini" value="<?php echo $date;?>" min="<?php echo $date;?>" max="2025-12-31" required="true"></p>
                    <h4>Fecha de finalización:</h4>
                    <p><input type="date" id="end" name="fec_fin" value="<?php echo date("Y-m-d",strtotime($date."+ 1 days"));?>" min="<?php echo date("Y-m-d",strtotime($date."+ 1 days"));?>" max="2025-12-31" required="true"></p>
                    
                    <p><button type="submit" class="btn btn-default" role="link" >Crear</button></p>
                    </form> 
    </div><!-- end container -->
</section>