<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Tabla de Citas Médicas</h1>
    
    
    
 <?php
include_once '../php/config.php';
//$objeto = new Conexion();
//$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM files";
$resultado = $connection->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <!-- <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>     -->
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaCitas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Paciente</th>
                                <th>Numero Telefónico</th>                                
                                <th>Email</th>  
                                <th>Enlace meet</th>
                                <th>Saturacion Oxigeno</th>
                                <th>Doctor</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['paciente'] ?></td>
                                <td><?php echo $dat['number'] ?></td>
                                <td><?php echo $dat['email'] ?></td>
                                <td><?php echo $dat['sintomas'] ?></td>
                                <td><?php echo $dat['saturacion'] ?></td> 
                                <td><?php echo $dat['doctor'] ?></td>
                                <td><?php echo $dat['fecha'] ?></td>
                                <td><?php echo $dat['hora'] ?></td>     
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document1">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formCitas">    
            <div class="modal-body">
                <div class="form-group">
                <label for="" class="col-form-label">Paciente:</label>
                <input type="text" class="form-control" id="paciente" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Numero:</label>
                <input type="text" class="form-control" id="number" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Email:</label>
                <input type="text" class="form-control" id="email" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Enlace Meet:</label>
                <input type="text" class="form-control" id="sintomas" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Saturacion:</label>
                <input type="text" class="form-control" id="saturacion" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Doctor:</label>
                <input type="text" class="form-control" id="doctor" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Fecha:</label>
                <input type="text" class="form-control" id="fecha" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Hora:</label>
                <input type="text" class="form-control" id="hora" required>
                </div>
                                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>