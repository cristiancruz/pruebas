@extends('admin.template.main')

@section('title',' Clasificación Maquinaria')

@section('content')
    <div class="text-center"><h1>Catálogo de Clasificación Maquinaria</h1></div></br></br>
    <div style="max-width: 900px; margin: auto;">
        <!-- Modal -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridModalLabel">Registro de Clasificación Maquinaria</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div class="row">
                                <div class="col-md-12">

                                    {!! Form::open(['route'=>'admin.classification.store', 'method'=>'POST']) !!}

                                    <div class="form-group">
                                        {!! Form::label('nameClassification','Ingrese la Clasificación:') !!}<div class="requerido">*</div>
                                        {!! Form::text('nameClassification',null,['class'=>'form-control','placeholder'=>'Nombre de la clasificación','required','autofocus']) !!}
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
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
            <a href="{{route('admin.categories.index')}}"  type="button" class="btn btn-primary views"><i class="fa fa-eye" aria-hidden="true"></i> Catálogo categorias</a>
            </br></br>
        </div>
        <!-- /Modal -->
        <div class="table-responsive" style="margin-bottom: 10px;">
            <table class="table table-striped table-hover text-center" id="tblClassification">
                <thead >
                <th class="text-center">Nombre</th>
                <th class="text-center">Opciones</th>
                </thead>
                <tbody>
                @foreach($classification as $classifications)
                    <tr data-id="{{$classifications->id}}">
                        <td>
                            <a href="#"
                               data-type="text"
                               data-pk="{{$classifications->id}}"
                               data-url="{{url("admin/classification/$classifications->id")}}"
                               data-title="clasificacion"
                               data-value="{{$classifications->nameClassification}}"
                               class="set-name-Classification"
                               data-name="nameClassification">

                            </a>
                        </td>
                        <td>
                            <a href="#|"  class="btn btn-danger btn-delete"> <i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! Form::open(['route'=> ['admin.classification.destroy',':USER_ID'],'method'=>'DELETE', 'id'=>'form-delete']) !!}

            {!! Form::close() !!}
        </div>

    </div>

@endsection

@section('js')
    <script>
        $.fn.editable.defaults.mode = 'inline';
        $.fn.editable.defaults.ajaxOptions = {type:'PUT'};


        $(".set-name-Classification").editable({
                    error: function(response, newValue) {
                        $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> La Clasificación no pudo ser editada! </div>');
                    }
                }

        );

        var table = $('#tblClassification').DataTable( {
            "language": {
                "url": "{{asset('public/pluings/datatable/js/Spanish.json')}}"
            }
        });

        $('.btn-delete').click(function (e) {

            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete');
            var url = form.attr('action').replace(':USER_ID',id);
            var data = form.serialize();

            alertify.confirm("Advertencia","¿Está seguro que desea realizar esta operación?, se borrará toda categoría de maquinaria que contenga esta clasificación.",
                    function(){
                      //  alertify.success('Ok');
                        row.fadeOut();
                        $.post(url,data,function (result) {
                            $('#msjAlterno').html('<div class="alert alert-success mensajesAll"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+result+'</div>');
                        }).fail(function () {
                            row.fadeIn();
                            row.show();
                            $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> La Clasificación no pudo ser eliminada! </div>');

                        });
                    },
                    function(){
                      //  alertify.error('Cancel');
                    });


        });
        $('#myModal').on('shown.bs.modal', function() {
            $('#nameClassification').focus();
        })


    </script>
@endsection