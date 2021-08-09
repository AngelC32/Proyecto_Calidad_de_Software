$(document).ready(function(){
    tablaCitas = $("#tablaCitas").DataTable({
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
    $("#formCitas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "blue");
    $(".modal-title").text("Nuevo Usuario");            
    $("#modalCRUD1").modal("show");        

});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");	        
    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    paciente = fila.find('td:eq(1)').text();
    number = fila.find('td:eq(2)').text();
    email = fila.find('td:eq(3)').text();
    sintomas = fila.find('td:eq(4)').text();
    saturacion = fila.find('td:eq(5)').text();
    doctor = fila.find('td:eq(6)').text();
    fecha = fila.find('td:eq(7)').text();
    hora = fila.find('td:eq(8)').text();
    
    $("#paciente").val(paciente);
    $("#number").val(number);
    $("#email").val(email);
    $("#sintomas").val(sintomas);
    $("#saturacion").val(saturacion);
    $("#doctor").val(doctor);
    $("#fecha").val(fecha);
    $("#hora").val(hora);

    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Cita");            
    $("#modalCRUD1").modal("show");  
    
});

//botón BORRAR //funciona
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar la cita de : "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud1.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaCitas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formCitas").submit(function(e){
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    paciente = $.trim($('#paciente').val()); 
    number = $.trim($('#number').val());   
    first_name = $.trim($('#email').val());
    sintomas = $.trim($('#sintomas').val()); 
    saturacion = $.trim($('#saturacion').val());
    doctor = $.trim($('#doctor').val());
    fecha = $.trim($('#fecha').val());
    hora = $.trim($('#hora').val());                            
        $.ajax({
          url: "bd/crud1.php",
          type: "POST",
          datatype:"json",    
          data:  {id:id, paciente:paciente,number:number, email:email, sintomas:sintomas ,saturacion:saturacion,doctor:doctor, fecha:fecha, hora:hora ,opcion:opcion},    
          success: function(data) {
            tablaUsuarios.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD1').modal('hide');	 
    
});    
    
});