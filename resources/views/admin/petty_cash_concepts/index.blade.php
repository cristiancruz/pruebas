@extends('admin.template.main')

@section('title',' Conceptos C.C')

@section('content')
    <div class="text-center"><h1>Catálogo de Conceptos de Caja Chica</h1></div></br></br>
    <div  style="max-width: 900px; margin: auto;">
        <!-- Modal -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridModalLabel">Registro de Conceptos de caja chica</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div class="row">
                                <div class="col-md-12">

                                    {!! Form::open(['route'=>'admin.petty_cash_concepts.store', 'method'=>'POST']) !!}
                                    <div class="form-group">
                                        {!! Form::label('nameCash','Ingrese el concepto:') !!}<div class="requerido">*</div>
                                        {!! Form::text('nameCash',null,['class'=>'form-control','placeholder'=>'Nombre del concepto','required','autofocus']) !!}
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
            <table class="table table-striped table-hover text-center" id="tblBoxConcept">
                <thead >
                <th class="text-center">Nombre</th>
                <th class="text-center">Opciones</th>
                </thead>
                <tbody>
                @foreach($cash as $cashs)
                    <tr data-id="{{$cashs->id}}">
                        <td>
                            @if($perm_btn[0]->update==1)
                                <a href="#"
                                            data-type="text"
                                            data-pk="{{$cashs->id}}"
                                            data-url="{{url("admin/petty_cash_concepts/$cashs->id")}}"
                                            data-title="Nombre del concepto"
                                            data-value="{{$cashs->nameCash}}"
                                            class="set-name-box-concept"
                                            data-name="nameCash">
                                </a>
                            @else
                                {{$cashs->nameCash}}
                            @endif
                        </td>

                        <td>
                            @if($perm_btn[0]->delete==1)
                                <a href="#|"  class="btn btn-danger btn-delete"> <i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                            @else
                                <span>Sin permiso</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! Form::open(['route'=> ['admin.petty_cash_concepts.destroy',':USER_ID'],'method'=>'DELETE', 'id'=>'form-delete']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('js')
    <script>
        $.fn.editable.defaults.mode = 'inline';
        $.fn.editable.defaults.ajaxOptions = {type:'PUT'};


        $(".set-name-box-concept").editable({
                    error: function(response, newValue) {
                        $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> El concepto no pudo ser editado! </div>');
                    }
                }

        );

        var table = $('#tblBoxConcept').DataTable( {
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
                $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> La Unidad no pudo ser eliminada! </div>');
            });

        });
        $('#myModal').on('shown.bs.modal', function() {
            $('#nameCash').focus();
        })
    </script>
@endsection
