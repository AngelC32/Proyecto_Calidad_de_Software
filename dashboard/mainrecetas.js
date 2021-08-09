$(document).ready(function(){
    tablaRecetas = $("#tablaRecetas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    id=null;
    opcion = 1; //alta
    $("#formRecetas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "blue");
    $(".modal-title").text("Nuevo Usuario");            
    $("#modalCRUD2").modal("show");        

});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");	        
    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    title = fila.find('td:eq(1)').text();
    meet = fila.find('td:eq(2)').text();
    url = fila.find('td:eq(3)').text();

    
    $("#title").val(title);
    $("#meet").val(meet);
    $("#url").val(url);


    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Receta");            
    $("#modalCRUD2").modal("show");  
    
});

//botón BORRAR //funciona
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar la receta de : "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud2.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaRecetas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formRecetas").submit(function(e){
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    title = $.trim($('#title').val()); 
    meet = $.trim($('#meet').val());   
    url = $.trim($('#url').val());
                         
        $.ajax({
          url: "bd/crud2.php",
          type: "POST",
          datatype:"json",    
          data:  {id:id, title:title, meet:meet, url:url ,opcion:opcion},    
          success: function(data) {
            tablaUsuarios.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD2').modal('hide');	 
    
});    
    
});