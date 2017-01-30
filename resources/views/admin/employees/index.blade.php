@extends('admin.template.main')

@section('title',' Empleados')

@section('content')
    <div class="text-center"><h1>Catálogo Empleados</h1></div></br></br>
    <div style="max-width: 1200px; margin: auto;">
        <!-- Modal -->
        <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridModalLabel">Registro de Empleados</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div class="row">
                                <div class="col-md-12">

                                    {!! Form::open(['route'=>'admin.employees.store', 'method'=>'POST']) !!}
                                    <div class="form-group">
                                        {!! Form::label('numberEmployee','Ingrese Número de Empleado:') !!}
                                        {!! Form::text('numberEmployee',null,['class'=>'form-control','placeholder'=>'Número de Empleado']) !!}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('job_id','Puesto:') !!}<div class="requerido">*</div>
                                                {!! Form::select('job_id', $job,null,['class'=>'form-control ','placeholder'=>'Seleccione una opción','required'])!!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('dateStart','Fecha de Alta:') !!}<div class="requerido">*</div>
                                                {!! Form::date('dateStart',$date,['class'=>'form-control','required']) !!}
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('name','Ingrese Nombre de Empleado:') !!}<div class="requerido">*</div>
                                                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de Empleado','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('lastName','Ingrese Apellido Paterno:') !!}<div class="requerido">*</div>
                                                {!! Form::text('lastName',null,['class'=>'form-control','placeholder'=>'Apellido Paterno','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('motherLastName','Ingrese Apellido Materno:') !!}<div class="requerido">*</div>
                                                {!! Form::text('motherLastName',null,['class'=>'form-control','placeholder'=>'Apellido Materno','required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('imss','Ingrese IMSS:') !!}<div class="requerido">*</div>
                                                {!! Form::text('imss',null,['class'=>'form-control','placeholder'=>'IMSS','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('curp','Ingrese CURP:') !!}<div class="requerido">*</div>
                                                {!! Form::text('curp',null,['class'=>'form-control','placeholder'=>'CURP','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('rfc','Ingrese RFC:') !!}<div class="requerido">*</div>
                                                {!! Form::text('rfc',null,['class'=>'form-control','placeholder'=>'RFC','required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('dailySalary','Ingrese Sueldo Semanal:') !!}<div class="requerido">*</div>
                                                {!! Form::text('dailySalary',null,['class'=>'form-control','placeholder'=>'Sueldo Semanal','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('dailyInfonavit','Ingrese Infonavit Diario:') !!}<div class="requerido">*</div>
                                                {!! Form::text('dailyInfonavit',null,['class'=>'form-control','placeholder'=>'Infonavit','required']) !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('localCompensation','Compensacion Local:') !!}
                                                {!! Form::text('localCompensation',null,['class'=>'form-control','placeholder'=>'Compensacion Local']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('foreignCompensation','Compensacion Foranea:') !!}
                                                {!! Form::text('foreignCompensation',null,['class'=>'form-control','placeholder'=>'Compensacion Foranea']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('nomineCard','Tarjeta Nomina:') !!}
                                                {!! Form::text('nomineCard',null,['class'=>'form-control','placeholder'=>'Tarjeta Nomina']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('bankAccount','Cuenta Bancaria:') !!}
                                                {!! Form::text('bankAccount',null,['class'=>'form-control','placeholder'=>'Cuenta Bancaria']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('bank_id','Banco:') !!}
                                                {!! Form::select('bank_id', $bank,null,['class'=>'form-control ','placeholder'=>'Seleccione una opción'])!!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('phone','Telefono:') !!}
                                                {!! Form::text('phone',null,['class'=>'form-control','placeholder'=>'Telefono']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('cellPhone','Celular:') !!}
                                                {!! Form::text('cellPhone',null,['class'=>'form-control','placeholder'=>'Celular']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                {!! Form::label('email', 'Correo Electronico') !!}
                                                {!! Form::email('email',null, ['class'=>'form-control','placeholder'=>'example@gmail.com'])!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('street','Ingrese la Calle:') !!}
                                        {!! Form::text('street',null,['class'=>'form-control','placeholder'=>'Calle']) !!}
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('numberE','Ingrese Número Exterior:') !!}
                                                {!! Form::text('numberE',null,['class'=>'form-control','placeholder'=>'Numero Exterior']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('numberI','Ingrese Número Interior:') !!}
                                                {!! Form::text('numberI',null,['class'=>'form-control','placeholder'=>'Numero Interior']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('colony','Ingrese la Colonia:') !!}
                                                {!! Form::text('colony',null,['class'=>'form-control','placeholder'=>'Colonia']) !!}
                                            </div>
                                        </div>
                                    </div>
                                            <div class="form-group">
                                                {!! Form::label('emergencyData','Datos de Emergencia:') !!}
                                                {!! Form::text('emergencyData',null,['class'=>'form-control','placeholder'=>'Datos de Emergencia']) !!}
                                            </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('birthPlace','Lugar de Nacimiento:') !!}
                                                {!! Form::text('birthPlace',null,['class'=>'form-control','placeholder'=>'Lugar de Nacimiento']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('birthDate','Fecha de Nacimiento:') !!}
                                                {!! Form::date('birthDate',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>


                                    </div>
                                            <div class="form-group">
                                                {!! Form::label('observations','Observaciones:') !!}
                                                {!! Form::text('observations',null,['class'=>'form-control','placeholder'=>'Observaciones']) !!}
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
        @include('admin.employees.modalEdit')
        <div class="table-responsive" style="margin-bottom: 10px;">
            <table class="table table-striped table-hover text-center" id="tblEmployee">
                <thead >
                <th class="text-center">Numero de empleado</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido Paterno</th>
                <th class="text-center">Apellido Materno</th>
                <th class="text-center">Puesto</th>
                <th class="text-center">IMSS</th>
                <th class="text-center">Cuenta Bancaria</th>
                <th class="text-center">Opciones</th>
                </thead>
                <tbody>
                @foreach($employee as $employees)
                    <tr data-id="{{$employees->id}}">
                        <td id="numEmployee_{{$employees->id}}">
                            {{$employees->numberEmployee}}
                        </td>
                        <td id="name_{{$employees->id}}">
                            {{$employees->name}}
                        </td>
                        <td id="lastName_{{$employees->id}}">
                        {{$employees->lastName}}
                        </td>
                        <td id="motherLast_{{$employees->id}}">
                        {{$employees->motherLastName}}
                        </td>
                        <td id="job_{{$employees->id}}">
                            {{$employees->job->nameJob}}
                        </td>
                        <td id="imss_{{$employees->id}}">
                            {{$employees->imss}}
                        </td>
                        <td id="bankAcc_{{$employees->id}}">
                            {{$employees->bankAccount}}
                        </td>

                        <td>
                            @if($perm_btn[0]->update==1)
                                <a href="#|"  Onclick="Views({{$employees->id}})" class="btn btn-warning btn-edit" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                            @endif
                            @if($perm_btn[0]->delete==1)
                                <a href="#|"  class="btn btn-danger btn-delete"> <i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                             @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! Form::open(['route'=> ['admin.employees.destroy',':USER_ID'],'method'=>'DELETE', 'id'=>'form-delete']) !!}

            {!! Form::close() !!}

        </div>
    </div>


@endsection
@section('js')

    <script>
        var table = $('#tblEmployee').DataTable( {
            "language": {
                "url": "{{asset('public/pluings/datatable/js/Spanish.json')}}"
            }  , "order": [[ 4, "asc" ]]
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
                $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> El empleado no pudo ser eliminado! </div>');

            });

        });
        var Views = function(id) {
            var route = "{{url('admin/employees/')}}/"+id+"/edit";
            $.get( route, function( data ) {
                $("#id").val(data.id);
                $("#numberEmployee1").val(data.numberEmployee);
                $("#job_id1").val(data.job_id);
                $("#dateStart1").val(data.dateStart);
                $("#name1").val(data.name);
                $("#lastName1").val(data.lastName);
                $("#motherLastName1").val(data.motherLastName);
                $("#imss1").val(data.imss);
                $("#curp1").val(data.curp);
                $("#rfc1").val(data.rfc);
                $("#dailySalary1").val(data.dailySalary);
                $("#dailyInfonavit1").val(data.dailyInfonavit);
                $("#localCompensation1").val(data.localCompensation);
                $("#foreignCompensation1").val(data.foreignCompensation);
                $("#nomineCard1").val(data.nomineCard);
                $("#bankAccount1").val(data.bankAccount);
                $("#bank_id1").val(data.bank_id);
                $("#phone1").val(data.phone);
                $("#cellPhone1").val(data.cellPhone);
                $("#email1").val(data.email);
                $("#street1").val(data.street);
                $("#numberE1").val(data.numberE);
                $("#numberI1").val(data.numberI);
                $("#colony1").val(data.colony);
                $("#emergencyData1").val(data.emergencyData);
                $("#birthPlace1").val(data.birthPlace);
                $("#birthDate1").val(data.birthDate);
                $("#observations1").val(data.observations);

                $('#myModalEdit').modal('show');
            });
        }

        $('#actualizar').click(function () {
            var id=  $("#id").val();
            var token =  $("#token").val();
            var route = "{{url('admin/employees/')}}/"+id+"";
            var formId = '#form';
            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });
            $.ajax({
                url: route,
                type:'put',
                data:  $(formId).serialize(),
                dataType: 'json',
                success:function (result) {
                    if(result.success){
                        $('#myModalEdit').modal('hide');
                        $('#msjAlterno').html('<div class="alert alert-success mensajesAll"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Empleado editado exitosamente!</div>');

                        $("#numEmployee_" + result.info.id).text(result.info.numberEmployee);
                        $("#name_" + result.info.id).text(result.info.name);
                        $("#lastName_" + result.info.id).text(result.info.lastName);
                        $("#motherLast_" + result.info.id).text(result.info.motherLastName);


                        $("#imss_" + result.info.id).text(result.info.imss);
                        $("#bankAcc_" + result.info.id).text(result.info.bankAccount);
                        $("#job_" + result.info.id).text(result.job);
                    }
                },error:function (data) {
                    setTimeout(function() {$(".mensajesAllValid").fadeOut(1500);},5000);
                    $('#myModalEdit').modal('hide');

                    var errors = '<div class="alert alert-danger mensajesAllValid"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                    for(datos in data.responseJSON){
                        errors += data.responseJSON[datos] + '<br>';
                    }
                    errors +='</div>';

                    $('#msjAlterno').show().html(errors);
                }
            });
        });
        $('#myModal').on('shown.bs.modal', function() {
            $('#numberEmployee').focus();
        });
        $('#myModalEdit').on('shown.bs.modal', function() {
            $('#numberEmployee1').focus();
        });
    </script>
@endsection