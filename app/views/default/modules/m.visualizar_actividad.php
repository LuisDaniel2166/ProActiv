<?php foreach ($info as $datos):?>

<div class="section bgcolor noover">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message">
						<!--Nombre de la actividad -->
						<h1>Actividad: <?php echo $datos['NOMACTIVIDAD']?></h1>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->

<section class="section">
	<div class="container">
		<h2>Informacion</h2>
		<!--Descripcion de la actividad-->
		<h4><b>Integrantes de la actividad:</b></h4>
			 <?php foreach($nomb as $names):?>
			 	<ul>
                <li style="color:#2C2C2C"><?php echo $names['NOMBRE'];?></li>
                </ul>
			 <?php endforeach;?>
		<!--Estado de la actividad-->
		<h4><b>Estado de la Actividad:</b></h4>
		<p style="color:#2C2C2C">
			<?php if($datos['ESTADO']=='A'){
					echo "Activo";
				}
				else{
					echo "Finalizado";
				}?>
		</p>
		<!--Fecha de inicio-->
		<h4><b>Fecha de inicio de la Actividad:</b></h4>
		<p style="color:#2C2C2C">
			<?php $date= new DateTime($datos['FECINICIO']);
                       echo date_format($date,'d/m/Y');?>
		</p>
		<!--Fecha de finalizacion-->
		<h4><b>Fecha de finalizacion de la Actividad:</b></h4>
		<p style="color:#2C2C2C">
			<?php $date1= new DateTime($datos['FECFIN']);
                       echo date_format($date1,'d/m/Y');?>
		</p>
		<h4><b>Descripcion:</b></h4>
		<!--Descripcion-->
		<p style="color:#2C2C2C">
			<?php echo $datos['DESCACT']?>
		</p>
		<p>
			<button method='post' type="submit" name="btn_editar" onclick="window.location='index.php?action=editAct$idAct=<?php echo $datos['IDACTIVIDAD'];?>'" class="btn btn-default">
				Editar actividad
			</button>
		</p>

		<!--<p><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31"></p>-->
	</div><!-- end container -->
</section><?php endforeach;?>