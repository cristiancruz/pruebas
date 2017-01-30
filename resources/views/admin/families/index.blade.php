@extends('admin.template.main')

@section('title',' Familias Compras')

@section('content')
    <div class="text-center"><h1>Catálogo de Familias Compras</h1></div></br></br>
    <div  style="max-width: 900px; margin: auto;">
        <!-- Modal -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridModalLabel">Registro de Familias de Compras</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div class="row">
                                <div class="col-md-12">

                                    {!! Form::open(['route'=>'admin.families.store', 'method'=>'POST']) !!}
                                    @if($configKey=="manual")
                                        <div class="form-group">
                                            {!! Form::label('key','Ingrese la Clave:') !!}<div class="requerido">*</div>
                                            {!! Form::text('key',null,['class'=>'form-control','placeholder'=>'Nombre de la clave','required','autofocus']) !!}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        {!! Form::label('nameFamily','Ingrese la Familia:') !!}<div class="requerido">*</div>
                                        {!! Form::text('nameFamily',null,['class'=>'form-control','placeholder'=>'Nombre de la familia','required']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('description','Ingrese la descripción:') !!}<div class="requerido">*</div>
                                        {!! Form::text('description',null,['class'=>'form-control','placeholder'=>'Nombre de la descripción','required']) !!}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('cost_id','Categoria de costos') !!}<div class="requerido">*</div>
                                                {!! Form::select('cost_id', $cost,null,['class'=>'form-control ','placeholder'=>'Seleccione una opcion','required'])!!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                        </div>
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
            <table class="table table-striped table-hover text-center" id="tblFamily">
                <thead>
                <th class="text-center">Clave</th>
                <th class="text-center">Familia</th>
                <th class="text-center">Catálogo de Costos</th>
                <th class="text-center">Descripción</th>
                <th class="text-center">Opciones</th>
                </thead>
                <tbody>
                @foreach($family as $families)
                    <tr data-id="{{$families->id}}">
                        <td>
                        @if($configKey=="automatico")
                            {{$families->id}}
                        @elseif($configKey=="manual")
                                @if($perm_btn[0]->update==1)
                                    <a href="#"
                                       data-type="text"
                                       data-pk="{{$families->id}}"
                                       data-url="{{url("admin/families/$families->id")}}"
                                       data-title="Nombre de la clave"
                                       data-value="{{$families->key}}"
                                       class="set-name-key"
                                       data-name="key">
                                    </a>
                                 @else
                                    {{$families->key}}
                                @endif
                        @endif
                            </td>
                        <td>
                            @if($perm_btn[0]->update==1)
                                <a href="#"
                                   data-type="text"
                                   data-pk="{{$families->id}}"
                                   data-url="{{url("admin/families/$families->id")}}"
                                   data-title="Nombre de la familia"
                                   data-value="{{$families->nameFamily}}"
                                   class="set-name-nameFamily"
                                   data-name="nameFamily">
                                </a>
                             @else
                                {{$families->nameFamily}}
                             @endif
                        </td>
                        <td>
                         {{$families->cost->nameCosts}}
                        </td>
                        <td>
                            @if($perm_btn[0]->update==1)
                                <a href="#"
                                   data-type="text"
                                   data-pk="{{$families->id}}"
                                   data-url="{{url("admin/families/$families->id")}}"
                                   data-title="Descripcion"
                                   data-value="{{$families->description}}"
                                   class="set-name-description"
                                   data-name="description">
                                </a>
                             @else
                                {{$families->description}}
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
            {!! Form::open(['route'=> ['admin.families.destroy',':USER_ID'],'method'=>'DELETE', 'id'=>'form-delete']) !!}

            {!! Form::close() !!}
        </div>
    </div>


@endsection

@section('js')
    <script>
        $.fn.editable.defaults.mode = 'inline';
        $.fn.editable.defaults.ajaxOptions = {type:'PUT'};

        $(".set-name-nameFamily").editable({
                    error: function(response, newValue) {
                        $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> La familia no pudo ser editada! </div>');
                    }
                }

        );
        $(".set-name-description").editable({
                    error: function(response, newValue) {
                        $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> La descripción no pudo ser editada! </div>');
                    }
                }

        );
        $(".set-name-key").editable({
                    error: function(response, newValue) {
                        $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> La clave no pudo ser editada! </div>');
                    }
                }

        );

        var table = $('#tblFamily').DataTable( {
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
                $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> La Familia no pudo ser eliminada! </div>');
            });

        });


    </script>
@endsection
