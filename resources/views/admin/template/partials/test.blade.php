<div class="col-md-12">

    {!! Form::open([]) !!}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    {!! Form::label('companyReason','Razón social:',['class'=>'input-group-addon']) !!}
                    {!! Form::select('companyReason', $company,null,['class'=>'form-control ','placeholder'=>'Seleccione una opcion','required'])!!}
                </div>
            </div>
            @if($desarrollo == 1)
                <div class="col-md-4">
                    <div class="input-group">
                        {!! Form::label('developments','Desarollo:',['class'=>'input-group-addon']) !!}
                        {!! Form::select('developments', $developments,null,['class'=>'form-control ','placeholder'=>'Seleccione una opcion','required'])!!}
                    </div>
                </div>
            @endif
            <div class="col-md-4">
                <div class="input-group">
                    {!! Form::label('companyReason','Proyecto:',['class'=>'input-group-addon']) !!}
                    {!! Form::select('companyReason', $company,null,['class'=>'form-control ','placeholder'=>'Seleccione una opcion','required'])!!}
                </div>
            </div>
        </div>
    </div>
</div>