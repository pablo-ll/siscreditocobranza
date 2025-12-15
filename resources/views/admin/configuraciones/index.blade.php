@extends('adminlte::page')

@section('content_header')
<h1><b> Configuracion</b></h1>
<hr>
@stop

@section('content')
<div class="row">

<div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Configuraciones</h3>

                <div class="card-tools">
                  <a href="{{url('/admin/configuraciones/create')}}" class="btn btn-primary"> Crear nuevo</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <table id="example1"class="table table-bordered table-hover table-striped table-sm">
                    <thead>
                        <tr>

                        <th style="text-align: center">Nro</th>
                        <th style="text-align: center">Nombre</th>
                        <th style="text-align: center">Descripcion</th>
                       
                        <th style="text-align: center">Telefono</th>
                        <th style="text-align: center">Email</th>
                       
                        <th style="text-align: center">Moneda</th>
                        <th style="text-align: center">Logo</th>
                        <th style="text-align: center">Accion</th>
                        </tr>

                     </thead>
                     <tbody>
                        @php
                        $contador = 1;
                        @endphp
                        @endphp
                         @foreach($configuraciones as $config)
                        <tr>
                            <td style="text-align: center">{{$contador++}}</td>
                            <td>{{$config->nombre}}</td>
                            <td>{{$config->descripcion}}</td>
                           
                            <td style="text-align: center">{{$config->telefono}}</td>
                            <td>{{$config->email}}</td>
                           
                            <td style="text-align: center">{{$config->moneda}}</td>
                            <td style="text-align: center">
                                <img src="{{asset('storage/'.$config->logo)}}" width="100px" alt="imagen">
                            </td>
                            <td style="text-align: center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('/admin/configuraciones',$config->id)}}" style="border-radius: 4px" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                    <a href="{{url('/admin/configuraciones/'.$config->id.'/edit')}}" style="border-radius: 4px " class="btn btn-block bg-gradient-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{url('/admin/configuraciones',$config->id)}}" method="post"
                                        onclick="preguntar{{$config->id}}(event)" id="miFormulario{{$config->id}}"
                                        >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius:4px"><i class="fas fa-trash"></i></button>

                                    </form>
                                    <script>
                                        function preguntar{{$config->id}}(event){
                                            event.preventDefault();
                                            Swal.fire({
                                                title:'¿Desea eliminar este registro?',
                                                text:'',
                                                icon:'question',
                                                showDenyButton: true,
                                                confirmButtonText:'Eliminar',
                                                confirmButtonColor: '#a5161d',
                                                denyButtonColor:'#270a0a',
                                                denyButtonText:'Cancelar',

                                            }).then((result)=>{
                                                if(result.isConfirmed){
                                                    var form = $('#miFormulario{{$config->id}}');
                                                    form.submit();
                                                }
                                            });
                                        }
                                    </script>
                                </div>

                            </td>
                        </tr>
                         @endforeach
                     </tbody>

                </table>
             

            
               
             </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
   

</div>

@stop

@section('css')
<style>
    /* Fondo transparente y sin borde en el contenedor*/
    #example1_wrapper .dt-buttons {
        background-color: transparent;
        box-shadow: none;
        border: none;
        display: flex;
        justify-content: center;
        gap: 10px; /* espaciado entre botones */
        margin-bottom: 15px;
    }
 /* estilo personalizado de los botones */
    #example1_wrapper .btn {
        color: #fff;/* color del texto blanco */
        border-radius: 4px;
        padding: 5px 15px;
        font-size: 14px;
    }

    /** colores por tipo de boton */

    .btn-danger { background-color: #dc3545; border: none}
    .btn-success { background-color: #28a745; border: none}
    .btn-info { background-color: #17a2b8; border: none}
    .btn-warning { background-color: #ffc107; color: #212529 ;border: none}
    .btn-default { background-color: #6e7176; color: #212529 ;border: none}
</style>
@stop

@section('js')
<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language":{
                "emptyTable": "No hay informacion",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Configuraciones",
                "infoEmpty": "Mostrando 0 a 0 de 0 Configuraciones",
                "infoFiltered": "(Filtrado de _MAX_ total Configuraciones)",
                "lengthMenu": "Mostrar _MENU_ Configuraciones",
                "loandingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first":"Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous":"Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [
                { text: '<i class="fas fa-copy"></i>COPIAR', extend: 'copy', className: 'btn btn-default'},
                { text: '<i class="fas fa-file-pdf"></i>PDF', extend: 'pdf', className: 'btn btn-danger'},
                { text: '<i class="fas fa-file-csv"></i>CSV', extend: 'csv', className: 'btn btn-info'},
                { text: '<i class="fas fa-file-excel"></i>EXCEL', extend: 'excel', className: 'btn btn-success'},
                { text: '<i class="fas fa-print"></i>IMPRIMIR', extend: 'print', className: 'btn btn-warning'}
            ]
        }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
    });
</script>
@stop

