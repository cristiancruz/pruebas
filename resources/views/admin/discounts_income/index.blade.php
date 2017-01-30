@extends('admin.template.main')
@section('title',' Desc/Ingresos')
@section('content')
    <div class="text-center"><h1>Catálogo de Descuentos e Ingresos</h1></div></br>
    <div style="max-width: 900px; margin: auto;">
        <!-- Modal -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridModalLabel">Registro de Descuentos e Ingresos</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div class="row">
                                <div class="col-md-12">

                                    {!! Form::open(['route'=>'admin.discounts_income.store', 'method'=>'POST']) !!}
                                    <div class="form-group">
                                        {!! Form::label('key','Ingrese la Clave:') !!}<div class="requerido">*</div>
                                        {!! Form::text('key',null,['class'=>'form-control','placeholder'=>'Nombre de la clave','required','autofocus']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('description','Ingrese la Descripción:') !!}<div class="requerido">*</div>
                                        {!! Form::text('description',null,['class'=>'form-control','placeholder'=>'Nombre de la descripción','required']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('type','Tipo') !!}<div class="requerido">*</div>
                                        {!! Form::select('type',['Ingresos'=>'Ingresos','Descuentos'=>'Descuentos'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required']) !!}
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

            <table class="table table-striped table-hover text-center" id="tblDiscount">
                <thead>
                <th class="text-center">Clave</th>
                <th class="text-center">Descripcion</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">Opciones</th>
                </thead>
                <tbody>
                @foreach($discount as $discounts)
                    <tr data-id="{{$discounts->id}}">
                        <td>
                            @if($perm_btn[0]->update==1)
                                <a href="#"
                                   data-type="text"
                                   data-pk="{{$discounts->id}}"
                                   data-url="{{url("admin/discounts_income/$discounts->id")}}"
                                   data-title="Nombre de la clave"
                                   data-value="{{$discounts->key}}"
                                   class="set-name-key"
                                   data-name="key">
                                </a>
                            @else
                                {{$discounts->key}}
                            @endif
                        </td>

                        <td>
                            @if($perm_btn[0]->update==1)
                                <a href="#"
                                   data-type="text"
                                   data-pk="{{$discounts->id}}"
                                   data-url="{{url("admin/discounts_income/$discounts->id")}}"
                                   data-title="Descripcion"
                                   data-value="{{$discounts->description}}"
                                   class="set-name-description"
                                   data-name="description">
                                </a>
                            @else
                             {{$discounts->description}}
                             @endif
                        </td>

                        <td>
                            @if($perm_btn[0]->update==1)
                                <a href="#"
                                   data-type="select"
                                   data-pk="{{$discounts->id}}"
                                   data-url="{{url("admin/discounts_income/$discounts->id")}}"
                                   data-title="Tipo"
                                   data-value="{{$discounts->type}}"
                                   class="set-name-type"
                                   data-name="type">
                                </a>
                            @else
                                {{$discounts->type}}
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
            {!! Form::open(['route'=> ['admin.discounts_income.destroy',':USER_ID'],'method'=>'DELETE', 'id'=>'form-delete']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('js')
    <script>
        $.fn.editable.defaults.mode = 'inline';
        $.fn.editable.defaults.ajaxOptions = {type:'PUT'};

        $(".set-name-key").editable({
                    error: function(response, newValue) {
                        $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> La clave no pudo ser editada! </div>');
                    }
                }
        );
        $(".set-name-description").editable({
                    error: function(response, newValue) {
                        $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> La descripción no pudo ser editada! </div>');
                    }
                }
        );

        $(".set-name-type").editable(
                {
                    source:[
                        {value:"Ingresos",text:"Ingresos"},
                        {value:"Descuentos",text:"Descuentos"}
                    ],
                    error: function(response, newValue) {
                        $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> El tipo no pudo ser editado! </div>');
                    }
                }
        );
        var table = $('#tblDiscount').DataTable( {
            "language": {
                "url": "{{asset('public/pluings/datatable/js/Spanish.json')}}"
            }  , "order": [[0, "asc" ]]
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
                $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> El Descuento o Ingreso no pudo ser eliminado! </div>');

            });

        });
        $('#myModal').on('shown.bs.modal', function() {
            $('#key').focus();
        })
    </script>
@endsection