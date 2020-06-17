<div class="section bgcolor noover">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="tagline-message">
						<!--Nombre de la actividad -->
						<h3>Información de la actividad</h3>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->

<section class="section">
		<div class="container">
		<h3>Actividad:</h3>
		<div id="nomACT">
	        <h4 style="color:#2C2C2C"><?php echo $tsArray['NOMACTIVIDAD'];?></h4>
	    </div>
			<!--Descripcion de la actividad-->
			<h3>Integrantes de la actividad:</h3>
				 <?php foreach($tsArray2 as $data2):?>
			 	<ul>
                <li style="color:#2C2C2C"><?php echo $data2['NOMBRE'];?></li>
                </ul>
			 <?php endforeach;?>
		<!--Estado de la actividad-->
		<h3>Estado de la Actividad:</h3>
		<p style="color:#2C2C2C">
			<?php if($tsArray3['ESTADO']=='A'){
					echo "Activo";
				}
				else{
					echo "Finalizado";
				}?>
		</p>
		<!--Fecha de inicio-->
		<h3>Fecha de inicio de la Actividad:</h3>
		<p style="color:#2C2C2C">
			<?php $date= new DateTime($tsArray['FECINICIO']);
                       echo date_format($date,'d/m/Y');?>
		</p>
		<!--Fecha de finalizacion-->
		<h3>Fecha de finalizacion de la Actividad:</h3>
		<p style="color:#2C2C2C">
			<?php $date1= new DateTime($tsArray['FECFIN']);
                       echo date_format($date1,'d/m/Y');?>
		</p>
		<h3>Descripcion:</h3>
		<!--Descripcion-->
		<p style="color:#2C2C2C">
			<?php echo $tsArray['DESCACT']?>
		</p>
		<br></br>
		<p>
			
			<button method='post' type="submit" name="btn_editar" onclick="window.location='index.php?action=editAct&idAct=<?php echo $tsArray['IDACTIVIDAD'];?>'" class="btn btn-default">
				Editar actividad
			</button>
		</p>


		
		<!--<p><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31"></p>-->
	</div><!-- end container -->
</section>