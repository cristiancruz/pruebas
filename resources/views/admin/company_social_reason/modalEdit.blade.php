<!-- Modal EDITAR-->
<div id="myModalEdit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridModalLabel">Edición de Razón Social Empresa</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <div class="row">
                        <div class="col-md-12">

                            {!! Form::open(['id' => 'form'])!!}
                            <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                            <input type="hidden" name="_method"  id="id">

                            <div class="form-group">
                                {!! Form::label('companyReason','Ingrese la Razón Social Empresa:') !!}<div class="requerido">*</div>
                                {!! Form::text('companyReason',null,['class'=>'form-control','required','id'=>'nameRazonC1' ,'autofocus']) !!}
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('rfc','Ingrese el RFC:') !!}<div class="requerido">*</div>
                                        {!! Form::text('rfc',null,['class'=>'form-control','placeholder'=>'RFC','required','id'=>'rfc1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('phone','Ingrese el Teléfono:') !!}
                                        {!! Form::text('phone',null,['class'=>'form-control','placeholder'=>'Telefono' ,'id'=>'phone1']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('street','Ingrese la Calle:') !!}
                                {!! Form::text('street',null,['class'=>'form-control','placeholder'=>'Calle','id'=>'street1']) !!}
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('numberE','Ingrese Número Exterior:') !!}
                                        {!! Form::text('numberE',null,['class'=>'form-control','placeholder'=>'Número Exterior','id'=>'numberE1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('numberI','Ingrese Número Interior:') !!}
                                        {!! Form::text('numberI',null,['class'=>'form-control','placeholder'=>'Número Interior','id'=>'numberI1']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('colony','Ingrese la Colonia:') !!}
                                        {!! Form::text('colony',null,['class'=>'form-control','placeholder'=>'Colonia','id'=>'colony1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('cp','Ingrese el CP:') !!}
                                        {!! Form::text('cp',null,['class'=>'form-control','placeholder'=>'CP','id'=>'cp1']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('city','Estado:') !!}
                                        {!! Form::select('city', $state,null,['class'=>'form-control ','placeholder'=>'Seleccione una opcion','required','id'=>'city1'])!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('state','Ciudad:') !!}
                                        {!! Form::select('state',[],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','id'=>'state1']) !!}
                                    </div>
                                </div>

                            </div>


                            <div class="form-group">
                                {!! Form::label('website','Ingrese el Sitio Web:') !!}
                                {!! Form::text('website',null,['class'=>'form-control','placeholder'=>'sitio web','id'=>'webside1']) !!}
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('label1','Etiqueta 1:') !!}
                                        {!! Form::textarea('label1',null,['class'=>'form-control','placeholder'=>'Etiqueta 1','size' => '30x5','id'=>'eti1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('label2','Etiqueta 2:') !!}
                                        {!! Form::textarea('label2',null,['class'=>'form-control','placeholder'=>'Etiqueta 2','size' => '30x5','id'=>'eti2']) !!}
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