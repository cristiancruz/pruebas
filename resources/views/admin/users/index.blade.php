@extends('admin.template.main')

@section('title','PPU')

@section('content')
    <div class="text-center"><h1>Catálogo de Perfiles, Permisos y Usuarios</h1></div></br></br>
    <div style="max-width: 1200px; margin: auto;">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Catálogo de Perfiles y Permisos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#users" role="tab1">Catálogo de Usuarios</a>
            </li>
        </ul>
        </br> </br>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="profile" >
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Catálogo de Perfiles</h3>
                    </div>
                    <div class="panel-body">
                        <div style="max-width: 950px; margin: auto;">
                            <!-- Modal -->
                            <div id="myModalProfile" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="gridModalLabel">Registro de Unidades</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid bd-example-row">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        {!! Form::open(['route'=>'admin.profile.store', 'method'=>'POST']) !!}
                                                        <div class="form-group">
                                                            {!! Form::label('nameProfile','Ingrese el Perfil:') !!}<div class="requerido">*</div>
                                                            {!! Form::text('nameProfile',null,['class'=>'form-control','placeholder'=>'Nombre del perfil','required','autofocus']) !!}
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
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalProfile"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
                                   @endif

                                </br></br>
                            </div>
                            <!-- /Modal -->
                            <div class="table-responsive" style="margin-bottom: 10px;">
                                <table class="table table-striped table-hover text-center" id="tblProfile">
                                    <thead >
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Opciones</th>
                                    </thead>
                                    <tbody>
                                    @foreach($profile_complete as $pro)
                                        <tr data-id="{{$pro->id}}">
                                            <td>
                                                    @if($perm_btn[0]->update==1)
                                                        <a href="#"
                                                           data-type="text"
                                                           data-pk="{{$pro->id}}"
                                                           data-url="{{url("admin/profile/$pro->id")}}"
                                                           data-title="Nombre del perfil"
                                                           data-value="{{$pro->nameProfile}}"
                                                           class="set-name-profile"
                                                           data-name="nameProfile">
                                                        </a>
                                                        @else
                                                        {{$pro->nameProfile}}
                                                    @endif

                                            </td>
                                            <td>
                                                    @if($perm_btn[0]->delete==1)
                                                        <a href="#|"  class="btn btn-danger btn-delete-profile"> <i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>
                                                    @else
                                                        <span>Sin Permiso</span>
                                                    @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {!! Form::open(['route'=> ['admin.profile.destroy',':USER_ID'],'method'=>'DELETE', 'id'=>'form-delete-profile']) !!}

                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Catálogo de Permisos</h3>
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('nameProfile','Perfil') !!}<div class="requerido">*</div>
                                    {!! Form::select('nameProfile', $profile,null,['class'=>'form-control ','placeholder'=>'Seleccione una opcion','required','id'=>'nameProfileClik'])!!}
                                </div>
                            </div>
                            <div class="col-md-8">
                                <p style="margin-top: 35px; color:red;">Recuerde seleccionar un perfil para poder modificar los permisos**</p>
                            </div>
                        </div>

                        <!-- ACORDION PERMISOS -->
                        <div class="panel-group" id="accordion">
                            @foreach($padre as $padres )

                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$padres->id}}" data-padre="{{$padre = $padres->id}}">{{$padres->section}}</a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{$padres->id}}" class="panel-collapse collapse ">
                                        <div class="panel-body">

                                            <div class="table-responsive" style="margin: 10px auto; max-width: 950px">
                                                <table class="table table-striped table-hover text-center" id="tblPermission">
                                                    <thead >
                                                    <th class="text-center">Modulo</th>
                                                    <th class="text-center">Ver</th>
                                                    <th class="text-center">Agregar</th>
                                                    <th class="text-center">Editar</th>
                                                    <th class="text-center">Eliminar</th>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($hijos as $hijo )

                                                        @if($hijo->reference == $padres->id)

                                                            <tr data-hijo="{{$hijo->id}}">
                                                                <td class="text-left">
                                                                    <strong>
                                                                        {{$hijo->section}}
                                                                    </strong>
                                                                </td>
                                                                <!--VALIDAR-->
                                                                @if($hijo->hijo==0)
                                                                    <td>
                                                                        <input type="checkbox"   id="view_{{$hijo->id}}" disabled="disabled" class="view_id">
                                                                    </td>
                                                                    <td>
                                                                        @if($hijo->haveAdd==1)
                                                                            <input type="checkbox" id="add_{{$hijo->id}}" disabled="disabled" class="add_id">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($hijo->haveUpdate==1)
                                                                            <input type="checkbox" id="update_{{$hijo->id}}" disabled="disabled" class="update_id">
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($hijo->haveDelete==1)
                                                                            <input type="checkbox" id="delete_{{$hijo->id}}" disabled="disabled" class="delete_id">
                                                                        @endif
                                                                    </td>
                                                                @else
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                            </tr>
                                                            @endif
                                                            <!--/VALIDAR-->

                                                            @foreach($hijos as $hijo2 )

                                                                @if($hijo2->reference == $hijo->id)
                                                                    <tr data-hijo="{{$hijo2->id}}">
                                                                        <td class="text-left">
                                                                                   <span style="padding-left: 20px;">
                                                                                       {{$hijo2->section}}
                                                                                   </span>
                                                                        </td>
                                                                        <td>
                                                                            <input type="checkbox" id="view_{{$hijo2->id}}" disabled="disabled" class="view_id">
                                                                        </td>
                                                                        <td>
                                                                            @if($hijo2->haveAdd==1)
                                                                                <input type="checkbox" id="add_{{$hijo2->id}}" disabled="disabled"  class="add_id">
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if($hijo2->haveUpdate==1)
                                                                                <input type="checkbox" id="update_{{$hijo2->id}}" disabled="disabled" class="update_id">
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if($hijo2->haveDelete==1)
                                                                                <input type="checkbox" id="delete_{{$hijo2->id}}" disabled="disabled" class="delete_id">
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endif

                                                            @endforeach

                                                        @endif

                                                    @endforeach

                                                    </tbody>
                                                </table>
                                                {!! Form::open(['route'=> ['admin.permission.update_store',':USER_ID'],'method'=>'POST', 'id'=>'form-update_store']) !!}

                                                {!! Form::close() !!}

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                        <!-- /ACORDION PERMISOS -->

                    </div>
                </div>

            </div>
            <div class="tab-pane" id="users" >
                <div class="text-center"><h1>Catálogo de Usuarios</h1></div>
                <!-- Modal -->
                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="gridModalLabel">Registro de Usuarios</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid bd-example-row">
                                    <div class="row">
                                        <div class="col-md-12">

                                            {!! Form::open(['id'=>'form-create']) !!}
                                            <div class="form-group">
                                                {!! Form::label('username','Ingrese el usuario:') !!}<div class="requerido">*</div>
                                                {!! Form::text('username',null,['class'=>'form-control','placeholder'=>'Nombre de usuario','required']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('name','Ingrese el nombre:') !!}<div class="requerido">*</div>
                                                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de la persona','required']) !!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('email', 'Correo electronico') !!}
                                                {!! Form::email('email',null, ['class'=>'form-control','placeholder'=>'example@gmail.com'])!!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('password', 'Contraseña') !!}<div class="requerido">*</div>
                                                {!! Form::password('password', ['class'=>'form-control','placeholder'=>'*******','required'])!!}
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('bankAccount','Ingrese la cuenta bancaria:') !!}
                                                {!! Form::text('bankAccount',null,['class'=>'form-control','placeholder'=>'Cuenta bancaria']) !!}
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        {!! Form::label('bank_id','Banco') !!}<div class="requerido">*</div>
                                                        {!! Form::select('bank_id',$bank,null,['class'=>'form-control ','placeholder'=>'Seleccione una opción','required'])!!}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        {!! Form::label('profile_id','Perfil') !!}<div class="requerido">*</div>
                                                        {!! Form::select('profile_id',$profile,null,['class'=>'form-control','placeholder'=>'Seleccione una opción','required']) !!}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> Cancelar</button>
                                {{Form::button(' <i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar', array('type' => 'submit', 'class' => 'btn btn-primary saveUser'))}}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="bd-example bd-example-padded-bottom" style="margin-top: 15px;">
                        @if($perm_btn[0]->add==1)
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
                        @endif
                    </br></br>
                </div>
                <!-- /Modal -->
                @include('admin.users.modalEdit')

                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center" id="tblUser">
                        <thead >
                        <th class="text-center">Usuario</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Perfil</th>
                        <th class="text-center">Estatus</th>
                        <th class="text-center">Opcioes</th>
                        </thead>
                        <tbody>
                        @foreach($user as $users)
                            <tr data-id="{{$users->id}}">
                                <td id="UserName_{{$users->id}}">
                                    {{$users->username}}
                                </td>
                                <td id="Name_{{$users->id}}">
                                    {{$users->name}}
                                </td>
                                <td id="Email_{{$users->id}}">
                                    {{$users->email}}
                                </td>
                                <td id="Profile_{{$users->id}}">
                                    {{$users->profile->nameProfile}}
                                </td>
                                <td>
                                        @if($perm_btn[0]->update==1)
                                                @if($users->status=="activo")
                                                    {{Form::button(' <i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i><div class="hidden">Activo</div> ', array('type' => 'submit', 'class' => 'btn btn-default status', 'id'=>$users->id ))}}
                                                @elseif($users->status=="inactivo")
                                                    {{Form::button(' <i class="fa fa-circle-o fa-2x" aria-hidden="true"></i><div class="hidden">Inactivo</div>', array('type' => 'submit', 'class' => 'btn btn-default status ', 'id'=>$users->id))}}
                                                @endif
                                            @else
                                            {{$users->status}}
                                        @endif
                                </td>
                                <td>
                                        @if($perm_btn[0]->update==1)
                                            <a href="#|"  Onclick="Views({{$users->id}})" class="btn btn-warning btn-edit" ><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>
                                        @endif
                                        @if($perm_btn[0]->delete==1)
                                            <a href="#|"  class="btn btn-danger btn-delete"> <i class="fa fa-trash" aria-hidden="true"></i> Eliminar</a>

                                        @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! Form::open(['route'=> ['admin.users.destroy',':USER_ID'],'method'=>'DELETE', 'id'=>'form-delete']) !!}

                    {!! Form::close() !!}
                    {!! Form::open(['route'=> ['admin.users.update2',':USER_ID'],'method'=>'POST', 'id'=>'form-update']) !!}

                    {!! Form::close() !!}
                    {!! Form::open(['route'=> ['admin.users.store'],'method'=>'POST']) !!}

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
        <!-- /Tab panes -->
    </div>
@endsection


@section('js')

    <script>
        var hash = window.location.hash;
        if(hash==""){
            $('.nav-tabs a[href="#profile"]').tab('show');
        }else{
            $('.nav-tabs a[href="#users"]').tab('show');
        }
        $.fn.editable.defaults.mode = 'inline';
        $.fn.editable.defaults.ajaxOptions = {type:'PUT'};

        //******************************************************************************************* PERFILES TAB---------------------------------------------------------------------------------------------------


        $('#nameProfileClik').change(function (event) {
            var id = $("#nameProfileClik").val();
            if(id == ""){
                $('input:checkbox').prop('disabled', true);//bloquear
                $('input:checkbox').prop("checked", false);//quitar marca
            }else{
                $('input:checkbox').prop('disabled', false);//desbloquear
                $('input:checkbox').prop("checked", false);//quitar marcas

                var route = "{{url('admin/permission/')}}/"+id+"/edit";

                $.get(route, function(data){
                    if(data.length>0){
                        $.each( data, function( index, data ){
                            if(data.view == 0){//quitar marcas y bloquear add,update,delete
                                $("#add_"+data.sections_id).prop("checked", false);
                                if (data.add == 1) {
                                    $("#add_" + data.sections_id).prop("checked", true);
                                }else{$("#add_" + data.sections_id).prop("checked", false);}
                                if (data.update == 1) {
                                    $("#update_" + data.sections_id).prop("checked", true);
                                }else{ $("#update_" + data.sections_id).prop("checked", false);}

                                if (data.delete == 1) {
                                    $("#delete_" + data.sections_id).prop("checked", true);
                                }else{ $("#delete_" + data.sections_id).prop("checked", false);}
                            } else {
                                $("#view_" + data.sections_id).prop("checked", true);//poner su marca
                                if (data.add == 1) {
                                    $("#add_" + data.sections_id).prop("checked", true);
                                }else{$("#add_" + data.sections_id).prop("checked", false);}
                                if (data.update == 1) {
                                    $("#update_" + data.sections_id).prop("checked", true);
                                }else{ $("#update_" + data.sections_id).prop("checked", false);}

                                if (data.delete == 1) {
                                    $("#delete_" + data.sections_id).prop("checked", true);
                                }else{ $("#delete_" + data.sections_id).prop("checked", false);}

                            }//fin else de vista es 1
                        });//fin each recorrido
                    }else{
                        $('input:checkbox').prop("checked", false);//quitar marca
                    }
                });// fin get data
            }//fin else- area logica
        });
        $(".view_id").click(function () {

            var id = $("#nameProfileClik").val();
            var row = $(this).parents('tr');
            var section = row.data('hijo');
            var form = $('#form-update_store');
            var route = form.attr('action').replace(':USER_ID',id+"/"+section);

            if(id == ""){}else{
                $.get(route, function(result){
                    if(result.success){
                        if(result.data.length>0){
                            var url="{{url('admin/perm')}}/"+id+"/"+section;
                            var data={profiles_id:id ,sections_id:section, "_token": "{{ csrf_token() }}"};

                            $.ajaxSetup({
                                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                            });
                            $.ajax({
                                url: url,
                                type:'put',
                                data: data,
                                dataType: 'json',
                                success:function (result) {
                                },error:function (result) {
                                    alertify.alert("Advertencia","No se pudo agregar el permiso de  ver.");
                                }
                            });
                        }
                        else{
                            var url="{{url('admin/permission')}}";
                            var data={profiles_id:id ,sections_id:section, "_token": "{{ csrf_token() }}",view:1};

                            $.ajaxSetup({
                                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                            });
                            $.ajax({
                                url: url,
                                type:'post',
                                data: data,
                                dataType: 'json',
                                success:function (result) {
                                },error:function (result) {
                                    alertify.alert("Advertencia","No se pudo agregar el permiso de  ver.");
                                }
                            });
                        }   //FIN ELSE

                    }

                });
            }

        });
        $(".add_id").click(function () {

            var id = $("#nameProfileClik").val();
            var row = $(this).parents('tr');
            var section = row.data('hijo');
            var form = $('#form-update_store');
            var route = form.attr('action').replace(':USER_ID',id+"/"+section);//ver si hay registros

            if(id == ""){}else{
                $.get(route, function(result){

                    if(result.success){
                        if(result.data.length>0){

                            var url="{{url('admin/permA')}}/"+id+"/"+section;
                            var data={profiles_id:id ,sections_id:section, "_token": "{{ csrf_token() }}"};

                            $.ajaxSetup({
                                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                            });
                            $.ajax({
                                url: url,
                                type:'put',
                                data: data,
                                dataType: 'json',
                                success:function (result) {
                                },error:function (result) {
                                    alertify.alert("Advertencia","No se pudo agregar el permiso de  agregar.");
                                }
                            });
                        }
                        else{
                            var url="{{url('admin/permission')}}";
                            var data={profiles_id:id ,sections_id:section,view:1,add:1, "_token": "{{ csrf_token() }}"};

                            $.ajaxSetup({
                                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                            });
                            $.ajax({
                                url: url,
                                type:'post',
                                data: data,
                                dataType: 'json',
                                success:function (result) {
                                    if(result.success){

                                        var route = "{{url('admin/permission/')}}/"+id+"/edit";
                                        $.get(route, function(data){
                                            if(data.length>0){
                                                $.each( data, function( index, data ){$("#view_" + data.sections_id).prop("checked", true);//poner su marca
                                                });
                                            }
                                        });
                                    }
                                },error:function (result) {
                                    alertify.alert("Advertencia","No se pudo agregar el permiso de  agregar.");
                                }
                            });
                        }
                    }
                });
            }

        });
        $(".update_id").click(function () {
            var id = $("#nameProfileClik").val();
            var row = $(this).parents('tr');
            var section = row.data('hijo');
            var form = $('#form-update_store');
            var route = form.attr('action').replace(':USER_ID',id+"/"+section);//ver si hay registros

            if(id == ""){}else{
                $.get(route, function(result){

                    if(result.success){
                        if(result.data.length>0){
                            var url="{{url('admin/permU')}}/"+id+"/"+section;
                            var data={profiles_id:id ,sections_id:section, "_token": "{{ csrf_token() }}"};

                            $.ajaxSetup({
                                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                            });
                            $.ajax({
                                url: url,
                                type:'put',
                                data: data,
                                dataType: 'json',
                                success:function (result) {
                                },error:function (result) {
                                    alertify.alert("Advertencia","No se pudo agregar el permiso de  editar.");
                                }
                            });
                        }
                        else{
                            var url="{{url('admin/permission')}}";
                            var data={profiles_id:id ,sections_id:section,view:1,update:1, "_token": "{{ csrf_token() }}"};

                            $.ajaxSetup({
                                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                            });
                            $.ajax({
                                url: url,
                                type:'post',
                                data: data,
                                dataType: 'json',
                                success:function (result) {
                                    if(result.success){
                                        var route = "{{url('admin/permission/')}}/"+id+"/edit";
                                        $.get(route, function(data){
                                            if(data.length>0){
                                                $.each( data, function( index, data ){$("#view_" + data.sections_id).prop("checked", true);//poner su marca
                                                });
                                            }
                                        });
                                    }
                                },error:function (result) {
                                    alertify.alert("Advertencia","No se pudo agregar el permiso de  editar.");
                                }
                            });
                        }
                    }
                });
            }

        });
        $(".delete_id").click(function () {
            var id = $("#nameProfileClik").val();
            var row = $(this).parents('tr');
            var section = row.data('hijo');
            var form = $('#form-update_store');
            var route = form.attr('action').replace(':USER_ID',id+"/"+section);//ver si hay registros

            if(id == ""){ console.log("perfil vacio");}else{
                $.get(route, function(result){

                    if(result.success){
                        if(result.data.length>0){
                            var url="{{url('admin/permD')}}/"+id+"/"+section;
                            var data={profiles_id:id ,sections_id:section, "_token": "{{ csrf_token() }}"};

                            $.ajaxSetup({
                                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                            });
                            $.ajax({
                                url: url,
                                type:'put',
                                data: data,
                                dataType: 'json',
                                success:function (result) {
                                },error:function (result) {
                                    alertify.alert("Advertencia","No se pudo agregar el permiso de  eliminar.");
                                }
                            });
                        }
                        else{
                            var url="{{url('admin/permission')}}";
                            var data={profiles_id:id ,sections_id:section,view:1,delete:1, "_token": "{{ csrf_token() }}"};

                            $.ajaxSetup({
                                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                            });
                            $.ajax({
                                url: url,
                                type:'post',
                                data: data,
                                dataType: 'json',
                                success:function (result) {
                                    if(result.success){

                                        var route = "{{url('admin/permission/')}}/"+id+"/edit";
                                        $.get(route, function(data){
                                            if(data.length>0){
                                                $.each( data, function( index, data ){$("#view_" + data.sections_id).prop("checked", true);//poner su marca
                                                });
                                            }
                                        });
                                    }
                                },error:function (result) {
                                    alertify.alert("Advertencia","No se pudo agregar el permiso de  eliminar.");
                                }
                            });
                        }
                    }
                });
            }

        });
        var table = $('#tblProfile').DataTable( {
            "language": {
                "url": "{{asset('public/pluings/datatable/js/Spanish.json')}}"
            }  , "order": [[ 0, "asc" ]]
        });
        $(".set-name-profile").editable({
                    error: function(response, newValue) {
                        $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> El Perfil no pudo ser editado! </div>');
                    }
                });
        $('.btn-delete-profile').click(function (e) {
            e.preventDefault();
            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#form-delete-profile');

            alertify.confirm("Advertencia","¿Está seguro que desea realizar esta operación?, se borrará todo Usuario que contenga este perfil.",
                    function(){
                        //  alertify.success('Ok');
                        var url = form.attr('action').replace(':USER_ID',id);
                        var data = form.serialize();
                        row.fadeOut();

                        $.post(url,data,function (result) {
                            $('#msjAlterno').html('<div class="alert alert-success mensajesAll"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+result+'</div>');
                        }).fail(function () {
                            row.fadeIn();
                            row.show();
                            $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> El Perfil no pudo ser eliminado! </div>');

                        });
                    },
                    function(){
                        //  alertify.error('Cancel');
                    });


        });

        //******************************************************************************************* USUARIOS TAB---------------------------------------------------------------------------------------------------
        $('#myModal').on('shown.bs.modal', function() {
            $('#username').focus();
        })
        $('#myModalEdit').on('shown.bs.modal', function() {
            $('#username1').focus();
        })
        $('.saveUser').click(function (e) {
            e.preventDefault();
            var form = $('#form-create');
            var url = form.attr('action');
            var data = form.serialize();
            $.post(url,data,function (result) {
                if(result.success){
                    var name = result.data.name;

                    $('#myModal').modal('hide');
                    $('#msjAlterno').html('<div class="alert alert-success mensajesAll"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Usuario '+name+' creado exitosamente!</div>');
                    $("#username").val("");
                    $("#name").val("");
                    $("#email").val("");
                    $("#password").val("");
                    $("#bankAccount").val("");
                    $("#bank_id").val("");
                    $("#profile_id").val("");

                    var url= window.location.href;

                    window.location.href = url+"#users";
                    window.location.reload(true);
                }
            }).fail(function (data) {
                setTimeout(function() {$(".mensajesAllValid").fadeOut(1500);},5000);
                $('#myModal').modal('hide');

                var errors = '<div class="alert alert-danger mensajesAllValid"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> ';
                for(datos in data.responseJSON){
                    errors += data.responseJSON[datos] + '<br>';
                }
                errors +='</div>';

                $('#msjAlterno').show().html(errors);
            });
        });
        var table = $('#tblUser').DataTable( {
            "language": {
                "url": "{{asset('public/pluings/datatable/js/Spanish.json')}}"
            }  , "order": [[ 4, "asc" ]]
            ,columnDefs: [ {
                targets: [ 4 ],
                orderData: [ 4, 0 ]
            }, {
                targets: [ 4 ],
                orderData: [ 4, 0 ]
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
                $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> El Usuario no pudo ser eliminado! </div>');

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
                if(result.statusUser=="activo"){
                    $('#'+result.id).html('<i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i>');
                }else if(result.statusUser=="inactivo"){
                    $('#'+result.id).html('<i class="fa fa-circle-o fa-2x" aria-hidden="true"></i>');
                }

            }).fail(function () {
                $('#msjAlterno').html('<div class="alert alert-danger mensajesAll"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> El Estado no pudo ser editado! </div>');

            });
        });
        var Views = function(id) {
            var route = "{{url('admin/users/')}}/"+id+"/edit";

            $.get( route, function( data ) {
                $("#id").val(data.id);
                $("#username1").val(data.username);
                $("#name1").val(data.name);
                $("#email1").val(data.email);
                $("#bankAccount1").val(data.bankAccount);
                $("#bank_id1").val(data.bank_id);
                $("#profile_id1").val(data.profile_id);
                $('#myModalEdit').modal('show');

            });
        }
        $('#actualizar').click(function () {
            var id=  $("#id").val();
            var token =  $("#token").val();
            var route = "{{url('admin/users/')}}/"+id+"";
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
                        $('#msjAlterno').html('<div class="alert alert-success mensajesAllSave"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Usuario editado exitosamente!</div>');
                        setTimeout(function() {$(".mensajesAllSave").fadeOut(1500);},5000);
                        $("#UserName_" + result.info.id).text(result.info.username);
                        $("#Name_" + result.info.id).text(result.info.name);
                        $("#Email_" + result.info.id).text(result.info.email);
                        $("#Profile_" + result.info.id).text(result.perfil);
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