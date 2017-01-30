<!-- Modal -->
<div id="myModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridModalLabel">Edición de Usuarios</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <div class="row">
                        <div class="col-md-12">

                            {!! Form::open(['id' => 'form']) !!}
                            <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                            <input type="hidden" name="_method"  id="id">
                            <div class="form-group">
                                {!! Form::label('username','Ingrese el usuario:') !!}<div class="requerido">*</div>
                                {!! Form::text('username',null,['class'=>'form-control','placeholder'=>'Nombre de usuario','required', 'id'=>'username1']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('name','Ingrese el nombre:') !!}<div class="requerido">*</div>
                                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de la persona','required', 'id'=>'name1']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'Correo electronico') !!}
                                {!! Form::email('email',null, ['class'=>'form-control','placeholder'=>'example@gmail.com', 'id'=>'email1'])!!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('bankAccount','Ingrese la cuenta bancaria:') !!}
                                {!! Form::text('bankAccount',null,['class'=>'form-control','placeholder'=>'Cuenta bancaria', 'id'=>'bankAccount1']) !!}
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('bank_id','Banco') !!}<div class="requerido">*</div>
                                        {!! Form::select('bank_id',$bank,null,['class'=>'form-control ','placeholder'=>'Seleccione una opción','required', 'id'=>'bank_id1'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('profile_id','Perfil') !!}<div class="requerido">*</div>
                                        {!! Form::select('profile_id',$profile,null,['class'=>'form-control','placeholder'=>'Seleccione una opción','required', 'id'=>'profile_id1']) !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-times" aria-hidden="true"></i> Cancelar</button>
                <button type="button" id="actualizar" class="btn btn-primary"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Actualizar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<!-- /Modal -->