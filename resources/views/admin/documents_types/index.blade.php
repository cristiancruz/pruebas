@extends('admin.template.main')

@section('title',' Tipos de documentos')

@section('content')
    <div class="text-center"><h1>Catálogo de Tipos de Documentos</h1></div></br></br>
    <div  style="max-width: 900px; margin: auto;">
        <!-- Modal -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridModalLabel">Registro de Tipos de Documentos</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div class="row">
                                <div class="col-md-12">

                                    {!! Form::open(['route'=>'admin.documents_types.store', 'method'=>'POST']) !!}
                                    <div class="form-group">
                                        {!! Form::label('name','Ingrese el Nombre:') !!}<div class="requerido">*</div>
                                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre','required']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('type','Tipo') !!}<div class="requerido">*</div>
                                        {!! Form::select('type',['proyecto'=>'Proyecto','proveedor'=>'Proveedor'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> Cancelar</button>
                        {{Form::button(' <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar', array('type' => 'submit', 'class' => 'btn btn-primary'))}}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="bd-example bd-example-padded-bottom">
            @if($perm_btn[0]->add==1)
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
            @endif
            </br></br>
        </div>
        <!-- /Modal -->
        <div class="table-responsive" style="margin-bottom: 10px;">
            <table class="table table-striped table-hover text-center" id="tblDoc">
                <thead >
                <th class="text-center">Nombre</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Opciones</th>
                </thead>
                <tbody>
                @foreach($doc as $docs)
                    <tr data-id="{{$docs->id}}">
                        <td>
                            @if($perm_btn[0]->update==1)
                                <a href="#"
                                   data-type="text"
                                   data-pk="{{$docs->id}}"
                                   data-url="{{url("admin/documents_types/$docs->id")}}"
                                   data-title="Nombre"
                                   data-value="{{$docs->name}}"
                                   class="set-name-doc"
                                   data-name="name">
                                </a>
                            @else
                                {{$docs->name}}
                            @endif
                        </td>
                        <td>
                            @if($perm_btn[0]->update==1)
                            <a href="#"
                               data-type="select"
                               data-pk="{{$docs->id}}"
                               data-url="{{url("admin/documents_types/$docs->id")}}"
                               data-title="Tipo"
                               data-value="{{$docs->type}}"
                               class="set-name-type"
                               data-name="type">
                            </a>
                            @else
                                {{$docs->type}}
                            @endif
                        </td>

                        <td>
                            @if($perm_btn[0]->delete==1)
                            <a href="#|"  class="btn btn-danger btn-delete"> <i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                            @else
                               <span>Sin Permiso</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! Form::open(['route'=> ['admin.documents_types.destroy',':USER_ID'],'method'=>'DELETE', 'id'=>'form-delete']) !!}

            {!! Form::close() !!}

        </div>
    </div>

@endsection

@section('js')
    <script>
        $.fn.editable.defaults.mode = 'inline';
        $.fn.editable.defaults.ajaxOptions = {type:'PUT'};


        $(".set-name-doc").editable({
                    error: function(response, newValue) {
                        $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> El Tipo de Documento no pudo ser editado! </div>');
                    }
                }

        );
        $(".set-name-type").editable(
                {
                    source:[
                        {value:"proyecto",text:"Proyecto"},
                        {value:"proveedor",text:"Proveedor"}
                    ],
                    error: function(response, newValue) {
                        $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  El Tipo de Documento no pudo ser editado! </div>');
                    }
                }
        );
        var table = $('#tblDoc').DataTable( {
            "language": {
                "url": "{{asset('public/pluings/datatable/js/Spanish.json')}}"
            }  , "order": [[ 0, "asc" ]]
        });


        $('.btn-delete').click(function (e) {

            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete');
            var url = form.attr('action').replace(':USER_ID',id);
            var data = form.serialize();
            row.fadeOut();

            $.post(url,data,function (result) {
                $('#msjAlterno').html('<div class="alert alert-success mensajesAll"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+result+'</div>');
            }).fail(function () {
                row.fadeIn();
                row.show();
                $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>  El Tipo de Documento no pudo ser eliminado! </div>');
            });

        });
        $('#myModal').on('shown.bs.modal', function() {
            $('#name').focus();
        })
    </script>
@endsection