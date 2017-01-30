@extends('admin.template.main')
@section('title',' Dias Feriados')

@section('content')
    <div class="text-center"><h1>Catálogo de Dias Feriados</h1></div></br>


    <div style=" max-width:1000px; margin: auto;">
        <!-- Modal -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridModalLabel">Registro de Días feriados</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div class="row">
                                <div class="col-md-12">

                                    {!! Form::open(['route'=>'admin.holidays_days.store', 'method'=>'POST']) !!}
                                    <div class="form-group">
                                        {!! Form::label('date','Fecha, el año no es tomado en cuenta:') !!}<div class="requerido">*</div>
                                        {!! Form::date('date',$date,['class'=>'form-control fecha','required', 'id'=>'dataDate']) !!}
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('description','Ingrese una descripción:') !!}<div class="requerido">*</div>
                                        {!! Form::text('description',null,['class'=>'form-control','placeholder'=>'Nombre de la descripción','required','autofocus']) !!}
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
        <div class="table-responsive">
            <table class="table table-striped table-hover text-center" id="tblHolidays">
                <thead>
                <th class="text-center">Fecha&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </th>
                <th class="text-center">Descripción</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Opciones</th>
                </thead>
                <tbody>
                @foreach($holiday as $holidays)
                    <tr data-id="{{$holidays->id}}">
                        <td>
                            @if($perm_btn[0]->update==1)
                                <a href="#"
                                   data-type="combodate"
                                   data-pk="{{$holidays->id}}"
                                   data-url="{{url("admin/holidays_days/$holidays->id")}}"
                                   data-title="Fecha"
                                   data-value="{{$holidays->date}}"
                                   class="set-name-date"
                                   data-name="date">
                                </a>
                            @else
                                {{$holidays->date}}
                            @endif
                        </td>
                        <td>
                            @if($perm_btn[0]->update==1)
                                <a href="#"
                                   data-type="text"
                                   data-pk="{{$holidays->id}}"
                                   data-url="{{url("admin/holidays_days/$holidays->id")}}"
                                   data-title="Descripcion"
                                   data-value="{{$holidays->description}}"
                                   class="set-name-description"
                                   data-name="description">
                                </a>
                            @else
                                {{$holidays->description}}
                            @endif
                        </td>
                        <td>
                            @if($perm_btn[0]->update==1)
                                @if($holidays->status=="Activo")
                                    {{Form::button(' <i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i><div class="hidden">Activo</div> ', array('type' => 'submit', 'class' => 'btn btn-default status', 'id'=>$holidays->id ))}}
                                @elseif($holidays->status=="Inactivo")
                                    {{Form::button(' <i class="fa fa-circle-o fa-2x" aria-hidden="true"></i><div class="hidden">Inactivo</div>', array('type' => 'submit', 'class' => 'btn btn-default status ', 'id'=>$holidays->id))}}
                                @endif
                            @else
                                {{$holidays->status}}
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
            {!! Form::open(['route'=> ['admin.holidays_days.destroy',':USER_ID'],'method'=>'DELETE', 'id'=>'form-delete']) !!}

            {!! Form::close() !!}
            {!! Form::open(['route'=> ['admin.holidays_days.update2',':USER_ID'],'method'=>'POST', 'id'=>'form-update']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('js')
    <script>

        $.fn.editable.defaults.mode = 'inline';
        $.fn.editable.defaults.ajaxOptions = {type:'PUT'};
        $(".set-name-date").editable({
            format: 'YYYY-MM-DD',
            viewformat: 'DD-MM',
            template: 'D / MMMM ',

        });
        $(".set-name-description").editable({
                    error: function(response, newValue) {
                        $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> La descripción  no pudo ser editada! </div>');
                    }
                }
        );
        $(".set-name-status").editable(
                {
                    source:[
                        {value:"Activo",text:"Activo"},
                        {value:"Inactivo",text:"Inactivo"}
                    ],
                    error: function(response, newValue) {
                        $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> El estado no pudo ser editado! </div>');
                    }
                }
        );
        var table = $('#tblHolidays').DataTable( {
            "language": {
                "url": "{{asset('public/pluings/datatable/js/Spanish.json')}}"
            }  , "order": [[ 2, "asc" ]]
            ,columnDefs: [ {
                targets: [ 2 ],
                orderData: [ 2, 0 ]
            }, {
                targets: [ 2 ],
                orderData: [ 2, 0 ]
            }]
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

        $('.status').click(function (e) {
            e.preventDefault();
            var row = $(this).parents('tr');
            var id =row.data('id');
            var form = $('#form-update');
            var url = form.attr('action').replace(':USER_ID',id);
            var data = form.serialize();

            $.post(url,data,function (result) {

                if(result.statusHoliday=="Activo"){
                    $('#'+result.id).html('<i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i>');
                }else if(result.statusHoliday=="Inactivo"){
                    $('#'+result.id).html('<i class="fa fa-circle-o fa-2x" aria-hidden="true"></i>');
                }

            }).fail(function () {
                $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> El Día feriado no pudo ser editado! </div>');

            });
        });
        $('#myModal').on('shown.bs.modal', function() {
            $('#description').focus();
        })

    </script>
@endsection