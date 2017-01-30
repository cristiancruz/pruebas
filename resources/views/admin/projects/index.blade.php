@extends('admin.template.main')

@section('title',' Proyectos')

@section('content')
    <div class="text-center"><h1>Catálogo de Proyectos</h1></div></br></br>
    <div STYLE="max-width:950px; margin: auto;" >
    @include('admin.projects.ModalEdit')
     <!-- Modal -->
        <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridModalLabel">Registro de Proyectos</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div class="row">
                                <div class="col-md-12">

                                    {!! Form::open(['route'=>'admin.projects.store', 'method'=>'POST']) !!}
                                    @if($devview==1)
                                        <div class="form-group">
                                            {!! Form::label('developments_id','Desarrollo:') !!}<div class="requerido">*</div>
                                            {!! Form::select('developments_id', $dev,null,['class'=>'form-control ','placeholder'=>'Seleccione una opcion','required'])!!}
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        {!! Form::label('nameProject','Ingrese el Proyecto:') !!}<div class="requerido">*</div>
                                        {!! Form::text('nameProject',null,['class'=>'form-control','placeholder'=>'Proyecto','required','autofocus']) !!}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('alias','Ingrese el Alias:') !!}<div class="requerido">*</div>
                                                {!! Form::text('alias',null,['class'=>'form-control','placeholder'=>'Alias','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('location','Localización:') !!}<div class="requerido">*</div>
                                                {!! Form::select('location',['local'=>'Local','foranea'=>'Foranea'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required']) !!}
                                            </div>
                                        </div>
                                    </div>


                                      <div class="row">
                                       <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('client_id','Ciente:') !!}<div class="requerido">*</div>
                                                {!! Form::select('client_id', $clie,null,['class'=>'form-control ','placeholder'=>'Seleccione una opcion','required'])!!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('client_social_reason_id','Razón Social Ciente:') !!}<div class="requerido">*</div>
                                                {!! Form::select('client_social_reason_id',[],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                               <div class="form-group">
                                                {!! Form::label('company_social_reason_id','Razón Social Empresa:') !!}<div class="requerido">*</div>
                                                {!! Form::select('company_social_reason_id', $rse,null,['class'=>'form-control ','placeholder'=>'Seleccione una opcion','required'])!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('dateStart','Fecha Inicio:') !!}<div class="requerido">*</div>
                                                {!! Form::date('dateStart',$date,['class'=>'form-control','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('dateEnd','Fecha Fin:') !!}<div class="requerido">*</div>
                                                {!! Form::date('dateEnd',$date,['class'=>'form-control fecha','required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                      <div class="form-group">
                                        {!! Form::label('street','Ingrese la Calle:') !!}
                                        {!! Form::text('street',null,['class'=>'form-control','placeholder'=>'Calle']) !!}
                                    </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('numberE','Ingrese Número Exterior:') !!}
                                                {!! Form::text('numberE',null,['class'=>'form-control','placeholder'=>'Número Exterior']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('numberI','Ingrese Número Interior:') !!}
                                                {!! Form::text('numberI',null,['class'=>'form-control','placeholder'=>'Número Interior']) !!}
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('nameContact','Nombre Contacto:') !!}
                                                {!! Form::text('nameContact',null,['class'=>'form-control','placeholder'=>' Contacto']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('phone','Ingrese Número Contacto:') !!}
                                                {!! Form::text('phone',null,['class'=>'form-control','placeholder'=>'Número Contacto']) !!}
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="form-group">
                                        {!! Form::label('email','Ingrese Correo Electronico:') !!}
                                        {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Correo Electronico']) !!}
                                     </div>
                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('manager','Ingrese Gerente:') !!}
                                                {!! Form::text('manager',null,['class'=>'form-control','placeholder'=>'Gerente']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('coordinator','Ingrese Nombre Coordinador:') !!}
                                                {!! Form::text('coordinator',null,['class'=>'form-control','placeholder'=>'Coordinador']) !!}
                                            </div>
                                        </div>
                                    </div>  
                                     
                                    <div class="form-group">
                                        {!! Form::label('resident','Ingrese Nombre Residente:') !!}
                                        {!! Form::text('resident',null,['class'=>'form-control','placeholder'=>'Residente']) !!}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('estimation','Estimación') !!}<div class="requerido">*</div>
                                                {!! Form::select('estimation',['semana'=>'Semana','quincena'=>'Quincena','mes'=>'Mes'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                {!! Form::label('estimationDay','Dia Estimación') !!}<div class="requerido">*</div>
                                                {!! Form::select('estimationDay',['lunes'=>'Lunes','martes'=>'Martes','miercoles'=>'Miercoles','jueves'=>'Jueves','viernes'=>'Viernes'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required']) !!}
                                            </div>
                                        </div>
                                    </div> 
                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('invoice','Factura') !!}<div class="requerido">*</div>
                                                {!! Form::select('invoice',['semana'=>'Semana','quincena'=>'Quincena','mes'=>'Mes'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                {!! Form::label('invoiceDay','Dia Factura') !!}<div class="requerido">*</div>
                                                {!! Form::select('invoiceDay',['lunes'=>'Lunes','martes'=>'Martes','miercoles'=>'Miercoles','jueves'=>'Jueves','viernes'=>'Viernes'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required']) !!}
                                            </div>
                                        </div>
                                    </div>  
                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('pay','Pago') !!}<div class="requerido">*</div>
                                                {!! Form::select('pay',['semana'=>'Semana','quincena'=>'Quincena','mes'=>'Mes'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                {!! Form::label('payDay ','Dia Pago') !!}<div class="requerido">*</div>
                                                {!! Form::select('payDay',['lunes'=>'Lunes','martes'=>'Martes','miercoles'=>'Miercoles','jueves'=>'Jueves','viernes'=>'Viernes'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('commentJobs','Ingrese Cometarios:') !!}
                                        {!! Form::text('commentJobs',null,['class'=>'form-control','placeholder'=>'Comentarios']) !!}
                                    </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('label1','Etiqueta 1:') !!}
                                                {!! Form::textarea('label1',null,['class'=>'form-control','placeholder'=>'Etiqueta 1','size' => '30x4']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('label2','Etiqueta 2:') !!}
                                                {!! Form::textarea('label2',null,['class'=>'form-control','placeholder'=>'Etiqueta 2','size' => '30x4']) !!}
                                            </div>
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
            <table class="table table-striped table-hover text-center" id="tblProject">
                <thead>
                <th class="text-center">Proyecto</th>
                <th class="text-center">Cliente</th>
                <th class="text-center">F. Inicio</th>
                <th class="text-center">F. Final</th>
                <th class="text-center">Estatus</th>
                <th class="text-center">Opciones</th>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr data-id="{{$project->id}}">
                        <td id="nameProject_{{$project->id}}">
                        {{$project->nameProject}}
                        </td>
                        <td id="client_id_{{$project->id}}">
                            {{$project->client->name}}
                        </td>
                        <td id="dateStart_{{$project->id}}">
                            {{$project->dateStart}}
                        </td>
                        <td id="dateEnd_{{$project->id}}">
                            {{$project->dateEnd}}
                        </td>
                        <td >
                            @if($perm_btn[0]->update==1)
                                <a href="#"
                                   data-type="select"
                                   data-pk="{{$project->id}}"
                                   data-url="{{url("admin/projects/$project->id")}}"
                                   data-title="Tipo"
                                   data-value="{{$project->status}}"
                                   class="set-name-status"
                                   data-name="status">
                                </a>
                            @else
                                {{$project->status}}
                            @endif
                        </td>

                        <td>
                            @if($perm_btn[0]->update==1)
                                 <a href="#|"  Onclick="Views({{$project->id}})" class="btn btn-warning btn-edit" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                            @endif
                            @if($perm_btn[0]->delete==1)
                                <a href="#|"  class="btn btn-danger btn-delete"> <i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! Form::open(['route'=> ['admin.projects.destroy',':USER_ID'],'method'=>'DELETE', 'id'=>'form-delete']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('js')

    <script>
        $.fn.editable.defaults.mode = 'inline';
        $.fn.editable.defaults.ajaxOptions = {type:'PUT'};
        $(".set-name-status").editable(
                {
                    source:[
                        {value:"activo",text:"Activo"},
                        {value:"inactivo",text:"Inactivo"},
                        {value:"finalizado",text:"Finalizado"}
                    ],
                    error: function(response, newValue) {
                        $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> El Estatus no pudo ser editado! </div>');
                    }
                }
        );
        var table = $('#tblProject').DataTable( {
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
                $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> El Proyecto no pudo ser eliminado! </div>');

            });

        });

          $('#client_id').change(function (event) {
            var id = event.target.value;

            if(id==""){
                $('#client_social_reason_id').empty();
            }else{
                var route = "{{url('admin/get_razon_social_cliente/')}}/"+id+"";

                $.get(route,function (response) {
                    $('#client_social_reason_id').empty();
                    $('#client_social_reason_id').append("<option selected='selected' value=''>Seleccione una opcion</option>");
                    for(i=0; i<response.length; i++){
                        $('#client_social_reason_id').append("<option value='"+response[i].id+"'> "+response[i].nameReason+"</option>");
                    }
                });
            }

        });

        $('#client_id1').change(function (event) {
            var id = event.target.value;
            var route = "{{url('admin/get_razon_social_cliente/')}}/"+id+"";
            if(id==""){
                $('#client_social_reason_id1').empty();
            }else{
                $.get(route,function (response) {
                    $('#client_social_reason_id1').empty();
                    $('#client_social_reason_id1').append("<option selected='selected' value=''>Seleccione una opcion</option>");
                    for(i=0; i<response.length; i++){
                        $('#client_social_reason_id1').append("<option value='"+response[i].id+"'> "+response[i].nameReason+"</option>");
                    }
                });
            }

        });
            var Views = function(id) {
            var route = "{{url('admin/projects/')}}/"+id+"/edit";
           $.get( route, function( data ) {
                $("#id").val(data.id);
                $("#nameProject1").val(data.nameProject);
                $("#location1").val(data.location);
                $("#client_id1").val(data.client_id);
                $("#client_social_reason_id1").val(data.client_social_reason_id);
                $("#company_social_reason_id1").val(data.company_social_reason_id); 
                $("#dateStart1").val(data.dateStart); 
                $("#dateEnd1").val(data.dateEnd);
                $("#alias1").val(data.alias); 
                $("#commentJobs1").val(data.commentJobs);
                $("#street1").val(data.street);
                $("#numberE1").val(data.numberE);
                $("#numberI1").val(data.numberI);
                $("#nameContact1").val(data.nameContact);
                $("#phone1").val(data.phone);
                $("#email1").val(data.email);
                $("#manager1").val(data.manager); 
                $("#coordinator1").val(data.coordinator); 
                $("#resident1").val(data.resident);
                $("#estimation1").val(data.estimation); 
                $("#estimationDay1").val(data.estimationDay);
                $("#invoice1").val(data.invoice);
                $("#invoiceDay1").val(data.invoiceDay);
                $("#pay1").val(data.pay); 
                $("#payDay1").val(data.payDay);
                $("#label11").val(data.label1); 
                $("#label21").val(data.label2);
                $("#developments_id1").val(data.developments_id);
                $("#status1").val(data.status);

                $('#myModalEdit').modal('show');

               var id = $('#client_id1').val();
                cargaEditCombo(id,data.client_social_reason_id);
                
            });
        }
            var cargaEditCombo = function(id,client_social_reason) {
            var route = "{{url('admin/get_razon_social_cliente/')}}/"+id+"";

            $.get(route,function (response) {
                $('#client_social_reason_id1').empty();
                $('#client_social_reason_id1').append("<option selected='selected' value=''>Seleccione una opcion</option>");
                for(i=0; i<response.length; i++){
                    $('#client_social_reason_id1').append("<option value='"+response[i].id+"'> "+response[i].nameReason+"</option>");
                }

                $("#client_social_reason_id1").val(client_social_reason);
            });
        }
          $('#actualizar').click(function () {
            var id=  $("#id").val();
            var token =  $("#token").val();
            var route = "{{url('admin/projectsupdate/')}}/"+id+"";
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
                        $('#msjAlterno').html('<div class="alert alert-success mensajesAllSave"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Proyecto editado exitosamente!</div>');
                        setTimeout(function() {$(".mensajesAllSave").fadeOut(1500);},5000);

                        $("#nameProject_" + result.info.id).text(result.info.nameProject);
                        $("#dateStart_" + result.info.id).text(result.info.dateStart);
                        $("#dateEnd_" + result.info.id).text(result.info.dateEnd);

                        $("#client_id_" + result.info.id).text(result.reason);
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
    </script>
@endsection