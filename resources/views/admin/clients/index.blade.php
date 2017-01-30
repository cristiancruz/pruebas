@extends('admin.template.main')

@section('title',' Clientes')

@section('content')
<div class="text-center"><h1>Catálogo de Clientes</h1></div></br></br>

<div STYLE="max-width:950px; margin: auto;" id="content-ac">

    <!-- Modal NUEVO-->
    <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridModalLabel">Registro de Cliente y su razon social</h4>
                </div>

                <div class="modal-body">
                    <div class="container-fluid bd-example-row">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::open(['route'=>'admin.clients.store', 'method'=>'POST', 'files' => true]) !!}

                                <div class="form-group">
                                    {!! Form::label('name','Ingrese el Nombre del cliente:') !!}<div class="requerido">*</div>
                                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre','required','autofocus']) !!}
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('numberClient','Ingrese el Numero del Cliente:') !!}<div class="requerido">*</div>
                                            {!! Form::text('numberClient',null,['class'=>'form-control','placeholder'=>'Numero del ciente','required','autofocus']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('raiting','Ingrese numero de estrellas:') !!}
                                            {!! Form::select('raiting',['1'=>'Una estrella','2'=>'dos estrellas','3'=>'tres estrellas','4'=>'cuatro estrellas','5'=>'cinco estrellas'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('comments','Comentarios:') !!}
                                            {!! Form::text('comments',null,['class'=>'form-control','placeholder'=>'Comentarios','size' => '30x5']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('status','Estatus:') !!}<div class="requerido">*</div>
                                            {!! Form::select('status',['activo'=>'Activo','inactivo'=>'Inactivo'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('logoClient','Logo del Cliente') !!}
                                            {!! Form::file('logoClient')!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            {!! Form::label('nameContact','Ingrese un nombre de contacto :') !!}
                                            {!! Form::text('nameContact',null,['class'=>'form-control','placeholder'=>'Contacto','autofocus']) !!}
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('jobContact','Ingrese el puesto del contacto:') !!}
                                            {!! Form::text('jobContact',null,['class'=>'form-control','placeholder'=>'Actividad o Puesto','autofocus']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            {!! Form::label('phoneContact','Ingrese telefono de contacto:') !!}
                                            {!! Form::text('phoneContact',null,['class'=>'form-control','placeholder'=>'telefono fijo','autofocus']) !!}
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('cellContact','Ingrese telefono celular del contacto:') !!}
                                            {!! Form::text('cellContact',null,['class'=>'form-control','placeholder'=>'Número móvil celular']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            {!! Form::label('email','Ingrese correo electrónico de contacto:') !!}
                                            {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'correo@ejemplo.com','autofocus']) !!}
                                        </div>
                                    </div>
                                </div>
                                <hr>



                                <div class="form-group">
                                    {!! Form::label('nameReason','Rason Social de Cliente:') !!}<div class="requerido">*</div>
                                    {!! Form::text('nameReason',null,['class'=>'form-control','placeholder'=>'Denominación social','required']) !!}
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('rfc','Ingrese  RFC:') !!}<div class="requerido">*</div>
                                            {!! Form::text('rfc',null,['class'=>'form-control','placeholder'=>'RFC','required']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('street','Ingrese  Calle:') !!}
                                            {!! Form::text('street',null,['class'=>'form-control','placeholder'=>'Calle']) !!}
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('numberE','Ingrese Número Exterior:') !!}
                                            {!! Form::text('numberE',null,['class'=>'form-control','placeholder'=>'Numero Exterior']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('numberI','Ingrese Número Interior:') !!}
                                            {!! Form::text('numberI',null,['class'=>'form-control','placeholder'=>'Numero Interior']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('colony','Ingrese la Colonia:') !!}
                                            {!! Form::text('colony',null,['class'=>'form-control','placeholder'=>'Colonia']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('cp','Ingrese el CP:') !!}
                                            {!! Form::text('cp',null,['class'=>'form-control','placeholder'=>'CP']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('city','Ciudad:') !!}
                                            {!! Form::select('city', $state,null,['class'=>'form-control ','placeholder'=>'Seleccione una ciudad'])!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('state','Estado:') !!}
                                            {!! Form::select('state',[],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    {!! Form::label('webSite','Ingrese el Sitio Web:') !!}
                                    {!! Form::text('webSite',null,['class'=>'form-control','placeholder'=>'sitio web']) !!}
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('label1','Etiqueta 1:') !!}
                                            {!! Form::textarea('label1',null,['class'=>'form-control','placeholder'=>'Etiqueta 1','size' => '30x5']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::label('label2','Etiqueta 2:') !!}
                                            {!! Form::textarea('label2',null,['class'=>'form-control','placeholder'=>'Etiqueta 2','size' => '30x5']) !!}
                                        </div>
                                    </div>
                                </div>
                                <hr>

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
    <!-- /Modal -->
    <!-- Modal  logo-->
    <div id="myModalLogo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridModalLabel">Edición de logo de cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid bd-example-row">
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{asset('img/logos/logo_no_disponible.png')}}" style="width: 80px; height: 80px;  float: left;" class="LogoChange img-circle">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" id="token2">
                                <input type="hidden" id="idLogo">
                                <div class="form-group" style=" float: left; margin-left: 20px">
                                    {!! Form::label('logoClient2','Logo del cliente') !!}
                                    {!! Form::file('logoClient2')!!}
                                </div>
                                <div style="clear: both; ">

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> Cancelar</button>
                                    {{Form::button(' <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar', array('type' => 'submit', 'class' => 'btn btn-primary update_logo'))}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bd-example bd-example-padded-bottom">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
        </br></br>
    </div>
    <!-- /Modal -->
    @include('admin.clients.modalEdit')
    @include('admin.clients.modalNewReason')

    <div class="table-responsive" style="margin-bottom: 10px;">
        <table class="table table-striped table-hover text-center" id="tblRZE">
            <thead>
            <th class="text-center">No. de Cliente</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Razon Social Cliente</th>
            <th class="text-center">RFC</th>
            <th class="text-center">Logo</th>
            <th class="text-center">Estatus</th>
            <th class="text-center">Telefono</th>

            <th class="text-center"> Opciones</th>

            </thead>
            <tbody>
            @foreach($client as $clients)

            @foreach($datoid as $datoids)
            @if($clients->id == $datoids->client_id)

            <tr data-id="{{$clients->id}}">
                <td id="number_{{ $clients->id }}">{{$clients->numberClient}}</td>
                <td id="name_{{ $clients->id }}">{{$clients->name}}</td>
                <td id="razon_{{ $clients->id }}">{{$datoids->nameReason}}</td>
                <td id="rfc_{{ $clients->id }}">{{$datoids->rfc}}</td>

                <td>
                    @if($clients->logoClient!=null)
                    <img src="{{asset('/img/logos/'.$clients->logoClient)}}" alt="Logo del cliente" class="RSElogo img_{{$clients->id}} img-circle">
                    @elseif($clients->logoDefault!=null)
                    <img src="{{asset('/img/logos/'.$clients->logoDefault)}}" alt="Logo default" class="RSElogo img_{{$clients->id}} img-circle">
                    @else
                    No disponible dato
                    @endif
                </td>
                <td>
                    @if($clients->status=="activo")
                    {{Form::button(' <i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i><div class="hidden">Activo</div> ', array('type' => 'submit', 'class' => 'btn btn-default status', 'id'=>$clients->id ))}}
                    @elseif($clients->status=="inactivo")
                    {{Form::button(' <i class="fa fa-circle-o fa-2x" aria-hidden="true"></i><div class="hidden">Inactivo</div>', array('type' => 'submit', 'class' => 'btn btn-default status ', 'id'=>$clients->id))}}
                    @endif
                </td>

                <td id="phone_{{ $clients->id }}">{{$clients->cellContact}}</td>

                <td>
                    <a href="#|"  Onclick="Views({{$clients->id}})" class="btn btn-warning btn-edit" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                    <a href="#|"  class="btn btn-danger btn-delete"> <i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                </td>
            </tr>
            @endif

            @endforeach
            @endforeach

            </tbody>
        </table>

        {!! Form::open(['route'=> ['admin.clients.destroy',':USER_ID'],'method'=>'DELETE', 'id'=>'form-delete']) !!}

        {!! Form::close() !!}
        {!! Form::open(['route'=> ['admin.clients.update2',':USER_ID'],'method'=>'POST', 'id'=>'form-update']) !!}

        {!! Form::close() !!}
        {!! Form::open(['route'=> ['admin.clients.logoo',':USER_ID'],'method'=>'POST', 'id'=>'form-update-logo']) !!}

        {!! Form::close() !!}
        {!! Form::open(['route'=> ['admin.clients.update',':USER_ID'],'method'=>'POST', 'id'=>'form']) !!}

        {!! Form::close() !!}




    </div>
</div>

@endsection

@section('js')
<script>

    function archivo(evt) {
        var files = evt.target.files; // FileList object

        // Obtenemos la imagen del campo "file".
        for (var i = 0, f; f = files[i]; i++) {
            //Solo admitimos imágenes.
            if (!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                    // Insertamos la imagen
                    $('.LogoChange').attr('src', e.target.result);
                };
            })(f);

            reader.readAsDataURL(f);
        }
    }
    document.getElementById('logoClient2').addEventListener('change', archivo, false);


    $('.RSElogo').click(function () {
        var row = $(this).parents('tr');
        var id =row.data('id');
        var route = "{{url('admin/clients/')}}/"+id+"/edit";

        $('#idLogo').val(id);

        $.get( route, function( data ) {

            if(data.logoClient !=""){
                var srcLogo = data.logoClient;
            } else{
                var srcLogo = data.logoDefault;
            }
            var rutaL="{{asset('img/logos')}}"+"/"+srcLogo;
            $(".LogoChange").attr("src",rutaL);
            $('#myModalLogo').modal('show');
        });
    });

    $(".update_logo").click(function (e) {
        e.preventDefault();
        var id = $('#idLogo').val();
        var form = $('#form-update-logo');
        var url = form.attr('action').replace(':USER_ID',id);
        var data = new FormData();
        var f = $('#logoClient2').prop("files")[0];
        data.append('logoClient2',f);
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            url: url,
            type:'post',
            data:  data,
            dataType: 'json',
            processData: false,
            contentType: false,
            success:function (result) {
                $('#myModalLogo').modal('hide');

                if(result.data.logoClient !=""){
                    var srcLogo = result.data.logoClient;
                } else{
                    var srcLogo = result.data.logoDefault;
                }

                var rutaL="{{asset('img/logos')}}"+"/"+srcLogo;
                var id = $('#idLogo').val();
                $(".img_"+id).attr("src",rutaL);

                $('#msjAlterno').html('<div class="alert alert-success mensajesAll"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+result.msj+'</div>');
            },error:function (result) {
                $('#myModalLogo').modal('hide');
                $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>El logo no pudo ser actualizado </div>');
            }
        });
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
            $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> El cliente no pudo ser eliminado! </div>');

        });

    });

    $('#city').change(function (event) {
        var id = event.target.value;
        var route = "{{url('admin/municipalities/')}}/"+id+"";

        $.get(route,function (response,muni) {
            $('#state').empty();
            $('#state').append("<option selected='selected' value=''>Seleccione una opcion</option>");
            for(i=0; i<response.length; i++){
                $('#state').append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
            }
        });
    });


    $('#city1').change(function (event) {
        var id = event.target.value;
        var route = "{{url('admin/municipalities/')}}/"+id+"";
        if(id==""){
            $('#state1').empty();
        }else{
            $.get(route,function (response,muni) {
                $('#state1').empty();
                $('#state1').append("<option value=''>Seleccione una opcion</option>");

                for(i=0; i<response.length; i++){
                    $('#state1').append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
                }

            });
        }
    });


    $('#nameReason1').change(function (event){
        var varcambia=$('#nameReason1').val();
        $('#client_id').val(varcambia);
        var route = "{{url('admin/getReasonsSingle/')}}/"+ varcambia +"";

        $.get(route,function (response) {
            $('#rfc1').empty();
            $('#street1').empty();
            $('#numberE1').empty();
            $('#numberI1').empty();
            $('#colony1').empty();
            $('#cp1').empty();
            //$('#city1').empty()



            for(i=0; i<=response.length; i++){

                $('#rfc1').val(response[0].rfc);
                $('#street1').val(response[0].street);
                $('#numberE1').val(response[0].numberE);
                $('#numberI1').val(response[0].numberI);
                $('#colony1').val(response[0].colony);
                $('#cp1').val(response[0].cp);
                $('#city1').val(response[0].city);
                $('#id_state').val(response[0].state);
                var city=$('#city1').val();

                var route = "{{url('admin/municipalities/')}}/"+city+"";
                $.get(route,function (response) {
                    var idxtc=$('#id_state').val();
                    $('#state1').empty();
                    $('#state1').append("<option value=''>Seleccione una opcion</option>");

                    for(i=0; i<response.length; i++){
                        $('#state1').append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
                    }
                    $('#state1').val(idxtc);
                });
            }
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

            if(result.statusRSE=="activo"){
                $('#'+result.id).html('<i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i>');
            }else if(result.statusRSE=="inactivo"){
                $('#'+result.id).html('<i class="fa fa-circle-o fa-2x" aria-hidden="true"></i>');
            }

        }).fail(function () {
            $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> El Estado no pudo ser editado! </div>');
        });
    });


    var table = $('#tblRZE').DataTable( {
        "language": {
            "url": "{{asset('pluings/datatable/js/Spanish.json')}}"
        }  , "order": [[ 3, "asc" ]]
        ,columnDefs: [ {
            targets: [ 3 ],
            orderData: [ 3, 0 ]
        }]
    });

    var Views = function(id) {

        var route = "{{url('admin/clients/')}}/"+id+"/edit";

        $.get( route, function( result) {

            $("#id").val(result.data.id);
            $("#name1").val(result.data.name);
            $("#numberClient1").val(result.data.numberClient);
            $("#raiting1").val(result.data.raiting);
            $("#comments1").val(result.data.comments);
            $("#status1").val(result.data.status);
            $("#nameContact1").val(result.data.nameContact);
            $("#jobContact1").val(result.data.jobContact);
            $("#phoneContact1").val(result.data.phoneContact);
            $("#cellContact1").val(result.data.cellContact);
            $("#email1").val(result.data.email);
            var idmain=$("#id").val();

            cargarComboNameReason(idmain);

            $("#rfc1").val(result.razon[0].rfc);
            $("#street1").val(result.razon[0].street);
            $("#numberE1").val(result.razon[0].numberE);
            $("#numberI1").val(result.razon[0].numberI);
            $("#colony1").val(result.razon[0].colony);
            $("#cp1").val(result.razon[0].cp);
            $("#id_municipio").val(result.razon[0].state);
            $("#city1").val(result.razon[0].city);
            var idmuni=result.razon[0].state;

            $("#webSite1").val(result.razon[0].webSite);
            $("#label11").val(result.razon[0].label1);
            $("#label21").val(result.razon[0].label2);
            $('#client_id').val(result.razon[0].id);

            var id = $('#city1').val();

            cargaEditCombo(id);

            $('#myModalEdit').modal('show');
        });
    }


    //cargar combo de razon social
    var cargarComboNameReason = function(id ){
        var route = "{{url('admin/getReasons/')}}/"+ id +"";

        $.get(route,function (reasons) {
            $('#nameReason1').empty();
            $('#nameReason1').append("<option value=''>Seleccione una opcion</option>");

            var xtc=$("#client_id").val();

            for(i=0; i<reasons.length; i++){
                $('#nameReason1').append("<option value="+'"'+reasons[i].id+'"'+"> "+reasons[i].nameReason+"</option>");
            }
            $("#nameReason1").val(xtc);
        });
    }


    var cargaEditCombo = function(id) {
        var route = "{{url('admin/municipalities/')}}/"+id+"";

        $.get(route,function (response) {
            var muni=$("#id_municipio").val();

            $('#state1').empty();
            $('#state1').append("<option selected='selected' value=''>Seleccione una opcion</option>");

            for(i=0; i<response.length; i++){

                $('#state1').append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
            }
            $("#state1").val(muni);
        });
    }


    $('#actualizar').click(function () {
        var id=  $("#id").val();
        var token =  $("#token").val();
        var route = "{{url('admin/clients/')}}/"+id+"";
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
                    $('#msjAlterno').html('<div class="alert alert-success mensajesAll"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Cliente editado exitosamente!</div>');

                    $("#number_" + result.info_cli.id).text(result.info_cli.numberClient);
                    $("#name_" + result.info_cli.id).text(result.info_cli.name);
                    $("#razon_" + result.info_cli.id).text(result.info_reason.nameReason);
                    $("#rfc_" + result.info_cli.id).text(result.info_reason.rfc);
                    $("#phone_" + result.info_cli.id).text(result.info_cli.phoneContact);

                }
            },error:function (result) {
                $('#myModalEdit').modal('hide');
                $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>El Cliente no pudo ser editado</div>');
            }
        });
    });
</script>
@endsection