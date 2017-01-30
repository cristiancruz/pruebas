@if(count($errors) > 0)
	<div class="alert alert-warning mensajesAll">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		@foreach($errors->all() as $error)
		<ul>
			<li> {{ $error }} </li>
		</ul>
			
		@endforeach
	</div>
@endif

@if(!session('msjtrue')==null)
	<div class="alert alert-success mensajesAll">
	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	{{session('msjtrue')}}
	</div>
@endif

@if(!session('msjfalse')==null)
	<div class="alert alert-danger mensajesAll">
	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	{{session('msjfalse')}}
	</div>
@endif

@if(!session('msjeedit')==null)
	<div class="alert alert-success mensajesAll">
	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	{{session('msjeedit')}}
	</div>
@endif
@if(!session('msjinfo')==null)
	<div class="alert alert-info mensajesAll">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{{session('msjinfo')}}
	</div>
@endif
<div id="msjAlterno"></div>