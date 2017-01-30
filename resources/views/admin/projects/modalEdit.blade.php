<!-- Modal EDITAR-->
<div id="myModalEdit" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridModalLabel">Edición de Proyectos</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <div class="row">
                        <div class="col-md-12">

                            {!! Form::open(['id' => 'form'])!!}
                            <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                            <input type="hidden" name="_method"  id="id">
                                    @if($devview==1)
                                        <div class="form-group">
                                            {!! Form::label('developments_id','Desarrollo:') !!}<div class="requerido">*</div>
                                            {!! Form::select('developments_id', $dev,null,['class'=>'form-control ','placeholder'=>'Seleccione una opcion','required','id'=>'developments_id1'])!!}
                                        </div>
                                    @endif
                                     <div class="form-group">
                                        {!! Form::label('nameProject','Ingrese el Proyecto:') !!}<div class="requerido">*</div>
                                        {!! Form::text('nameProject',null,['class'=>'form-control','placeholder'=>'Proyecto','required','autofocus','id'=>'nameProject1']) !!}
                                    </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('alias','Ingrese el Alias:') !!}<div class="requerido">*</div>
                                        {!! Form::text('alias',null,['class'=>'form-control','placeholder'=>'Alias','required', 'id'=>'alias1']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('location','Localización:') !!}<div class="requerido">*</div>
                                        {!! Form::select('location',['local'=>'Local','foranea'=>'Foranea'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required','id'=>'location1']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                       <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('client_id','Ciente:') !!}<div class="requerido">*</div>
                                                {!! Form::select('client_id', $clie,null,['class'=>'form-control ','placeholder'=>'Seleccione una opcion','required','id'=>'client_id1'])!!}
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {!! Form::label('client_social_reason_id','Razón Social Ciente:') !!}<div class="requerido">*</div>
                                               
                                                {!! Form::select('client_social_reason_id',[],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required','id'=>'client_social_reason_id1']) !!}
  
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                               <div class="form-group">
                                                {!! Form::label('company_social_reason_id','Razón Social Empresa:') !!}<div class="requerido">*</div>
                                                {!! Form::select('company_social_reason_id', $rse,null,['class'=>'form-control ','placeholder'=>'Seleccione una opcion','required','id'=>'company_social_reason_id1'])!!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('dateStart','Fecha Inicio:') !!}<div class="requerido">*</div>
                                                {!! Form::date('dateStart',$date,['class'=>'form-control','required','id'=>'dateStart1']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('dateEnd','Fecha Fin:') !!}<div class="requerido">*</div>
                                                {!! Form::date('dateEnd',$date,['class'=>'form-control fecha','required','id'=>'dateEnd1']) !!}
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
                                                {!! Form::label('nameContact','Nombre Contacto:') !!}
                                                {!! Form::text('nameContact',null,['class'=>'form-control','placeholder'=>' Contacto','id'=>'nameContact1']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('phone','Ingrese Número Contacto:') !!}
                                                {!! Form::text('phone',null,['class'=>'form-control','placeholder'=>'Número Contacto','id'=>'phone1']) !!}
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="form-group">
                                        {!! Form::label('email','Ingrese Correo Electronico:') !!}
                                        {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Correo Electronico','id'=>'email1']) !!}
                                     </div>
                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('manager','Ingrese Nombre Gerente:') !!}
                                                {!! Form::text('manager',null,['class'=>'form-control','placeholder'=>'Gerente','id'=>'manager1']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('coordinator','Ingrese Nombre Coordinador:') !!}
                                                {!! Form::text('coordinator',null,['class'=>'form-control','placeholder'=>'Coordinador','id'=>'coordinator1']) !!}
                                            </div>
                                        </div>
                                    </div>  
                                     
                                    <div class="form-group">
                                        {!! Form::label('resident','Ingrese Nombre Residente:') !!}
                                        {!! Form::text('resident',null,['class'=>'form-control','placeholder'=>'Nombre Residente','id'=>'resident1']) !!}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('estimation','Estimación') !!}<div class="requerido">*</div>
                                                {!! Form::select('estimation',['semana'=>'Semana','quincena'=>'Quincena','mes'=>'Mes'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required','id'=>'estimation1']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                {!! Form::label('estimationDay','Dia Estimación') !!}<div class="requerido">*</div>
                                                {!! Form::select('estimationDay',['lunes'=>'Lunes','martes'=>'Martes','miercoles'=>'Miercoles','jueves'=>'Jueves','viernes'=>'Viernes'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required','id'=>'estimationDay1']) !!}
                                            </div>
                                        </div>
                                    </div> 
                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('invoice','Factura') !!}<div class="requerido">*</div>
                                                {!! Form::select('invoice',['semana'=>'Semana','quincena'=>'Quincena','mes'=>'Mes'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required','id'=>'invoice1']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                {!! Form::label('invoiceDay','Dia Factura') !!}<div class="requerido">*</div>
                                                {!! Form::select('invoiceDay',['lunes'=>'Lunes','martes'=>'Martes','miercoles'=>'Miercoles','jueves'=>'Jueves','viernes'=>'Viernes'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required','id'=>'invoiceDay1']) !!}
                                            </div>
                                        </div>
                                    </div>  
                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('pay','Pago') !!}<div class="requerido">*</div>
                                                {!! Form::select('pay',['semana'=>'Semana','quincena'=>'Quincena','mes'=>'Mes'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required','id'=>'pay1']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                {!! Form::label('payDay ','Dia Pago') !!}<div class="requerido">*</div>
                                                {!! Form::select('payDay',['lunes'=>'Lunes','martes'=>'Martes','miercoles'=>'Miercoles','jueves'=>'Jueves','viernes'=>'Viernes'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required','id'=>'payDay1']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('commentJobs','Ingrese Cometarios:') !!}
                                        {!! Form::text('commentJobs',null,['class'=>'form-control','placeholder'=>'Comentarios','id'=>'commentJobs1']) !!}
                                    </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('label1','Etiqueta 1:') !!}
                                                {!! Form::textarea('label1',null,['class'=>'form-control','placeholder'=>'Etiqueta 1','size' => '30x4','id'=>'label11']) !!}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('label2','Etiqueta 2:') !!}
                                                {!! Form::textarea('label2',null,['class'=>'form-control','placeholder'=>'Etiqueta 2','size' => '30x4','id'=>'label21']) !!}
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