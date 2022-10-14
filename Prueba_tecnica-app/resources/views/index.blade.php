<style>
    #content {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-around;
        width: 100%;
    }
    
    #div1 {
        color: bisque;
        width: 20%;
        height: 110%;
        top: 10%;
        left: 5%;
        background-color: rgb(89, 89, 89, 0.6);
        border-radius: 20px;
        min-width: 300px;
        padding: 20px;
    }
    
    #div2 {
        top: 10%;
        width: 65%;
        height: 100%;
        left: 30%;
        background-color: rgb(89, 89, 89, 0.6);
        border-radius: 20px;
        padding: 20px;
    }
    
    .contenedor {
        width: 80%;
        height: 40%;
        left: 10%;
        top: 10%;
        position: relative;
        opacity: 3.0;
    }
    
    body {
        background-repeat: no-repeat, repeat;
    }
    
    .title {
        text-align: center;
        font-weight: bold;
        font-family: italic;
        color: #47A595;
    }
    
    #data_table_wrapper {
        background-color: aliceblue;
        border-radius: 10px;
    }
    
    #data_table {
        background-color: aliceblue;
    }
</style>

<!DOCTYPE html>
<html lang="es">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>




<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <h1 class="title">Ordenes</h1>
    <section id="content">
        <!------------------------------------------Modal----------------------------------------------------------------------->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Agregar Orden</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <select class="form-control form-control-lg" type="select" id="sel_clientes" style="width: 40%;"></select>
                        <br>
                        <select class="form-control form-control-lg" type="select" id="sel_producto" style="width: 40%; margin-left: 50%; margin-top: -72px"></select>
                        <br>
                        <input type="text" class="validar form-control form-control-lg" placeholder="Cantidad" id="cantidad_producto"style="width: 40%;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="Cerrar_modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="Guardar_ord">Guardar</button>
                    </div>
                    </div>
                </div>
        </div>
        <!---------------------------------------------------------------------------------------------------------------------->
        <!------------------------------------------Modal2----------------------------------------------------------------------->
        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Detalle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div><Label id="Label_Info"></Label></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="Cerrar_modal2">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="Guardar">Guardar</button>
                    </div>
                    </div>
                </div>
        </div>
        <!---------------------------------------------------------------------------------------------------------------------->
        <!------------------------------------------Modal3----------------------------------------------------------------------->
        <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Detalle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label>Orden:</label>
                        <input class="form-control form-control-lg" type="text" id="up_ord" style="width: 80%;" readonly>
                        <br>
                        <label>Status:</label>
                        <select class="form-control form-control-lg" type="select" id="up_status" style="width: 80%;">
                            <option value="Preparando">Preparando</option>
                            <option value="Despachado">Despachado</option>
                            <option value="Entregado">Entregado</option>
                            <option value="Cancelado">Cancelado</option>
                        </select>
                        <br>
                        <label>Fecha Entrega:</label>
                        <input class="form-control form-control-lg" type="date" id="up_entrega" style="width: 80%;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="Cerrar_modal3">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="Update_ord">Guardar</button>
                    </div>
                    </div>
                </div>
        </div>
        <!---------------------------------------------------------------------------------------------------------------------->
        <div id="div1">
            <div class="contenedor" id="select_control">
                <h4 style="color: white">Seleccione para agregar</h4>
                <br>
                <select class="form-control form-control-lg" type="select" id="Tipo">
                    <option value="0">Seleccionar</option>
                    <option value="1">Clientes</option>
                    <option value="2">Productos</option>
                    <option value="3">Ciudades</option>
                </select>
            </div>
            <div class="contenedor" id="div_Clientes">
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="Documento Cliente:" id="doc_cliente">
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="Nombre:" id="nom_cliente">
                <br>
                <input class="form-control form-control-lg" type="date" placeholder="Cumpleaños:" id="cumpleaños">
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="Email:" id="email">
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="Telefono:" id="phone">
                <br>
                <select class="form-control form-control-lg" type="select" id="id_ciudad"></select>
            </div>
            <div class="contenedor" id="div_Productos">
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="Descripción Producto:" id="des_producto">
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="Cantidad Producto:" id="cant_producto">
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="Valor Producto:" id="valor_producto">
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="Status Producto:" id="status_producto">
            </div>
            <div class="contenedor" id="div_Ciudades">
                <br>
                <input class="form-control form-control-lg" type="text" placeholder="Nombre Ciudad:" id="nom_ciudad">
            </div>
            <div class="contenedor">
                <br>
                <button type="button" class="btn btn-primary" style="background-color: FE6406;" id="butt_reg">Registrar</button>
            </div>
        </div>
        <br>
        <div id="div2">
            <table class="table table-bordered table-striped table-hover" id="data_table">
                <thead>
                    <tr>
                        <th>Código Orden</th>
                        <th>Documento Cliente</th>
                        <th>Nombre Cliente</th>
                        <th>Fecha Orden</th>
                        <th>Total Orden</th>
                        <th>Fecha Entrega</th>
                        <th>Status</th>
                        <th>Acción</th>
                    </tr>
                </thead>
            </table>
            <div style="margin-top:2%;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Agregar Orden</button>
            </div>
        </div>
        
    </section>
</body>

</html>
<script>
    $(document).ready(function(){

        Limpiar();

        cargar();

        cargar2();

        cargar3();

        var table = $('#data_table').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            "width": false,
            dom: 'Bfrtip',
            ajax: '{{route('datatable.Listar')}}',
            columns: [{
                data: 'Id_Orden'
            }, {
                data: 'Numero_id_Cliente'
            },{
                data: 'Nombre_Cliente'
            },{
                data: 'Fecha_Orden'
            },{
                data: 'Total_Orden'
            },{
                data: 'Fecha_Entrega_Orden'
            },{
                data: 'Status_Orden'
            },{
                data: 'validate',
                defaultContent: `
                <button type="button" class="btn btn-sm btn-primary botondetalle" >Detalle</button>
                <button class='btn btn-sm btn-warning botoneditar' type='button'>Editar</button>
                <button class='btn btn-sm btn-danger botoneliminar' type='button'>Eliminar</button>`,
            }],
            order: [
                [1, 'asc']
            ]
        });

    
        
        $("#Cerrar_modal").on('click', function(){
            location.reload();
        });

        $("#Cerrar_modal2").on('click', function(){
            location.reload();
        });

        $("#Cerrar_modal3").on('click', function(){
            location.reload();
        });
        
        $("#Guardar_ord").on('click', function(){
            
            var cliente = $("#sel_clientes").val();
            var producto = $("#sel_producto").val();
            var cantidad = $("#cantidad_producto").val();
            producto = producto.split('*/*');
            var total = producto[1] * cantidad;
            var prod = producto[0];

            let date_ob = new Date();
                let date = ("0" + date_ob.getDate()).slice(-2);
                let month = ("0" + (date_ob.getMonth() + 1)).slice(-2);
                let year = date_ob.getFullYear();
                let hours = date_ob.getHours();
                let minutes = date_ob.getMinutes();
                let seconds = date_ob.getSeconds();
                let tiempo = (year + "-" + month + "-" + date);

            $.ajax({
                method: "GET",
                url: "{{ route('orden.nuevo') }}",
                data: { 
                    cliente:cliente,
                    prod:prod,
                    total:total,
                    tiempo:tiempo
                },
                success:function(response){
                  Swal.fire({
                  title: 'Agregado exitoso',
                  confirmButtonText: 'Ok',
                }).then((result) => {
                  if (result.isConfirmed) {
                    location. reload();
                  }
                  else{
                    location. reload();
                  }
                })
              }
            });

        });
        

        $('#data_table tbody').on('click', 'button.botoneliminar', function() {

            var registro = table.row($(this).parents('tr')).data();

            var codigo = registro.Id_Orden;

            Swal.fire({
                title: `¿Seguro deseas eliminar la orden #${codigo}?`,
                confirmButtonText: 'Ok',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('eliminar.orden') }}",
                        data: { 
                            orden:codigo,
                        },
                        success:function(response){
                                Swal.fire({
                                title: 'Borrado exitoso',
                                confirmButtonText: 'Ok',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location. reload();
                                    }
                                    else{
                                        location. reload();
                                    }
                                })
                            }
                    });
                }
            })
        });

        $('#data_table tbody').on('click', 'button.botondetalle', function() {

            var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop2'), {
            keyboard: false
            })
            myModal.show();

            var registro = table.row($(this).parents('tr')).data();

            $.ajax({
                method: "GET",
                url: "{{ route('detalle') }}",
                data: { 
                    orden:registro.Id_Orden,
                },
                success:function(response){
                    let dat = response.data[0];
                    console.log(dat);

                    $('#Label_Info').html(`
                    <h5><span style="color: #47A595">
                    <b>Producto:</b></span> ${dat.Descripcion_Producto}<span style="color: #47A595"><br>
                    <b>Valor Unidad:</b></span> ${dat.Valor_Producto} $Col<span style="color: #47A595"><br>
                    <b>Cantidad:</b></span> ${dat.cantidad}<span style="color: #47A595"></h5>`);
                }
            });

        });


        $('#data_table tbody').on('click', 'button.botoneditar', function() {

            var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop3'), {
            keyboard: false
            })
            myModal.show();

            var registro = table.row($(this).parents('tr')).data();

            console.log(registro);

            $("#up_ord").val(registro.Id_Orden);
            $("#up_status").val(registro.Status_Orden);
            $("#up_entrega").val(registro.Fecha_Entrega_Orden);

        });
        
    });

    $("#Update_ord").on('click', function(){
        
        var ord = $("#up_ord").val();
        var status = $("#up_status").val();
        var entrega = $("#up_entrega").val();

        if(entrega == ''){
            Swal.fire('No deje campos sin llenar');
        }else{

            $.ajax({
                method: "GET",
                url: "{{ route('update.ord') }}",
                data: { 
                    ord:ord,
                    status:status,
                    entrega:entrega
                },
                success:function(response){
                        Swal.fire({
                        title: 'Actualizacion exitosa',
                        confirmButtonText: 'Ok',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location. reload();
                            }
                            else{
                                location. reload();
                            }
                        })
                }
        });

        }

        
    })



    $("#butt_reg").click(function() {
        
        var tipo = $("#Tipo").val();

        if(tipo == 0){
            Swal.fire('Debe seleccionar un elemento de la lista');
        }
        
        if(tipo == 1){

            var doc = $("#doc_cliente").val();
            var nom = $("#nom_cliente").val();
            var cumple = $("#cumpleaños").val();
            var email = $("#email").val();
            var tel = $("#phone").val();
            var ciudad = $("#id_ciudad").val();
            ciudad = ciudad.split('*/*');
            
            
            $.ajax({
                method: "GET",
                url: "{{ route('cliente.nuevo') }}",
                data: { 
                    doc:doc,
                    nom:nom,
                    cumple:cumple,
                    email:email,
                    tel:tel,
                    ciudad:ciudad[0],
                },
                success:function(response){
                  Swal.fire({
                  title: 'Agregado exitoso',
                  confirmButtonText: 'Ok',
                }).then((result) => {
                  if (result.isConfirmed) {
                    location. reload();
                  }
                  else{
                    location. reload();
                  }
                })
              }
            });
        }

        if(tipo == 2){
            var des = $("#des_producto").val();
            var cant = $("#cant_producto").val();
            var valor = $("#valor_producto").val();
            var status = $("#status_producto").val();
            
            
            $.ajax({
                method: "GET",
                url: "{{ route('producto.nuevo') }}",
                data: { 
                    des:des,
                    cant:cant,
                    valor:valor,
                    status:status,
                },
                success:function(response){
                  Swal.fire({
                  title: 'Agregado exitoso',
                  confirmButtonText: 'Ok',
                }).then((result) => {
                  if (result.isConfirmed) {
                    location. reload();
                  }
                  else{
                    location. reload();
                  }
                })
              }
            });
        }

        if(tipo == 3){
            var nom = $("#nom_ciudad").val();
            
            $.ajax({
                method: "GET",
                url: "{{ route('ciudad.nuevo') }}",
                data: { 
                    nom:nom
                },
                success:function(response){
                  Swal.fire({
                  title: 'Agregado exitoso',
                  confirmButtonText: 'Ok',
                }).then((result) => {
                  if (result.isConfirmed) {
                    location. reload();
                  }
                  else{
                    location. reload();
                  }
                })
              }
            });
        }

    });

    $("#Tipo").on('change', function() {

            Limpiar();

        if ($("#Tipo").val() == 0) {

            Limpiar();
        }
        if ($("#Tipo").val() == 1) {

            $("#div_Clientes").show();
        }
        if ($("#Tipo").val() == 2) {

            $("#div_Productos").show();
        }
        if ($("#Tipo").val() == 3) {
            
            $("#div_Ciudades").show();
        }
    })

    function addOptions(array) {
        var options = `<option value="0">Ciudad</option>`;
        array.forEach(element => {
            options += `<option value="${element.Id_Ciudad}*/*${element.Nombre_Ciudad}">${element.Nombre_Ciudad}</option>`;
        });
        $("#id_ciudad").append(options);
    }



    function cargar() {
        $("#id_ciudad").empty();
        var datosd = fetch('{{route('select.Ciudad')}}', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(function(request) {
                return request.json();
            })
            .then(function(response) {
                var array = response.data;
                array.sort();
                addOptions(array);
                return response.data;
            })
    }


    function addOptions2(array) {
        var options = `<option value="0">Cliente</option>`;
        array.forEach(element => {
            options += `<option value="${element.Id_Cliente}">${element.Nombre_Cliente}</option>`;
        });
        $("#sel_clientes").append(options);
    }



    function cargar2() {
        $("#sel_clientes").empty();
        var datosd = fetch('{{route('select.Cliente')}}', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(function(request) {
                return request.json();
            })
            .then(function(response) {
                var array = response.data;
                array.sort();
                addOptions2(array);
                return response.data;
            })
    }


    function addOptions3(array) {
        var options = `<option value="0">Producto</option>`;
        array.forEach(element => {
            options += `<option value="${element.Id_Producto}*/*${element.Valor_Producto}">${element.Descripcion_Producto}</option>`;
        });
        $("#sel_producto").append(options);
    }



    function cargar3() {
        $("#sel_producto").empty();
        var datosd = fetch('{{route('select.Producto')}}', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(function(request) {
                return request.json();
            })
            .then(function(response) {
                var array = response.data;
                array.sort();
                addOptions3(array);
                return response.data;
            })
    }

    function Limpiar(){
        $("#div_Clientes").hide();
        $("#div_Productos").hide();
        $("#div_Ciudades").hide();
    }

    $(function() {
            $(".validar").keydown(function(event) {
                //alert(event.keyCode);
                if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !== 190 && event.keyCode !== 110 && event.keyCode !== 8 && event.keyCode !== 9) {
                    return false;
                }
            });
        });
</script>