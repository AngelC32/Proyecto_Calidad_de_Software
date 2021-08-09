<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Tabla de Recetas Médicas</h1>
    
    
    
 <?php
include_once '../php/config.php';
//$objeto = new Conexion();
//$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM receta";
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
                        <table id="tablaRecetas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Paciente</th>
                                <th>Descripción</th>                                
                                <th>URL</th>  
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['title'] ?></td>
                                <td><?php echo $dat['meet'] ?></td>
                                <td><?php echo $dat['url'] ?></td>   
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
<div class="modal fade" id="modalCRUD2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formRecetas">    
            <div class="modal-body">
                <div class="form-group">
                <label for="" class="col-form-label">Paciente:</label>
                <input type="text" class="form-control" id="title" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">Enlace meet:</label>
                <input type="text" class="form-control" id="meet" required>
                </div>
                <div class="form-group">
                <label for="" class="col-form-label">URL:</label>
                <input type="text" class="form-control" id="url" required>
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