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
                            <form method="post" action="index.php?action=modPro">
                            <h3>Nombre del proyecto:</h3>
                            <input type="text" name="nombre_Pro" class="form-control" placeholder="Nombre de la actividad" value="<?php echo $tsArray['NOMPROY']?>">
                            <h3>Descripcion del proyecto:</h3>
                           <input type="text" name="Desc_Pro" class="form-control" placeholder="Descripcion del proyecto" value="<?php echo $tsArray['DESCPROY']?>">
                            
                             

                            <form method="POST">
                            <h3>Seleccionar integrantes:</h3>


                            

                            <div style="text-align:center;">
                                <h5>Elige a los miembros participantes</h5>
                            <select name="Usuarios" id='usuarios' onChange="TextoUsuario(this);" autofocus>
                            
                            <?php foreach($tsArray2 as $data): ?>
                            <option value="<?php echo $data['IDUSUARIO'];?>"><?php echo ($data['NOMUSUARIO'].' '.$data['APEPAT'].' '.$data['APEMAT']);?></option>
                             <?PHP endforeach;?> 
                             <option value="0" selected>Seleccione a un usuario</option>
                             </select>
                             <h5>Asigna los roles correspondientes</h5>
                             <select name="Usuarios" onChange="TextoRol(this);" autofocus>
                                <option value="1">Encargado</option>
                                <option value="2">Participante</option>
                                <option value="0" selected>Seleccione un rol</option>
                             </select>

                            </div>

                         




                              


                            <!-- Metodo para la creación de la tabla dinámica -->
                            
                                 <input type="text"name = "TextoID" id="result" size="20"  placeholder ="" value = ""  >
                                 <input type="text"name = "TextoRoles" id="idTextoRoles" size="20"  placeholder ="" value = "" >
                                 <input type="text"name = "TextoIDProyecto" id="idTextoRoles" size="20"  placeholder ="" value = "<?php echo $tsArray['IDPROYECTO']?>">
                                  <table>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Rol</th>
                                    </tr>

                                    <tbody id="tbody"></tbody>
                                </table>    

                                <p>
                                    <button type="button" name ="button" onclick="addItem();">Añadir Miembro</button>
                                </p>

                               
                           


                            <!-- Css de la tabla dinamica -->
                            <style type="text/css">
                                table {
                                    width: 100%;
                                    border-collapse: collapse;
                                }
                                table tr td,
                                table tr th {
                                    border: 1px solid black;
                                    padding: 10px;
                                }
                            </style>
  
                            <!-- Funcion para obtener el texto del CMB 1 -->
                            <script>

                                Array.prototype.diff = function(arr2) {
                                    var ret = [];
                                    this.sort();
                                    arr2.sort();
                                    for(var i = 0; i < this.length; i += 1) {
                                        if(arr2.indexOf(this[i]) > -1){
                                            ret.push(this[i]);
                                        }
                                    }
                                    return ret;
                                };


                                function TextoUsuario(element) {


                                     id =   element.options[element.selectedIndex].value;
                                     text = element.options[element.selectedIndex].text; 
                                     var arreglo1;
                                     var arreglo2;
                                     estado = "2";
                                     var txt = document.getElementById("result").value;
                                    
                                      if (txt == "") {
                                      txt = txt + id;
                                      document.getElementById("result").value = txt; 
                                      estado = "2";
                                            
                                      }
                                      else {

                                        if(txt.includes(id)){
                                            estado = "1";
                                            id=null;
                                        }else{
                                            txt = txt +","+ id;
                                            document.getElementById("result").value = txt; 
                                            estado = "2";
                                        }       
                                       
                                        
                                      }
                                  
                                                                       // ...
                                }


                                function TextoRol(element) {
                                     texto = element.options[element.selectedIndex].text;
                                     var txt = document.getElementById("idTextoRoles").value;
                                     var auxiliar;
                                     if(texto == 'Encargado'){
                                        auxiliar = 'E';

                                     }//Primer if
                                      else if (texto == 'Participante'){
                                        auxiliar = 'N';
                                     }//Primer else if

                                      if (txt == "") {
                                      txt = txt + auxiliar;
                                      document.getElementById("idTextoRoles").value = txt;   
                                      }//Validación de vacío

                                      else {
                                        if(estado =="1"){
                                            auxiliar = "";
                                            txt = txt+ auxiliar;
                                            document.getElementById("idTextoRoles").value = txt;  
                                        }//Si no es vacío y el estado es 1
                                        else if (estado=="2"){
                                      txt = txt +","+ auxiliar;
                                      document.getElementById("idTextoRoles").value = txt;  
                                  }//Si no es vacio y el estado es 2    
                                    // ...
                                }//Si no es vacío
                            }
                                //Funcion para crear las nuevas filas de la tabla
                                var text  //Nombre
                                var texto //Rol
                                var id
                                var sel
                                var estado = "2";
                                var items = 0;                              
                                var Nombres ="";                                
                                function addItem() {
                                    if (text=="undefined"){
                                        return;
                                    }   

                                    
                                    items++;
                                    if (estado=="1") {return;}
                                    var html = "<tr>";
                                        html += "<td>" + id + "</td>";
                                        html += "<td>"+text+"</td>";
                                        html += "<td>"+texto+"</td>";
                                    html += "</tr>";

                                    var row = document.getElementById("tbody").insertRow();
                                    row.innerHTML = html;

                                    
                                }
                            </script>

                             


                            


                            </ul>
                            <h4>Fecha de inicio:</h4>
                            <p><input type="date" id="start" name="trip-start" value="<?php echo $tsArray['FEINIPRO']?>" min="2020-06-18" max="2021-12-31"></p>
                            <h4>Fecha de finalización:</h4>
                            <p><input type="date" id="start" name="trip-end" value="<?php echo $tsArray['FEFINPRO']?>" min="2020-06-19" max="2021-12-31"></p>
                            <p><button type="submit" class="btn btn-default" role="link" >Guardar Cambios</button></p>
                             </form>
                             <p><a href="index.php?action=visualizarProyecto&idProy=<?php echo $tsArray['IDPROYECTO']?>">><button type="submit" name="editar" class="btn btn-default" role="link" onclick="'m.modificar_proyecto.php" >Cancelar</button></a></p>  




                                <!--<p><input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2018-12-31"></p>-->
            </div><!-- end container -->
        </section>