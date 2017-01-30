@extends('admin.template.main')

@section('title',' RZE')

@section('content')
    <div class="text-center"><h1>Catálogo de Razón Social Empresa</h1></div></br></br>

    <div STYLE="max-width:950px; margin: auto;" id="content-ac">
        <!-- Modal NUEVO-->
        <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridModalLabel">Registro de Razón Social Empresa</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div class="row">
                                <div class="col-md-12">

                                    {!! Form::open(['route'=>'admin.company_social_reason.store', 'method'=>'POST', 'files' => true]) !!}
                                    <div class="form-group">
                                        {!! Form::label('companyReason','Ingrese la Razón Social Empresa:') !!}<div class="requerido">*</div>
                                        {!! Form::text('companyReason',null,['class'=>'form-control','placeholder'=>'Nombre de la Razón Social Empresa','required','autofocus']) !!}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('rfc','Ingrese el RFC:') !!}<div class="requerido">*</div>
                                                {!! Form::text('rfc',null,['class'=>'form-control','placeholder'=>'RFC','required']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('phone','Ingrese el Teléfono:') !!}
                                                {!! Form::text('phone',null,['class'=>'form-control','placeholder'=>'Teléfono']) !!}
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
                                                {!! Form::label('city','Estado:') !!}
                                                {!! Form::select('city', $state,null,['class'=>'form-control ','placeholder'=>'Seleccione una opcion'])!!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('state','Ciudad:') !!}
                                                {!! Form::select('state',[],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('website','Ingrese el Sitio Web:') !!}
                                        {!! Form::text('website',null,['class'=>'form-control','placeholder'=>'sitio web']) !!}
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
                                                {!! Form::textarea('label2cl',null,['class'=>'form-control','placeholder'=>'Etiqueta 2','size' => '30x5']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('logoEnterprice','Logo de la empresa') !!}
                                        {!! Form::file('logoEnterprice')!!}
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
        <!-- /Modal -->
        <!-- Modal  logo-->
        <div id="myModalLogo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="gridModalLabel">Edición de logo</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="{{asset('public/img/logos/logo_no_disponible.png')}}" style="width: 80px; height: 80px;  float: left;" class="LogoChange img-circle">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" id="token2">
                                    <input type="hidden" id="idLogo">
                                    <div class="form-group" style=" float: left; margin-left: 20px">
                                        {!! Form::label('logoEnterprice2','Logo de la empresa') !!}
                                        {!! Form::file('logoEnterprice2')!!}
                                    </div>
                                    <div style="clear: both;"></div>
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
            @if($perm_btn[0]->add==1)
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
            @endif
            </br></br>
        </div>
        <!-- /Modal -->
        @include('admin.company_social_reason.modalEdit')
        <div class="table-responsive" style="margin-bottom: 10px;">
            <table class="table table-striped table-hover text-center" id="tblRZE">
                <thead>
                    <th class="text-center">Razón social</th>
                    <th class="text-center">RFC</th>
                    <th class="text-center">Logo</th>
                    <th class="text-center">Estatus</th>
                    <th class="text-center">Opciones</th>
                </thead>
                <tbody>
                @foreach($rsee as $rses)
                    <tr data-id="{{$rses->id}}">
                        <td id="razon_{{ $rses->id }}">{{$rses->companyReason}}</td>
                        <td id="rfc_{{ $rses->id }}">{{$rses->rfc}}</td>
                        <td>
                            @if($perm_btn[0]->update==1)
                                    @if($rses->logoEnterprice!=null)
                                            <img src="{{asset('public/img/logos/'.$rses->logoEnterprice)}}" alt="Logo de la empresa" class="RSElogo img_{{$rses->id}} img-circle">
                                    @elseif($rses->logoDefault!=null)
                                            <img src="{{asset('public/img/logos/'.$rses->logoDefault)}}" alt="Logo default" class="RSElogo img_{{$rses->id}} img-circle">
                                    @else
                                             No disponible dato
                                     @endif
                            @else
                                    @if($rses->logoEnterprice!=null)
                                        <img src="{{asset('public/img/logos/'.$rses->logoEnterprice)}}" alt="Logo de la empresa" class="img-circle"  style="width: 80px; height: 80px;">
                                    @elseif($rses->logoDefault!=null)
                                        <img src="{{asset('public/img/logos/'.$rses->logoDefault)}}" alt="Logo default" class="img-circle"  style="width: 80px; height: 80px;">
                                    @else
                                        No disponible dato
                                    @endif
                            @endif
                        </td>
                        <td>
                            @if($perm_btn[0]->update==1)
                                @if($rses->status=="activo")
                                    {{Form::button(' <i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i><div class="hidden">Activo</div> ', array('type' => 'submit', 'class' => 'btn btn-default status', 'id'=>$rses->id ))}}
                                @elseif($rses->status=="inactivo")
                                    {{Form::button(' <i class="fa fa-circle-o fa-2x" aria-hidden="true"></i><div class="hidden">Inactivo</div>', array('type' => 'submit', 'class' => 'btn btn-default status ', 'id'=>$rses->id))}}
                                @endif
                                @else
                                {{$rses->status}}
                            @endif
                        </td>
                        <td>
                            @if($perm_btn[0]->update==1)
                             <a href="#|"  Onclick="Views({{$rses->id}})" class="btn btn-warning btn-edit" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                            @endif
                            @if($perm_btn[0]->delete==1)
                                     <a href="#|"  class="btn btn-danger btn-delete"> <i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! Form::open(['route'=> ['admin.company_social_reason.destroy',':USER_ID'],'method'=>'DELETE', 'id'=>'form-delete']) !!}

            {!! Form::close() !!}
            {!! Form::open(['route'=> ['admin.company_social_reason.update2',':USER_ID'],'method'=>'POST', 'id'=>'form-update']) !!}

            {!! Form::close() !!}
            {!! Form::open(['route'=> ['admin.company_social_reason.logo',':USER_ID'],'method'=>'POST', 'id'=>'form-update-logo']) !!}

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
        document.getElementById('logoEnterprice2').addEventListener('change', archivo, false);

        $('.RSElogo').click(function () {
            var row = $(this).parents('tr');
            var id =row.data('id');
            var route = "{{url('admin/company_social_reason/')}}/"+id+"/edit";
            $('#idLogo').val(id);
            $.get( route, function( data ) {

                if(data.logoEnterprice !=""){
                    var srcLogo = data.logoEnterprice;
                } else{
                    var srcLogo = data.logoDefault;
                }
                var rutaL="{{asset('public/img/logos')}}"+"/"+srcLogo;
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
            var f = $('#logoEnterprice2').prop("files")[0];
           data.append('logoEnterprice2',f);
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

                    if(result.data.logoEnterprice !=""){
                        var srcLogo = result.data.logoEnterprice;
                    } else{
                        var srcLogo = result.data.logoDefault;
                    }
                    var rutaL="{{asset('public/img/logos')}}"+"/"+srcLogo;
                    var id = $('#idLogo').val();
                    $(".img_"+id).attr("src",rutaL);

                    $('#msjAlterno').html('<div class="alert alert-success mensajesAll"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+result.msj+'</div>');
                },error:function (result) {
                    $('#myModalLogo').modal('hide');
                    $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>El logo no pudo ser actualizado </div>');
                }
            });

        });

        var Views = function(id) {
            var route = "{{url('admin/company_social_reason/')}}/"+id+"/edit";
            $.get( route, function( data ) {
                $("#id").val(data.id);
                $("#nameRazonC1").val(data.companyReason);
                $("#rfc1").val(data.rfc);
                $("#phone1").val(data.phone);
                $("#street1").val(data.street);
                $("#numberI1").val(data.numberI);
                $("#numberE1").val(data.numberE);
                $("#colony1").val(data.colony);
                $("#cp1").val(data.cp);
                $("#city1").val(data.city);
                $("#webside1").val(data.website);
                $("#eti1").val(data.label1);
                $("#eti2").val(data.label2);


                var id = $('#city1').val();
                cargaEditCombo(id,data.state);
                $('#myModalEdit').modal('show');
            });
        }

        $('#actualizar').click(function () {
            var id=  $("#id").val();
            var token =  $("#token").val();
            var route = "{{url('admin/company_social_reason/')}}/"+id+"";
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
                        $('#msjAlterno').html('<div class="alert alert-success mensajesAll"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Razón editada exitosamente!</div>');

                        $("#razon_" + result.data._method).text(result.data.companyReason);
                        $("#rfc_" + result.data._method).text(result.data.rfc);
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

        $('#city').change(function (event) {
            var id = event.target.value;
            if(id==""){
                $('#state').empty();
            }else{
                var route = "{{url('admin/municipalities/')}}/"+id+"";

                $.get(route,function (response,muni) {
                    $('#state').empty();
                    $('#state').append("<option selected='selected' value=''>Seleccione una opcion</option>");
                    for(i=0; i<response.length; i++){
                        $('#state').append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
                    }
                });
            }

        });

        $('#city1').change(function (event) {
            var id = event.target.value;
            var route = "{{url('admin/municipalities/')}}/"+id+"";
            if(id==""){
                $('#state1').empty();
            }else{
                $.get(route,function (response,muni) {
                    $('#state1').empty();
                    $('#state1').append("<option selected='selected' value=''>Seleccione una opcion</option>");
                    for(i=0; i<response.length; i++){
                        $('#state1').append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
                    }
                });
            }

        });

        var cargaEditCombo = function(id,id_muni) {
            var route = "{{url('admin/municipalities/')}}/"+id+"";

            $.get(route,function (response,muni) {
                $('#state1').empty();
                $('#state1').append("<option selected='selected' value=''>Seleccione una opcion</option>");
                for(i=0; i<response.length; i++){
                    $('#state1').append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
                }

                $("#state1").val(id_muni);
            });
        }
        var table = $('#tblRZE').DataTable( {
            "language": {
                "url": "{{asset('public/pluings/datatable/js/Spanish.json')}}"
            }  , "order": [[ 3, "asc" ]]
            ,columnDefs: [ {
                targets: [ 3 ],
                orderData: [ 3, 0 ]
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
                $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> La Razón no pudo ser eliminada! </div>');

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

        $('#myModal').on('shown.bs.modal', function() {
            $('#companyReason').focus();
        })
        $('#myModalEdit').on('shown.bs.modal', function() {
            $('#nameRazonC1').focus();
        })




    </script>
@endsection