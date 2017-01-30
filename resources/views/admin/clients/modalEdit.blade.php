<!-- Modal Edicion-->
<div id="myModalEdit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridModalLabel">Edición  de Cliente y razon social</h4>
            </div>

            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::open(['id' => 'form'])!!}

                            <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                            <input type="hidden" name="_method"  id="id">
                            <input type="hidden" name="client_id"  id="client_id">
                            <input type="hidden" name="id_municipio"  id="id_municipio">
                            <input type="hidden" name="id_state"  id="id_state">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('name','Ingrese el Nombre del cliente:') !!}<div class="requerido">*</div>
                                        {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre','required','autofocus','id'=>'name1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        {!! Form::label('nameContact','Ingrese un nombre de contacto :') !!}<div class="requerido"></div>
                                        {!! Form::text('nameContact',null,['id'=>'nameContact1','class'=>'form-control','placeholder'=>'Contacto','autofocus']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('numberClient','Ingrese el Numero del Cliente:') !!}<div class="requerido">*</div>
                                        {!! Form::text('numberClient',null,['id'=>'numberClient1','readonly','class'=>'form-control','placeholder'=>'Numero del ciente','required','autofocus']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('raiting','Ingrese numero de estrellas:') !!}<div class="requerido"></div>
                                        {!! Form::select('raiting',['1'=>'Una estrella','2'=>'dos estrellas','3'=>'tres estrellas','4'=>'cuatro estrellas','5'=>'cinco estrellas'],null,['id'=>'raiting1','class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('comments','Comentarios:') !!}
                                        {!! Form::text('comments',null,['id'=>'comments1','class'=>'form-control','placeholder'=>'Comentarios','size' => '30x5']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('status','Estatus:') !!}<div class="requerido">*</div>
                                        {!! Form::select('status',['activo'=>'Activo','inactivo'=>'Inactivo'],null,['id'=>'status1','class'=>'form-control','placeholder'=>'Seleccione una opcion','required']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('jobContact','Ingrese el puesto del contacto:') !!}
                                        {!! Form::text('jobContact',null,['id'=>'jobContact1','class'=>'form-control','placeholder'=>'Actividad o Puesto','autofocus']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        {!! Form::label('phoneContact','Ingrese telefono de contacto:') !!}
                                        {!! Form::text('phoneContact',null,['id'=>'phoneContact1','min'=>'8','maxlength'=>'10','class'=>'form-control','placeholder'=>'telefono fijo','autofocus']) !!}
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('cellContact','Ingrese telefono celular del contacto:') !!}
                                        {!! Form::text('cellContact',null,['id'=>'cellContact1','min'=>'10','maxlength'=>'10','class'=>'form-control','placeholder'=>'Número móvil celular']) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        {!! Form::label('email','Ingrese correo electrónico de contacto:') !!}
                                        {!! Form::text('email',null,['id'=>'email1','class'=>'form-control','placeholder'=>'correo@ejemplo.com','autofocus']) !!}
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="bd-example bd-example-padded-bottom">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalNewReason"><i class="fa fa-plus" aria-hidden="true"></i> Edición de Razones Sociales</button>
                                            </br></br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('nameReason','Razón  Social  Principal :') !!}<div class="requerido">*</div>
                                        {!! Form::select('nameReason', $reason ,null,['id'=>'nameReason1','class'=>'form-control ','placeholder'=>'Seleccione una opcion'])!!}
                                    </div>
                                </div>
                            </div>


                        </div>
                        <br><br>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('rfc','Ingrese  RFC:') !!}<div class="requerido">*</div>
                                    {!! Form::text('rfc',null,['id'=>'rfc1','class'=>'form-control','placeholder'=>'RFC','required']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('street','Ingrese  Calle:') !!}
                                    {!! Form::text('street',null,['id'=>'street1','class'=>'form-control','placeholder'=>'Calle']) !!}
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('numberE','Ingrese Número Exterior:') !!}
                                    {!! Form::text('numberE',null,['id'=>'numberE1','class'=>'form-control','placeholder'=>'Numero Exterior']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('numberI','Ingrese Número Interior:') !!}
                                    {!! Form::text('numberI',null,['id'=>'numberI1','class'=>'form-control','placeholder'=>'Numero Interior']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('colony','Ingrese la Colonia:') !!}
                                    {!! Form::text('colony',null,['id'=>'colony1','class'=>'form-control','placeholder'=>'Colonia']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('cp','Ingrese el CP:') !!}
                                    {!! Form::text('cp',null,['id'=>'cp1','class'=>'form-control','placeholder'=>'CP']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('city','Ciudad:') !!}
                                    {!! Form::select('city', $state,null,['id'=>'city1','class'=>'form-control ','placeholder'=>'Seleccione una ciudad'])!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('state','Estado:') !!}
                                    {!! Form::select('state',[],null,['id'=>'state1','class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            {!! Form::label('webSite','Ingrese el Sitio Web:') !!}
                            {!! Form::text('webSite',null,['id'=>'webSite1','class'=>'form-control','placeholder'=>'sitio web']) !!}
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('label1','Etiqueta 1:') !!}
                                    {!! Form::textarea('label1',null,['id'=>'label11','class'=>'form-control','placeholder'=>'Etiqueta 1','size' => '30x5']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('label2','Etiqueta 2:') !!}
                                    {!! Form::textarea('label2',null,['id'=>'label21','class'=>'form-control','placeholder'=>'Etiqueta 2','size' => '30x5']) !!}
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
            <button type="button" id="actualizar" class="btn btn-primary"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Actualizar</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
</div>