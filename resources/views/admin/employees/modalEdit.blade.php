<!-- Modal EDITAR-->
<div id="myModalEdit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridModalLabel">Edición de Empleados</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <div class="row">
                        <div class="col-md-12">

                            {!! Form::open(['id' => 'form'])!!}
                            <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                            <input type="hidden" name="_method"  id="id">
                            <div class="form-group">
                                {!! Form::label('numberEmployee','Ingrese Número de Empleado:') !!}
                                {!! Form::text('numberEmployee',null,['class'=>'form-control','placeholder'=>'Número de Empleado','id'=>'numberEmployee1']) !!}
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('job_id','Puesto:') !!}<div class="requerido">*</div>
                                        {!! Form::select('job_id', $job,null,['class'=>'form-control ','placeholder'=>'Seleccione una opción','required','id'=>'job_id1'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('dateStart','Fecha de Alta:') !!}<div class="requerido">*</div>
                                        {!! Form::date('dateStart',null,['class'=>'form-control','required','id'=>'dateStart1']) !!}
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('name','Ingrese Nombre de Empleado:') !!}<div class="requerido">*</div>
                                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de Empleado','required','id'=>'name1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('lastName','Ingrese Apellido Paterno:') !!}<div class="requerido">*</div>
                                        {!! Form::text('lastName',null,['class'=>'form-control','placeholder'=>'Apellido Paterno','required','required','id'=>'lastName1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('motherLastName','Ingrese Apellido Materno:') !!}<div class="requerido">*</div>
                                        {!! Form::text('motherLastName',null,['class'=>'form-control','placeholder'=>'Apellido Materno','required','id'=>'motherLastName1']) !!}
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('imss','Ingrese IMSS:') !!}<div class="requerido">*</div>
                                        {!! Form::text('imss',null,['class'=>'form-control','placeholder'=>'IMSS','required','id'=>'imss1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('curp','Ingrese CURP:') !!}<div class="requerido">*</div>
                                        {!! Form::text('curp',null,['class'=>'form-control','placeholder'=>'CURP','required','id'=>'curp1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('rfc','Ingrese RFC:') !!}<div class="requerido">*</div>
                                        {!! Form::text('rfc',null,['class'=>'form-control','placeholder'=>'RFC','required','required','id'=>'rfc1']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('dailySalary','Ingrese Sueldo Semanal:') !!}<div class="requerido">*</div>
                                        {!! Form::text('dailySalary',null,['class'=>'form-control','placeholder'=>'Sueldo Semanal','required','id'=>'dailySalary1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('dailyInfonavit','Ingrese Infonavit Diario:') !!}<div class="requerido">*</div>
                                        {!! Form::text('dailyInfonavit',null,['class'=>'form-control','placeholder'=>'Infonavit','required','id'=>'dailyInfonavit1']) !!}
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('localCompensation','Compensacion Local:') !!}
                                        {!! Form::text('localCompensation',null,['class'=>'form-control','placeholder'=>'Compensacion Local','id'=>'localCompensation1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('foreignCompensation','Compensacion Foranea:') !!}
                                        {!! Form::text('foreignCompensation',null,['class'=>'form-control','placeholder'=>'Compensacion Foranea','id'=>'foreignCompensation1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('nomineCard','Tarjeta Nomina:') !!}
                                        {!! Form::text('nomineCard',null,['class'=>'form-control','placeholder'=>'Tarjeta Nomina','id'=>'nomineCard1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('bankAccount','Cuenta Bancaria:') !!}
                                        {!! Form::text('bankAccount',null,['class'=>'form-control','placeholder'=>'Cuenta Bancaria','id'=>'bankAccount1']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('bank_id','Banco:') !!}
                                        {!! Form::select('bank_id', $bank,null,['class'=>'form-control ','placeholder'=>'Seleccione una opción','required','id'=>'bank_id1'])!!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('phone','Telefono:') !!}
                                        {!! Form::text('phone',null,['class'=>'form-control','placeholder'=>'Telefono','id'=>'phone1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('cellPhone','Celular:') !!}
                                        {!! Form::text('cellPhone',null,['class'=>'form-control','placeholder'=>'Celular','id'=>'cellPhone1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('email', 'Correo Electronico') !!}
                                        {!! Form::email('email',null, ['class'=>'form-control','placeholder'=>'example@gmail.com','id'=>'email1'])!!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('street','Ingrese la Calle:') !!}
                                {!! Form::text('street',null,['class'=>'form-control','placeholder'=>'Calle','id'=>'street1']) !!}
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('numberE','Ingrese Número Exterior:') !!}
                                        {!! Form::text('numberE',null,['class'=>'form-control','placeholder'=>'Numero Exterior','id'=>'numberE1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('numberI','Ingrese Número Interior:') !!}
                                        {!! Form::text('numberI',null,['class'=>'form-control','placeholder'=>'Numero Interior','id'=>'numberI1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label('colony','Ingrese la Colonia:') !!}
                                        {!! Form::text('colony',null,['class'=>'form-control','placeholder'=>'Colonia','id'=>'colony1']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('emergencyData','Datos de Emergencia:') !!}
                                {!! Form::text('emergencyData',null,['class'=>'form-control','placeholder'=>'Datos de Emergencia','id'=>'emergencyData1']) !!}
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('birthPlace','Lugar de Nacimiento:') !!}
                                        {!! Form::text('birthPlace',null,['class'=>'form-control','placeholder'=>'Lugar de Nacimiento','id'=>'birthPlace1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('birthDate','Fecha de Nacimiento:') !!}
                                        {!! Form::date('birthDate',null,['class'=>'form-control','id'=>'birthDate1']) !!}
                                    </div>
                                </div>


                            </div>
                            <div class="form-group">
                                {!! Form::label('observations','Observaciones:') !!}
                                {!! Form::text('observations',null,['class'=>'form-control','placeholder'=>'Observaciones','id'=>'observations1']) !!}
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